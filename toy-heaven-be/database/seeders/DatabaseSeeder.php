<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(FaqTableSeeder::class);
        $this->call(ConditionTableSeeder::class);
        $this->call(ImageTableSeeder::class);
        $this->call(ContactTableSeeder::class);

        $this->call(ShowTableSeeder::class);

        $this->call(MacroCategoryTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(SubCategoryTableSeeder::class);

        $this->call(ProductTableSeeder::class);


    }
}
