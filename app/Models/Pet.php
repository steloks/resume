<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Pet extends Model
{
    use SoftDeletes;

    const PET_IMAGE_PREFIX = 'pet_';

    protected $table = 'user_pets';

    protected $guarded = ['id'];

    public static $weightLvl = [
        1 => 'Underweight',
        2 => 'Healthy',
        3 => 'Overweight',
    ];

    public static $activityLvl = [
        1 => 'Low',
        2 => 'Normal',
        3 => 'High',
    ];

    public static function boot()
    {
        parent::boot();
        $user = !empty(Auth::guard('admin')->user()) ? Auth::guard('admin')->user() : auth()->user();

        static::creating(function ($query) use ($user) {
            $query->created_by = $user->name ? $user->name : ($user->name ?: 'Website');
            $query->updated_by = $user->name ? $user->name : ($user->name ?? '');
        });

        static::updating(function ($query) use ($user) {
            $query->updated_by = $user->name ? $user->name : ($user->name ?? '');
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function owner(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function allergens(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Allergen::class, 'allergen_user_pet', 'user_pet_id', 'allergen_id')->withTimestamps();
    }

    public function product_allergens(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(ProductAllergen::class, 'product_allergen_user_pet', 'user_pet_id', 'product_allergen_id')->withTimestamps();
    }

    public function breed(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Breed::class);
    }

    public function getDateOfBirthAttribute($value): string
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function acivityPercentage()
    {
        return $this->hasOne(DogActivityPercentage::class, 'activity_lvl', 'activity_lvl');
    }

    public function neuteredPercentage()
    {
        return $this->hasOne(DogNeuteredPercentage::class, 'neutered', 'neutered');
    }

    public function weightPercentage()
    {
        return $this->hasOne(DogWeightLvlPercentage::class, 'weight_lvl', 'weight_lvl');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(UserPetHistory::class, 'user_pet_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function favourites(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Recipe::class, 'favourite_recipe', 'pet_id', 'recipe_id');
    }

    /**
     * @param $productIds
     *
     * @return array
     */
    public function getPetAllergens($productIds): array
    {
        return Product::query()->whereIn('id', $productIds)->pluck('name')->toArray();
    }
}
