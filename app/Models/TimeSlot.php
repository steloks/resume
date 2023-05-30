<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class TimeSlot extends Model
{
    use HasFactory;

    protected $table = 'time_slots';

    protected $fillable = [
        'start_at',
        'end_at',
        'area_id',
        'description',
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

    public function area()
    {
        return $this->belongsTo(Area::class);
    }
}
