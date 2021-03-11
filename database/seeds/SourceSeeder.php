<?php

use Illuminate\Database\Seeder;
use App\Source;

class SourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'id' => 1,
                'name'  => 'TopCV',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name'  => 'Jobsgo',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name'  => 'Vietcv',
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'name'  => 'Facebook',
                'created_at' => now(),
            ],
        ];

        Source::insert($data);
    }
}
