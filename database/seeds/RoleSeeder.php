<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleSeeder extends Seeder
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
                'name'  => 'Hr',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name'  => 'Interviewer',
                'created_at' => now(),
            ],
        ];

        Role::insert($data);
    }
}
