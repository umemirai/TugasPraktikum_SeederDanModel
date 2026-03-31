<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookshelfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $shelves = [
            ['code' => 'RAK-IT1', 'name' => 'Koleksi Pemrograman Dasar'],
            ['code' => 'RAK-IT2', 'name' => 'Koleksi Programming Lanjut'],
            ['code' => 'RAK-UMM', 'name' => 'Koleksi Buku Umum']
        ];
        DB::table('bookshelfs')->insert($shelves);
    }
}
