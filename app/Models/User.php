<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Rappasoft\LaravelAuthenticationLog\Traits\AuthenticationLoggable;

class User extends Authenticatable
{
    use SoftDeletes, Notifiable, AuthenticationLoggable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'phone',
        'password',
        'username',
        'company_name',
        'deleted_at',
        'created_by',
        'updated_by',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function boot()
    {
        parent::boot();
        $user = !empty(Auth::guard('admin')->user()) ? Auth::guard('admin')->user() : auth()->user();

        static::creating(function ($query) use ($user) {
            if (!empty($user)) {
                $query->created_by = $user->name ? $user->name : ($user->name ?: 'Website');
                $query->updated_by = $user->name ? $user->name : ($user->name ?? '');
            }
        });

        static::updating(function ($query) use ($user) {
            if (!empty($user)) {
                $query->updated_by = $user->name ? $user->name : ($user->name ?? '');
            }
        });
    }

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'user_roles', 'user_id', 'role_id')->withTimestamps();
    }

    public function objects()
    {
        return $this->belongsToMany(ObjectModel::class, 'user_objects', 'user_id', 'object_id')->withTimestamps()->withPivot(['role_id']);
    }

    public function addresses()
    {
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pets(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Pet::class, 'user_id', 'id')->withTrashed();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Order::class);
    }




    //    Check for user roles

    /**
     * @param $role
     *
     * @return bool
     */
    public function hasRole($role): bool
    {
        return $this->hasAnyRole([$role]);
    }

    /**
     * @param array $roles
     *
     * @return bool
     */
    public function hasAnyRole(array $roles): bool
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    public function orderRecipes()
    {
        return $this->hasMany(OrderRecipe::class, 'courier_id', 'id');
    }
}
