<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'card_id',
        'name',
        'description',
        'file_url',
        'auth_username',
        'auth_password',
        'requires_auth',
        'file_type',
        'icon',
        'file_size',
        'version',
        'status',
        'download_count'
    ];

    protected $casts = [
        'status' => 'boolean',
        'requires_auth' => 'boolean',
        'download_count' => 'integer',
        'file_size' => 'integer',
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function getFileSizeFormattedAttribute()
    {
        if (!$this->file_size) {
            return 'N/A';
        }

        $units = ['B', 'KB', 'MB', 'GB'];
        $size = $this->file_size;
        $unit = 0;

        while ($size >= 1024 && $unit < count($units) - 1) {
            $size /= 1024;
            $unit++;
        }

        return round($size, 2) . ' ' . $units[$unit];
    }

    public function incrementDownloadCount()
    {
        $this->increment('download_count');
    }
}
