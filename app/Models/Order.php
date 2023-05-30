<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    protected $guarded = ['id'];

    protected $table = 'orders';

    public static function boot()
    {
        parent::boot();
        $user = !empty(Auth::guard('admin')->user()) ? Auth::guard('admin')->user() : auth()->user();

        static::creating(function ($query) use ($user) {
            $query->created_by = $user->name ? $user->name : ($user->name ?: 'Website');
            $query->updated_by = $user->name ? $user->name : ($user->name ?? '');
        });

        static::updating(function ($query) use ($user) {
            $query->updated_by = $user->name ? $user->name : ($user->name ?? '');
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(OrderRecipe::class);
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
     * @return mixed
     */
    public static function getDefaultStatus()
    {
        return Status::where('type', 'order')->where('is_default', 1)->first()->id;
    }


    /**
     * @return mixed
     */
    public static function getDefaultPaymentStatus()
    {
        return Status::where('type', 'order_payment')->where('is_default', 1)->first()->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function postcodeRelation(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Postcode::class, 'user_postcode', 'postcode');
    }


    public function timeslot(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(TimeSlot::class, 'timeslot_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'order_id', 'id');
    }
}
