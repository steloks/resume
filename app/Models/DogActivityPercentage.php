<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogActivityPercentage extends Model
{
    use HasFactory;

    protected $table = 'dog_activity_percentages';

    protected $fillable = [
        'name',
        'activity_lvl',
        'percentage',
    ];
}
