<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';

    protected $guarded = ['id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Order::class, 'id', 'type_id');
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pet(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Pet::class, 'id', 'type_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function orderMenu(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(OrderRecipe::class, 'id', 'type_id');
    }
}
