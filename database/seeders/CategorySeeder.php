<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['category' => 'Teknik Informatika'],
            ['category' => 'Sistem Informasi'],
            ['category' => 'Kecerdasan Buatan'],
            ['category' => 'Jaringan Komputer'],
            ['category' => 'Fiksi & Sastra']
        ];
        DB::table('categories')->insert($categories);
    }
}
