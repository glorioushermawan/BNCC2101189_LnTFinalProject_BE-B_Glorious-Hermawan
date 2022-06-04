<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategoris')->insert([
            'name' => 'Pakaian',
        ]);

        DB::table('kategoris')->insert([
            'name' => 'Perlengkapan Rumah',
        ]);

        DB::table('kategoris')->insert([
            'name' => 'Olahraga',
        ]);

        DB::table('kategoris')->insert([
            'name' => 'Aksesoris Fashion',
        ]);

        DB::table('kategoris')->insert([
            'name' => 'Kesehatan',
        ]);
    }
}
