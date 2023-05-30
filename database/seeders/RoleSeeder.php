<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    protected $roles = [
        'admin',
        'user',
        'client',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->roles as $role) {
            Role::firstOrCreate(['name' => ucfirst($role)]);
        }
    }
}
