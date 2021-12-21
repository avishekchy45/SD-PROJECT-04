<?php

namespace Database\Seeders;

use App\Models\CourseLimitation;
use Illuminate\Database\Seeder;

class CourseLimitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (CourseLimitation::count() == 0) {

            CourseLimitation::insert([

                [
                    'max_student' => 4,
                    'max_credit' => 16,
                    'cost_per_credit' => 1800,
                ],
            ]);
        } else {
            echo "\e[31mTable is not empty, therefore NOT ";
        }
    }
}
