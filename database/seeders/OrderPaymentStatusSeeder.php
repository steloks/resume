<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class OrderPaymentStatusSeeder extends Seeder
{
    protected $statuses = [
        [
            'name'  => 'Paid',
            'type'  => 'order_payment',
            'color' => '#C59F7B',
            'is_default' => '1',
        ],
        [
            'name'  => 'Amount to return',
            'type'  => 'order_payment',
            'color' => '#803134',
        ],
        [
            'name'  => 'Amount returned',
            'type'  => 'order_payment',
            'color' => '#C4C4C4',
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
