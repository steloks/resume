<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Role extends Model
{
    use SoftDeletes;

    protected $table = 'roles';

    protected $guarded = ['id'];

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class, 'user_roles', 'role_id', 'user_id')->withTimestamps()->withTrashed();
    }

    public function modules()
    {
        return $this->belongsToMany(Module::class)->withPivot(['show_module', 'create_edit', 'view', 'delete'])->withTimestamps();
    }
}
