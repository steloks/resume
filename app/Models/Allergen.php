<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Allergen extends Model
{
    protected $table = 'allergens';

    protected $guarded = ['id'];

    public function pets(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Pet::class, 'allergen_user_pet', 'allergen_id', 'user_pet_id')->withTrashed();
    }
}
