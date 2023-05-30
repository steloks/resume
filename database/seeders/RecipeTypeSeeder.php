<?php

namespace Database\Seeders;

use App\Models\RecipeType;
use Illuminate\Database\Seeder;

class RecipeTypeSeeder extends Seeder
{
    protected $recipeTypes = [
        [
            'name' => 'Age: 1m. - 15m.',
            'min_age' => 1,
            'max_age' => 15,
        ],
        [
            'name' => 'Age: 15m. - 7y.',
            'min_age' => 15,
            'max_age' => 84,
        ],
        [
            'name' => 'Age: 7y. +',
            'min_age' => 84,
            'max_age' => null,
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->recipeTypes as $recipeType) {
            RecipeType::updateOrCreate(['name' => $recipeType['name']], $recipeType);
        }
    }
}
