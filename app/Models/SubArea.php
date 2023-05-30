<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    use HasFactory;

    protected $table = 'sub_areas';

    protected $fillable = [
        'area_id',
        'name',
        'status',
    ];
}
