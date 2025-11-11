<?php

namespace App\Models;

use App\Scopes\EnsureCardIdScope;
use App\Traits\Upload;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardService extends Model
{
    use HasFactory, Upload;

    protected $guarded = ['id'];
    protected $appends = ['image_path'];
    protected $casts = [
        'old_data' => 'object',
        'campaign_data' => 'object',
    ];

    protected static function booted()
    {
        static::saved(function ($model) {
            if (!isset($model->card_id)) {
                static::addGlobalScope(new EnsureCardIdScope);
                $model->refresh();
            }
            dispatch(new \App\Jobs\UpdateChildCountJob($model->card->category_id, 'card'));
        });
    }

    public function card()
    {
        return $this->belongsTo(Card::class, 'card_id');
    }

    public function codes()
    {
        return $this->morphMany(Code::class, 'codeable');
    }

    public function activeCodes()
    {
        return $this->morphMany(Code::class, 'codeable')->where('status', 1);
    }

    public function pricings()
    {
        return $this->hasMany(ServicePricing::class, 'card_service_id');
    }

    public function activePricings()
    {
        return $this->pricings()->where('status', 1)->with('duration')->orderBy('price', 'asc');
    }

    public function availableDurations()
    {
        return $this->activePricings()->get();
    }

    // Image upload is now handled directly in the controller
    // No mutator needed - keeps things simple and predictable

    public function getImagePathAttribute()
    {
        if ($this->image) {
            return asset('assets/upload/' . $this->image);
        }
        return asset('assets/upload/default.png');
    }

    public function imagePath()
    {
        if ($this->image) {
            return asset('assets/upload/' . $this->image);
        }
        return asset('assets/upload/default.png');
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
}
