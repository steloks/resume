<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $fillable = [
        'name',
        'recipe_type_id',
        'description',
        'created_by',
        'updated_by',
        'image',
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

    public function products()
    {
        return $this->belongsToMany(Product::class, 'recipe_products', 'recipe_id', 'product_id')->withPivot('percentage');
    }

    public function recipeType()
    {
        return $this->belongsTo(RecipeType::class, 'recipe_type_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderRecipes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favourites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(FavouriteRecipe::class, 'favourite_recipe', 'recipe_id', 'pet_id');
    }
}
