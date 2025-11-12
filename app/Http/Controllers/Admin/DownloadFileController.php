<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DownloadFileController extends Controller
{
    public function index()
    {
        $files = DownloadFile::latest()->paginate(15);
        return view('admin.download_files.index', compact('files'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'card_id' => 'required|exists:cards,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_url' => 'required|url',
            'auth_username' => 'nullable|string|max:255',
            'auth_password' => 'nullable|string|max:255',
            'requires_auth' => 'required|boolean',
            'file_type' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:100',
            'file_size' => 'nullable|integer',
            'version' => 'nullable|string|max:50',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        DownloadFile::create($request->all());

        return back()->with('success', 'Download file added successfully');
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'card_id' => 'required|exists:cards,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file_url' => 'required|url',
            'auth_username' => 'nullable|string|max:255',
            'auth_password' => 'nullable|string|max:255',
            'requires_auth' => 'required|boolean',
            'file_type' => 'nullable|string|max:50',
            'icon' => 'nullable|string|max:100',
            'file_size' => 'nullable|integer',
            'version' => 'nullable|string|max:50',
            'status' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $file = DownloadFile::findOrFail($id);
        $file->update($request->all());

        return back()->with('success', 'Download file updated successfully');
    }

    public function destroy($id)
    {
        $file = DownloadFile::findOrFail($id);
        $file->delete();

        return back()->with('success', 'Download file deleted successfully');
    }
}
