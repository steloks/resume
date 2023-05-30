<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class OrderRecipeStatusSeeder extends Seeder
{
    protected $statuses = [
        [
            'name'       => 'Ordered',
            'type'       => 'order_recipe',
            'color'      => '#803134',
            'is_default' => '1',
        ],
        [
            'name'  => 'Preparing',
            'type'  => 'order_recipe',
            'color' => '',
        ],
        [
            'name'  => 'Completed',
            'type'  => 'order_recipe',
            'color' => '',
        ],
        [
            'name'  => 'Courier taken',
            'type'  => 'order_recipe',
            'color' => '',
        ],
        [
            'name'  => 'Delivered',
            'type'  => 'order_recipe',
            'color' => '',
        ],
        [
            'name'  => 'Cancelled',
            'type'  => 'order_recipe',
            'color' => '#88B2B1',
        ],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->statuses as $status) {
            Status::updateOrCreate($status);
        }
    }
}
