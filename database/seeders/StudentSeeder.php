<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            'nim' => '2031710034',
            'name' => 'Jihan Rahadatul Aisy',
            'class' => 'MI-2F',
            'department' => 'JTI',
            'phone_number' => '081384256211',
        ]);
        DB::table('students')->insert([
            'nim' => '2031710086',
            'name' => 'Kirana Jenny Alqorni',
            'class' => 'MI-2F',
            'department' => 'JTI',
            'phone_number' => '085645156636',
        ]);
        DB::table('students')->insert([
            'nim' => '2031710107',
            'name' => 'Kristin BR Gultom',
            'class' => 'MI-2F',
            'department' => 'JTI',
            'phone_number' => '082165332470',
        ]);
    }
}
