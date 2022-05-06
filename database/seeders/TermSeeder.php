<?php

namespace Database\Seeders;
use App\Models\Term;

use Illuminate\Database\Seeder;

class TermSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Term::insert([

            [
                'term' => 'first_term',

            ],
            [
                'term' => 'second_term',

            ],
            [
                'term' => 'third_term',

            ],

        ]);
    }
}
