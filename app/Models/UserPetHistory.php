<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserPetHistory extends Model
{
    protected $table = 'user_pet_histories';

    protected $guarded = ['id'];

//    protected $fillable = [
//        'pet_id',
//        'weight',
//        'weight_lvl',
//        'activity_lvl',
//        'neutered',
//        'disease',
//        'unusual_behavior',
//        'allergen_ids',
//    ];

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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id')->withTrashed();;
    }
}
