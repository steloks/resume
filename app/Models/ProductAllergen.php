<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProductAllergen extends Model
{
    use HasFactory;

    protected $table = 'product_allergen';

    protected $fillable = [
        'product_id',
        'description',
        'created_by',
    ];

    public static function boot()
    {
        parent::boot();
        $user = !empty(Auth::guard('admin')->user()) ? Auth::guard('admin')->user() : auth()->user();

        static::creating(function ($query) use($user) {
            $query->created_by = $user->name ? $user->name : ($user->name ? : 'Website');
            $query->updated_by = $user->name ? $user->name : ($user->name ?? '' );
        });

        static::updating(function ($query) use($user) {
            $query->updated_by = $user->name ? $user->name : ($user->name ?? '' );

        });
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
