<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('obat')->insert([
            'nama_obat' => Str::random(10),
            'kemasan' => 'Box ' . rand(1, 5) . ' strip',
            'harga' => rand(1000, 10000),
        ]);
    }
}
