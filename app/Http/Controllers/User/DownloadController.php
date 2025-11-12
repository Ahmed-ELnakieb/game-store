<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DownloadFile;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DownloadController extends Controller
{
    public function __construct()
    {
        $this->theme = template();
    }

    public function index()
    {
        // Get all card IDs that the user has purchased (completed orders)
        $purchasedCardIds = Order::where('user_id', Auth::id())
            ->where('status', 1) // completed orders
            ->whereHas('orderDetails', function($query) {
                $query->whereHasMorph('detailable', ['App\Models\CardService']);
            })
            ->with('orderDetails.detailable.card')
            ->get()
            ->pluck('orderDetails.*.detailable.card.id')
            ->flatten()
            ->unique()
            ->toArray();

        // Get download files only for purchased games
        $files = DownloadFile::where('status', 1)
            ->whereIn('card_id', $purchasedCardIds)
            ->with('card')
            ->latest()
            ->paginate(12);

        return view($this->theme . 'user.nightfall.downloads.index', compact('files'));
    }

    public function access(Request $request, $id)
    {
        $file = DownloadFile::findOrFail($id);
        
        if (!$file->status) {
            return back()->with('error', 'File is not available');
        }

        // Check if user has purchased this game
        $hasPurchased = Order::where('user_id', Auth::id())
            ->where('status', 1)
            ->whereHas('orderDetails.detailable', function($query) use ($file) {
                $query->where('card_id', $file->card_id);
            })
            ->exists();

        if (!$hasPurchased) {
            return back()->with('error', 'You need to purchase this game first');
        }

        // If file requires authentication
        if ($file->requires_auth) {
            // Check if coming from authenticated session
            if ($request->session()->has('file_auth_' . $file->id)) {
                $file->incrementDownloadCount();
                return redirect($file->file_url);
            }

            // Show authentication form
            return view($this->theme . 'user.nightfall.downloads.auth', compact('file'));
        }

        // No auth required, redirect directly
        $file->incrementDownloadCount();
        return redirect($file->file_url);
    }

    public function authenticate(Request $request, $id)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $file = DownloadFile::findOrFail($id);

        // Verify credentials
        if ($file->auth_username === $request->username && $file->auth_password === $request->password) {
            // Store authentication in session
            $request->session()->put('file_auth_' . $file->id, true);
            
            $file->incrementDownloadCount();
            return redirect($file->file_url);
        }

        return back()->with('error', 'Invalid username or password')->withInput();
    }
}
