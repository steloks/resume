<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $table = 'user_addresses';

    protected $guarded = [
        'id',
    ];

    public function postcodeRelation()
    {
        return $this->hasOne(Postcode::class, 'postcode', 'postcode')->with(['area', 'subArea']);
    }
}
