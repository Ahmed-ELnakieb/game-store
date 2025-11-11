<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServicePricing extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'service_pricing';

    public function cardService()
    {
        return $this->belongsTo(CardService::class, 'card_service_id');
    }

    public function duration()
    {
        return $this->belongsTo(ServiceDuration::class, 'duration_id');
    }

    public function codes()
    {
        return $this->hasMany(Code::class, 'pricing_id');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function getDiscount()
    {
        $discount = 0;
        if ($this->discount && $this->price) {
            if ($this->discount_type == 'percentage') {
                $discount = ($this->discount * $this->price) / 100;
            } elseif ($this->discount_type == 'flat') {
                $discount = $this->discount;
            }
        }
        return $discount;
    }

    public function getFinalPrice()
    {
        return $this->price - $this->getDiscount();
    }
}
