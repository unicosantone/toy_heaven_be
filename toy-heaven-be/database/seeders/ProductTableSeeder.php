<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $productData = [
            [
                'code' => 'A978628', 
                'quantity' => 3, 
                'name_ita' => 'Action Figure Star Wars Action Figure', 
                'name_eng' => 'Star Wars Action Figure', 
                'year' => 1995, 
                'description_ita' => 'Detailed figure from the legendary space saga. in italiano.', 
                'description_eng' => 'Detailed figure from the legendary space saga.', 
                'price' => 89, 
                'in_evidence' => false, 
                'condition_id' => 3, 
                'sub_category_id' => 2,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A219013', 
                'quantity' => 10,
                'name_ita' => 'Action Figure He-Man',
                'name_eng' => 'He-Man', 
                'year' => 1985, 
                'description_ita' => 'The leader of the heroic team, with sword. in italiano.',
                'description_eng' => 'The leader of the heroic team, with sword.', 
                'price' => 60, 
                'in_evidence' => true, 
                'condition_id' => 1, 
                'sub_category_id' => 3,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A886201', 
                'quantity' => 1, 
                'name_ita' => 'Action Figure He-Man', 
                'name_eng' => 'He-Man', 
                'year' => 1980, 
                'description_ita' => 'The leader of the heroic team, with sword. in italiano.', 
                'description_eng' => 'The leader of the heroic team, with sword.', 
                'price' => 26, 
                'in_evidence' => true, 
                'condition_id' => 2, 
                'sub_category_id' => 2,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A845175', 
                'quantity' => 9, 
                'name_ita' => 'Action Figure Barbie', 
                'name_eng' => 'Barbie', 
                'year' => 1980, 
                'description_ita' => 'Fashion icon and role model with various outfits. in italiano.', 
                'description_eng' => 'Fashion icon and role model with various outfits.', 
                'price' => 83, 
                'in_evidence' => false, 
                'condition_id' => 4, 
                'sub_category_id' => 1,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A628507', 
                'quantity' => 5, 
                'name_ita' => 'Action Figure Barbie', 
                'name_eng' => 'Barbie', 
                'year' => 1990, 
                'description_ita' => 'Fashion icon and role model with various outfits. in italiano.', 
                'description_eng' => 'Fashion icon and role model with various outfits.', 
                'price' => 98, 
                'in_evidence' => false, 
                'condition_id' => 5, 
                'sub_category_id' => 3,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A537510', 
                'quantity' => 14,
                'name_ita' => 'Action Figure ThunderCats', 
                'name_eng' => 'ThunderCats', 
                'year' => 1990, 
                'description_ita' => 'A beloved figure from the children s cartoon show. in italiano.', 
                'description_eng' => 'A beloved figure from the children s cartoon show.', 
                'price' => 71, 
                'in_evidence' => false, 
                'condition_id' => 5,
                'sub_category_id' => 1,
                "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A892274', 
                'quantity' => 3, 
                'name_ita' => 'Action Figure Optimus Prime', 
                'name_eng' => 'Optimus Prime', 
                'year' => 1995, 
                'description_ita' => 'A popular character from the animated series. in italiano.',
                'description_eng' => 'A popular character from the animated series.',
                'price' => 58, 
                'in_evidence' => true, 
                'condition_id' => 4, 
                'sub_category_id' => 3,
                 "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A304545', 
                'quantity' => 12,
                'name_ita' => 'Action Figure Mega Man', 
                'name_eng' => 'Mega Man', 
                'year' => 1985, 
                'description_ita' => 'Equipped with a blaster and iconic suit. in italiano.', 
                'description_eng' => 'Equipped with a blaster and iconic suit.', 
                'price' => 66, 
                'in_evidence' => true, 
                'condition_id' => 2, 
                'sub_category_id' => 1,
                 "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A427835', 
                'quantity' => 16,
                'name_ita' => 'Action Figure ThunderCats', 
                'name_eng' => 'ThunderCats', 
                'year' => 1980, 
                'description_ita' => 'A beloved figure from the children s cartoon show. in italiano.', 
                'description_eng' => 'A beloved figure from the childrens cartoon show.', 
                'price' => 93, 
                'in_evidence' => false, 
                'condition_id' => 5, 
                'sub_category_id' => 2,
                 "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A316972', 
                'quantity' => 20,
                'name_ita' => 'Action Figure Power Rangers', 
                'name_eng' => 'Power Rangers', 
                'year' => 1985, 
                'description_ita' => 'Team of heroes with morphing abilities. in italiano.', 
                'description_eng' => 'Team of heroes with morphing abilities.',
                'price' => 92, 
                'in_evidence' => false, 
                'condition_id' => 3, 
                'sub_category_id' => 1,
                 "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A218978', 
                'quantity' => 2, 
                'name_ita' => 'Action Figure G.I. Joe', 
                'name_eng' => 'G.I. Joe', 
                'year' => 1990, 
                'description_ita' => 'Military hero with camouflage uniform. in italiano.', 
                'description_eng' => 'Military hero with camouflage uniform.', 
                'price' => 67, 
                'in_evidence' => false, 
                'condition_id' => 1, 
                'sub_category_id' => 3,
                 "created_at" => now(),
                "updated_at"=> now()
            ],
            [
                'code' => 'A849315', 
                'quantity' => 19,
                'name_ita' => 'Action Figure Optimus Prime', 
                'name_eng' => 'Optimus Prime', 
                'year' => 1995, 
                'description_ita' => 'A popular character from the animated series. in italiano.', 
                'description_eng' => 'A popular character from the animated series.', 
                'price' => 14, 
                'in_evidence' => true, 
                'condition_id' => 5, 
                'sub_category_id' => 3,
                "created_at" => now(),
                "updated_at"=> now()
            ]
        ];

        DB::table('products')->insert($productData);
    }
}
