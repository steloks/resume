<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogWeightLvlPercentage extends Model
{
    use HasFactory;

    protected $table = 'dog_weight_lvl_percentages';

    protected $fillable = [
        'name',
        'weight_lvl',
        'percentage',
    ];
}
