<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceDuration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pricings()
    {
        return $this->hasMany(ServicePricing::class, 'duration_id');
    }

    public function codes()
    {
        return $this->hasMany(Code::class, 'duration_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeSort($query)
    {
        return $query->orderBy('sort_order', 'ASC');
    }
}
