<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LoanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $loanIds = DB::table('loans')->pluck('id')->toArray();
        $bookIds = DB::table('books')->pluck('id')->toArray();

        $loanDetails = [];

        foreach ($loanIds as $loanId) {
            $jumlahBuku = rand(1, 2);
            for ($j = 0; $j < $jumlahBuku; $j++) {
                $loanDetails[] = [
                    'loan_id'    => $loanId,
                    'book_id'    => $faker->randomElement($bookIds),
                    'is_return'  => $faker->boolean(70),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }
        DB::table('loan_detail')->insert($loanDetails);
    }
}
