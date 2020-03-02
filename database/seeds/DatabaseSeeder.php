<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class
            ,BrandTableSeeder::class
            ,SizeTableSeeder::class
            ,ColorTableSeeder::class
            ,ProductTableSeeder::class
            ,ProductVariationTableSeeder::class
            ,APISeeder::class
        ]);
    }
}
