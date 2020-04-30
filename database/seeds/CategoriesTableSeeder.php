<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            ['category' => 'Copper Network Cables'],
            ['category' => 'Fiber Cables'],
            ['category' => 'Patch Cords'],
            ['category' => 'Patch Panels'],
            ['category' => 'Pigtails'],
            ['category' => 'Connectors'],
            ['category' => 'Faceplates'],
            ['category' => 'Power Distribution'],
            ['category' => 'Racks'],
        ]);
    }
}
