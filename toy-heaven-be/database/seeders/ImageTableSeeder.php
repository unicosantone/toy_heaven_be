<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $imageData = [
            [
                'path' => '/contacts-logo/tel.png'
            ],
            [
                'path' => '/contacts-logo/em.svg'
            ],
            [
                'path' => '/contacts-logo/fb.png'
            ],
            [
                'path' => '/contacts-logo/inst.png'
            ],
            [
                'path' => '/contacts-logo/eb.png'
            ],
            [
                'path' => '/contacts-logo/vint.png'
            ],
        ];

        DB::table('images')->insert($imageData);
    }
}
