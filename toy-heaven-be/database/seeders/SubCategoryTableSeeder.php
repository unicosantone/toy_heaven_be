<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      
        $subCategoryData = [
            [
                "image_id" => 1,
                "label_ita" => "Spider Man",
                "label_eng" => "Spider Man",
                "category_id" => 1,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "Iron Man",
                "label_eng" => "Iron Man",
                "category_id" => 1 ,
                "created_at" => now(),
                "updated_at"=> now()           
            ],
            [
                "image_id" => 1,
                "label_ita" => "Thor",
                "label_eng" => "Thor",
                "category_id" => 1,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "Batman",
                "label_eng" => "Batman",
                "category_id" => 2,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "Superman",
                "label_eng" => "Superman",
                "category_id" => 2,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "image_id" => 1,
                "label_ita" => "AntMan",
                "label_eng" => "AntMan",
                "category_id" => 1,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            
        ];
        
        DB::table('sub_categories')->insert($subCategoryData);

    }
}
