<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $this->call(SubjectSeeder::class);
        $this->call(GenderSeeder::class);
        $this->call(ReportingteacherSeeder::class);
        $this->call(TermSeeder::class);

    }
}
