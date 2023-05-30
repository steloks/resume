<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingList extends Model
{
    use HasFactory;

    protected $table = 'shopping_list';

    protected $guarded = ['id'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    public function productData()
    {
        return $this->belongsTo(ProductData::class, 'product_data_id', 'id');
    }

    public function object()
    {
        return $this->belongsTo(ObjectModel::class, 'object_id', 'id');
    }
}
