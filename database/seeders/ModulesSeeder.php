<?php

namespace Database\Seeders;

use App\Models\Module;
use Illuminate\Database\Seeder;

class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $collected = collect(json_decode(file_get_contents(base_path('resources/data/menus/vertical-menu.json'))))->flatten();
        $names = $collected->pluck('name')->toArray();
        $submenu = $collected->pluck('submenu')->flatten()->pluck('name')->toArray();
        $all = array_merge($names, $submenu);
//dd(array_filter($all));
        foreach (array_filter($all) as $module) {
            Module::updateOrCreate(['name' => $module]);
        }
    }
}
