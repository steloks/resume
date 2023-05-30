<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogKillogramPercentage extends Model
{
    use HasFactory;

    protected $table='dog_killogam_percentage';

    protected $fillable=[
        'name',
        'min_age',
        'max_age',
        'percentage',
    ];
}
