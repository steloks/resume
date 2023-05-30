<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DogNeuteredPercentage extends Model
{
    use HasFactory;

    protected $table='dog_neutered_percentages';

    protected $fillable = [
        'neutered',
        'percentage',
    ];
}
