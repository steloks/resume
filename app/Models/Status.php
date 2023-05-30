<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $guarded = ['id'];

    protected $table = 'statuses';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function order(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }
}
