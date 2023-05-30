<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ObjectModel extends Model
{
    use HasFactory;

    protected $table = 'objects';

    protected $fillable = [
        'name',
        'menu_limit',
        'prefix',
        'city_id',
        'description',
        'created_by',
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

    public function areas()
    {
        return $this->belongsToMany(Area::class, 'object_areas',  'object_id','area_id')->with(['subAreas']);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function city(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'object_products', 'object_id', 'product_id')->withPivot(['buy_price','sell_price','description']);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_objects', 'object_id','user_id')->withTrashed();
    }
}
