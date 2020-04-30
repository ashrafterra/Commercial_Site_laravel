<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->insert([
            ['user_id'=>1,'name'=> 'Cat-6 Network Cable','brand_id' => 1,'description'=> 'Copper cable, category 6 U/UTP, CM, 4-pair, conductors are 24 AWG, twisted in pairs and protected by a flame-retardant PVC jacket, blue.','price' => 2800,'filename' => 'images/Panduit Network cable.jpg','contact_email'=>'sales@utceg.com','category'=>'Copper Network Cables', 'contact_telephone'=>'+201147251639'],
        ]);
    }
}
