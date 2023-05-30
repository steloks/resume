<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeTypePercentage extends Model
{
    use HasFactory;

    protected $table = 'recipe_types_percentages';

    protected $fillable = [
        'recipe_type_id',
        'category_id',
        'percentage',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
