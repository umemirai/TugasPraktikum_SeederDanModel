<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        // Ambil ID dari tabel master untuk dijadikan Foreign Key
        $categoryIds = DB::table('categories')->pluck('id')->toArray();
        $bookshelfIds = DB::table('bookshelfs')->pluck('id')->toArray();

        $books = [];
        for ($i = 0; $i < 50; $i++) {
            $books[] = [
                'title'        =>ucwords($faker->words(3, true)),
                'author'       => $faker->name(),
                'year'         => $faker->year(),
                'publisher'    => $faker->company(),
                'city'         => $faker->city(),
                'cover'        => 'default-cover.jpg', // Simulasi nama file gambar
                'bookshelf_id' => $faker->randomElement($bookshelfIds),
                'category_id'  => $faker->randomElement($categoryIds),
                'created_at'   => now(),
                'updated_at'   => now(),
            ];
        }
        DB::table('books')->insert($books);
    }
}
