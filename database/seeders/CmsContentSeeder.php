<?php

namespace Database\Seeders;

use App\Models\Cms;
use Illuminate\Database\Seeder;

class CmsContentSeeder extends Seeder
{
    protected $cms = [
        [
            'slug'   => 'terms-and-conditions',
            'title'   => 'Terms and Conditions',
            'type'    => 'info',
            'content' => 'terms',
        ],
        [
            'slug'   => 'privacy-policy',
            'title'   => 'Privacy Policy',
            'type'    => 'info',
            'content' => 'privacy',
        ],
        [
            'slug'   => 'delivery-and-payment-policy',
            'title'   => 'Delivery and Payment policy',
            'type'    => 'info',
            'content' => 'delivery',
        ],
        [
            'slug'   => 'cookie-policy',
            'title'   => 'Cookie Policy',
            'type'    => 'info',
            'content' => 'cookie',
        ],
    ];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cms = new Cms();
        foreach ($this->cms as $cm) {
            if (!$cms->newQuery()->where('title', $cm['title'])->where('type', $cm['type'])->exists()) {
                Cms::query()->updateOrCreate([
                    'slug' => $cm['slug'],
                    'title' => $cm['title'],
                    'type'  => $cm['type'],
                ], [
                    'content' => $cm['content'],
                ]);
            }
        }
    }
}
