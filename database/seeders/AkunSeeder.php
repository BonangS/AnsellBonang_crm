<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('akun')->insert([
            'name' => 'Manager',
            'email' => 'manager@example.com',
            'password' => Hash::make('manager'), // Ganti dengan password yang diinginkan
            'role' => 'MANAGER', // Menambahkan role untuk Admin
        ]);

        DB::table('akun')->insert([
            'name' => 'Sales User',
            'email' => 'sales@example.com',
            'password' => Hash::make('sales'), // Ganti dengan password yang diinginkan
            'role' => 'SALES', // Menambahkan role untuk Sales
        ]);
    }
}
