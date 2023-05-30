<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderRecipeHistory extends Model
{
    protected $guarded = ['id'];

    protected $table = 'order_recipes_history';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function orderRecipe(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(OrderRecipe::class, 'order_recipe_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }
}
