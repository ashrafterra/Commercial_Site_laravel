<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name'=>'Sales', 'email' => 'sales@utc.com','password' => '$2y$10$QOVpBCx82GITKXSqMmjCYuOHxDbc9jd8zgk2qmP6ODb.qsNIEEFPe'],

            ['name'=>'Customer Support', 'email' => 'CS@utc.com','password' => '$2y$10$QOVpBCx82GITKXSqMmjCYuOHxDbc9jd8zgk2qmP6ODb.qsNIEEFPe'],
        ]);

    }
}
