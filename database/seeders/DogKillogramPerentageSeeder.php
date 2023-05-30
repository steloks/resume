<?php

namespace Database\Seeders;

use App\Models\DogKillogramPercentage;
use Illuminate\Database\Seeder;

class DogKillogramPerentageSeeder extends Seeder
{
    protected $values = [
        [
            'name' => 'Small',
            'min_age' => 5,
            'max_age' => 10,
            'percentage' => 4,
        ],
        [
            'name' => 'Medium',
            'min_age' => 11,
            'max_age' => 25,
            'percentage' => 2.5,
        ],
        [
            'name' => 'Large',
            'min_age' => 26,
            'max_age' => 44,
            'percentage' => 1.5,
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->values as $value) {
            DogKillogramPercentage::updateOrCreate(['name' => $value['name']], $value);
        }
    }
}
