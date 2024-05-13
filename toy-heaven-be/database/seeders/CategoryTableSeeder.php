<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
     
        $CategoryData = [
            [
                "image_id" => 1,
                "label_ita" => "Marvel",
                "label_eng" => "Marvel",
                "macro_category_id" => 1,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "DC",
                "label_eng" => "DC",
                "macro_category_id" => 1,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "One Piece",
                "label_eng" => "One Piece",
                "macro_category_id" => 1,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "Furby",
                "label_eng" => "Furby",
                "macro_category_id" => 3,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "Barbie",
                "label_eng" => "Barbie",
                "macro_category_id" => 3,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "Transformers",
                "label_eng" => "Transformers",
                "macro_category_id" => 2,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "Byonichles",
                "label_eng" => "Byonichles",
                "macro_category_id" => 2,
                "created_at" => now(),
                "updated_at"=> now()
            ]
            ];
        
        DB::table('categories')->insert($CategoryData);
    }
}
