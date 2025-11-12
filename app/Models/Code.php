<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Code extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $dates = ['activated_at', 'expires_at'];

    public function scopeServiceWise($query, $model, $id)
    {
        return $query->where(['codeable_type' => $model, 'codeable_id' => $id]);
    }

    public function codeable()
    {
        return $this->morphTo();
    }

    public function duration()
    {
        return $this->belongsTo(ServiceDuration::class, 'duration_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getTimeLeftAttribute()
    {
        if (!$this->activated_at || !$this->expires_at) {
            return null;
        }

        if (Carbon::now()->greaterThan($this->expires_at)) {
            return 'Expired';
        }

        $diff = Carbon::now()->diff($this->expires_at);
        
        if ($diff->days > 0) {
            return $diff->days . ' day' . ($diff->days > 1 ? 's' : '') . ' ' . $diff->h . 'h';
        } elseif ($diff->h > 0) {
            return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ' . $diff->i . 'm';
        } else {
            return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '');
        }
    }

    public function getExpiryMessageAttribute($value)
    {
        // Return custom message if set, otherwise return default
        if ($value) {
            return $value;
        }
        
        // Default expiry message
        return 'Your subscription has expired. Please purchase a new key to continue using this service.';
    }

    public function isExpired()
    {
        return $this->expires_at && Carbon::now()->greaterThan($this->expires_at);
    }

    public function isActive()
    {
        return $this->activated_at && !$this->isExpired();
    }
}
