<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Subject;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Subject::insert([

            [
                'id' => 1,
                'subject_name' => 'maths',

            ],
            [
                'id' => 2,
                'subject_name' => 'science',

            ],
            [
                'id' => 3,
                'subject_name' => 'history',

            ]

        ]);
    }
}
