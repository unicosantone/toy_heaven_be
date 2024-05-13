<?php

namespace database\seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $contactData = [
            [
                'label_eng' => 'phone/Whatsapp',
                'label_ita' => 'telefono/Whatsapp',
                'value' => '+39 332 3433312',
                'link' => '+39 332 3433312ne',
                'image_id' => 1
            ],
            [
                'label_eng' => 'email',
                'label_ita' => 'email',
                'value' => 'info@unicosantone.com',
                'link' => 'info@unicosantone.com',
                'image_id' => 2
            ],
            [
                'label_eng' => 'Facebook',
                'label_ita' => 'Facebook',
                'value' => '',
                'link' => 'http://unicosantone.com',
                'image_id' => 3
            ],
            [
                'label_eng' => 'Instagram',
                'label_ita' => 'Instagram',
                'value' => '',
                'link' => 'http://unicosantone.com',
                'image_id' => 4
            ],
            [
                'label_eng' => 'ebay',
                'label_ita' => 'ebay',
                'value' => '',
                'link' => 'http://unicosantone.com',
                'image_id' => 5
            ],
            [
                'label_eng' => 'vinted',
                'label_ita' => 'vinted',
                'value' => '',
                'link' => 'http://unicosantone.com',
                'image_id' => 6
            ]
        ];

        DB::table('contacts')->insert($contactData);
    }
}
