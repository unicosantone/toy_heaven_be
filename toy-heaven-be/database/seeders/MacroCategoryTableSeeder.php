<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MacroCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $macroCategoryData = [
            [
                "label_ita" => "Action Figures",
                "label_eng" => "Action Figures",
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "label_ita" => "Robot",
                "label_eng" => "Robot",
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "label_ita" => "Bambole",
                "label_eng" => "Dolls",
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                "label_ita" => "Lego",
                "label_eng" => "Lego",
                "created_at" => now(),
                "updated_at"=> now()
            ],
        ];
        
        DB::table('macro_categories')->insert($macroCategoryData);
    }
}
