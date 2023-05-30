<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Ramsey\Uuid\Type\Time;

class Area extends Model
{
    use HasFactory;

    protected $table = 'areas';

    protected $fillable = [
        'name',
        'city_id',
        'description',
        'status',
        'delivery_price',
        'created_by',
        'updated_by',
    ];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($query) {
            $query->created_by = Auth::guard('admin')->user()->name ?? '';
            $query->updated_by = Auth::guard('admin')->user()->name ?? '';
        });

        static::updating(function ($query) {
            $query->updated_by = Auth::guard('admin')->user()->name ?? '';
        });
    }

    public function subAreas()
    {
        return $this->hasMany(SubArea::class, 'area_id', 'id');
    }

    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function objects()
    {
        return $this->belongsToMany(ObjectModel::class, 'object_areas', 'area_id', 'object_id');
    }

    public function timeslots()
    {
        return $this->hasMany(TimeSlot::class, 'area_id', 'id');
    }
}
