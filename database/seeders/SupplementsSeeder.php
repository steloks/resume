<?php

namespace Database\Seeders;

use App\Models\Supplement;
use Illuminate\Database\Seeder;

class SupplementsSeeder extends Seeder
{
    protected $values = [
        [
            'name' => 'Supplement',
            'label' => 'supplement',
            'value' => 150,
        ],
        [
            'name' => 'Hard Supplement',
            'label' => 'hard_supplement',
            'value' => 6,
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Supplement::first()) {
            foreach ($this->values as $value) {
                Supplement::create($value);
            }
        }
    }
}
