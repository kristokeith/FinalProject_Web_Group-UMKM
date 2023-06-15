<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class kategori extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori')->insert([
            'id' => '1',
            'name' => 'Application',
        ]);
        DB::table('kategori')->insert([
            'id' => '2',
            'name' => 'Publishing',
        ]);
        DB::table('kategori')->insert([
            'id' => '3',
            'name' => 'Game',
        ]);
        DB::table('kategori')->insert([
            'id' => '4',
            'name' => 'kriya',
        ]);
        DB::table('kategori')->insert([
            'id' => '5',
            'name' => 'Photography',
        ]);
        DB::table('kategori')->insert([
            'id' => '6',
            'name' => 'Architecture',
        ]);
    }
}
