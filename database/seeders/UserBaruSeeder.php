<?php namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserBaruSeeder extends Seeder
{ //file seeder UserBaruSeeder untuk menambahkan kolom username pada table user
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([ //DATA AWAL BARU LOGIN MENGGUNAKAN USERNAME 
            'username' => 'admin',
            'name' => 'Administrator Baru',
            'email' => 'admin.baru@admin.com',
            'password' => Hash::make('password'),
        ]);
    }
}
