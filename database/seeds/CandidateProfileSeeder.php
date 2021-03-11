<?php

use Illuminate\Database\Seeder;

class CandidateProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Candidate_Profile::class, 55)->create();
    }
}
