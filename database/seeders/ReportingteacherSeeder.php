<?php

namespace Database\Seeders;
use App\Models\Reportingteacher;

use Illuminate\Database\Seeder;

class ReportingteacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reportingteacher::insert([

            [
                'teacher_name' => 'jomit',

            ],
            [
                'teacher_name' => 'bibith',

            ],
            [
                'teacher_name' => 'steffy',

            ],


        ]);
    }
}
