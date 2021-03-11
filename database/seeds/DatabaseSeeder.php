<?php

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
        // $this->call(UserSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(SourceSeeder::class);
        $this->call(EmailTemplateSeeder::class);
        $this->call(CandidateProfileSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
