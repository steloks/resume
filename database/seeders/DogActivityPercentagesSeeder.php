<?php

namespace Database\Seeders;

use App\Models\DogActivityPercentage;
use Illuminate\Database\Seeder;

class DogActivityPercentagesSeeder extends Seeder
{
    protected $values = [
        [
            'name' => 'Low',
            'activity_lvl' => 1,
            'percentage' => -5,
        ],
        [
            'name' => 'Normal',
            'activity_lvl' => 2,
            'percentage' => 0,
        ],
        [
            'name' => 'High',
            'activity_lvl' => 3,
            'percentage' => 5,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!DogActivityPercentage::first()) {
            foreach ($this->values as $value) {
                DogActivityPercentage::create($value);
            }
        }
    }
}
