<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Postcode extends Model
{
    use HasFactory;

    protected $table = 'postcodes';

    protected $fillable=[
      'postcode',
      'area_id',
      'sub_area_id',
      'status',
    ];

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

    public function area(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function subArea(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(SubArea::class);
    }
}
