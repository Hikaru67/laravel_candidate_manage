<?php

use Illuminate\Database\Seeder;
use App\Position;

class PositionSeeder extends Seeder
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
                'name'  => 'C#',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name'  => 'Php',
                'created_at' => now(),
            ],
            [
                'id' => 3,
                'name'  => 'Nodejs',
                'created_at' => now(),
            ],
            [
                'id' => 4,
                'name'  => 'Reactjs',
                'created_at' => now(),
            ],
        ];

        Position::insert($data);
    }
}
