<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    protected $statuses = [
        [
            'name'  => 'Received',
            'type'  => 'order',
            'color' => '#C59F7B',
            'is_default' => '1',
        ],
        [
            'name'  => 'Preparing',
            'type'  => 'order',
            'color' => '#803134',
        ],
        [
            'name'  => 'In transit',
            'type'  => 'order',
            'color' => '#C4C4C4',
        ],
        [
            'name'  => 'Delivered',
            'type'  => 'order',
            'color' => '#88B2B1',
        ],
        [
            'name'  => 'Partially cancelled',
            'type'  => 'order',
            'color' => '#88B2B1',
        ],
        [
            'name'  => 'Cancelled',
            'type'  => 'order',
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
