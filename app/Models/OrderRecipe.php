<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderRecipe extends Model
{
    protected $guarded = ['id'];

    protected $table = 'order_recipes';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Recipe::class);
    }

    public function pet(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Pet::class, 'pet_id', 'id')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function timeslot(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TimeSlot::class, 'timeslot_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Status::class, 'status_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function paymentStatus(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Status::class, 'payment_status_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function history(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderRecipeHistory::class);
    }

    /**
     * @return mixed
     */
    public static function getDefaultStatus()
    {
        return Status::where('type', 'order_recipe')->where('is_default', 1)->first()->id;
    }

    /**
     * @return mixed
     */
    public static function getDefaultPaymentStatus()
    {
        return Status::where('type', 'order_payment')->where('is_default', 1)->first()->id;
    }

    public function courier()
    {
        return $this->belongsTo(User::class, 'courier_id', 'id');
    }

    public function preparedBy()
    {
        return $this->belongsTo(User::class, 'prepared_by', 'id');
    }
}
