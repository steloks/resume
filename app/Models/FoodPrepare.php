<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodPrepare extends Model
{
    use HasFactory;

    protected $table = 'food_prepare';

    protected $guarded = ['id'];

    public function productData()
    {
        return $this->hasOne(ProductData::class, 'id', 'product_data_id');
    }

    public function object()
    {
        return $this->belongsTo(ObjectModel::class, 'object_id', 'id');
    }
}
