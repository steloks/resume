<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

    protected $fillable = [
        'name',
        'description',
        'created_by',
    ];

    public function areas()
    {
        return $this->hasMany(Area::class, 'city_id', 'id');
    }
}
