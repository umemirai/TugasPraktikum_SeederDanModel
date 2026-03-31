<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReturnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create('id_ID');
        
        
        $returnedDetailIds = DB::table('loan_detail')->where('is_return', true)->pluck('id')->toArray();

        $returns = [];
        foreach ($returnedDetailIds as $detailId) {
            $kenaDenda = $faker->boolean(30); 

            $returns[] = [
                'loan_detail_id' => $detailId,
                'charge'         => $kenaDenda,
                'amount'         => $kenaDenda ? $faker->randomElement([5000, 10000, 15000]) : 0,
            ];
        }
        DB::table('returns')->insert($returns);
    }
}
