<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CompanyInfo extends Model
{
    protected $table = 'company_infos';

    protected $guarded = ['id'];

    public static function boot()
    {
        parent::boot();
        $user = !empty(Auth::guard('admin')->user()) ? Auth::guard('admin')->user() : auth()->user();

        static::creating(function ($query) use($user) {
            $query->created_by = $user->name ? $user->name : ($user->name ? : 'Website');
            $query->updated_by = $user->name ? $user->name : ($user->name ?? '' );
        });

        static::updating(function ($query) use($user) {
            $query->updated_by = $user->name ? $user->name : ($user->name ?? '' );

        });
    }
}
