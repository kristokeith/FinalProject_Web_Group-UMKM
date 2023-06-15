<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => '1',
            'name' => 'UMKMAdmin',
            'role' => 'admin',
            'email' => 'umkm@admin.com',
            'password' => '$2y$10$vjV8pckWDNDhFXkrFfcgru8l5VotQpLZCGpbY9e5kPXOmc2nkaxAy'
        ]);
    }
}
