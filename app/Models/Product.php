<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'name',
        'kcal',
        'category_id',
        'unit_of_measure',
        'days_until_exp',
        'buy_price',
        'sell_price',
        'description',
        'created_by',
        'updated_by',
        'prefix'
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->created_by = Auth::guard('admin')->user()->name ?? '';
            $query->updated_by = Auth::guard('admin')->user()->name ?? '';
        });

        static::updating(function ($query) {
            $query->updated_by = Auth::guard('admin')->user()->name ?? '';
        });
    }

    public function objects()
    {
        return $this->belongsToMany(ObjectModel::class, 'object_products', 'product_id', 'object_id');
    }

    public function category(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function allergen()
    {
        return $this->hasOne(ProductAllergen::class, 'product_id', 'id');
    }
}
