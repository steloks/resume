<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeType extends Model
{
    use HasFactory;

    protected $table = 'recipe_types';

    protected $fillable = [
        'name',
        'min_age',
        'max_age',
    ];

    public function recipeParameters()
    {
        return $this->hasMany(RecipeTypePercentage::class, 'recipe_type_id', 'id');
    }

    public function recipes()
    {
        return $this->hasMany(Recipe::class, 'recipe_type_id', 'id');
    }
}
