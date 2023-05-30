<?php

namespace Database\Seeders;

use App\Models\DogWeightLvlPercentage;
use Illuminate\Database\Seeder;

class DogWeightLvlPercentagesSeeder extends Seeder
{
    protected $values = [
        [
            'name' => 'Underweight',
            'weight_lvl' => 1,
            'percentage' => 5,
        ],
        [
            'name' => 'Healthy',
            'weight_lvl' => 2,
            'percentage' => 0,
        ],
        [
            'name' => 'Overweight',
            'weight_lvl' => 3,
            'percentage' => -5,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DogWeightLvlPercentage::first()) {
            foreach ($this->values as $value) {
                DogWeightLvlPercentage::create($value);
            }
        }
    }
}
