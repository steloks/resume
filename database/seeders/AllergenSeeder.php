<?php

namespace Database\Seeders;

use App\Models\Allergen;
use Illuminate\Database\Seeder;

class AllergenSeeder extends Seeder
{
    protected $allergens = [
        'Gluten',
        'Crustaceans',
        'Eggs',
        'Fish',
        'Peanuts',
        'Soybeans',
        'Milk',
        'Nuts',
        'Celery',
        'Mustard',
        'Sesame Seeds',
        'Sulphur dioxide and sulphites',
        'Lupin',
        'Molluscs',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->allergens as $allergen) {
            Allergen::firstOrCreate(['name' => ucfirst($allergen)]);
        }
    }
}
