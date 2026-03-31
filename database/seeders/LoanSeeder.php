<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class LoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        $npms = DB::table('users')->pluck('npm')->toArray();

        $loans = [];
        for ($i = 0; $i < 20; $i++) {
            $loanAt = $faker->dateTimeBetween('-1 month', '-1 week');
            $returnAt = clone $loanAt;
            $returnAt->modify('+7 days');

            $loans[] = [
                'user_npm'   => $faker->randomElement($npms),
                'loan_at'    => $loanAt,
                'return_at'  => $returnAt,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        DB::table('loans')->insert($loans);
    }
}
