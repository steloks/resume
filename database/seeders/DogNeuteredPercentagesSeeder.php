<?php

namespace Database\Seeders;

use App\Models\DogNeuteredPercentage;
use Illuminate\Database\Seeder;

class DogNeuteredPercentagesSeeder extends Seeder
{
    protected $values = [
        [
            'neutered' => 0,
            'percentage' => 0,
        ],
        [
            'neutered' => 1,
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
        if (!DogNeuteredPercentage::first()) {
            foreach ($this->values as $value) {
                DogNeuteredPercentage::create($value);
            }
        }
    }
}
