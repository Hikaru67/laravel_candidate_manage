<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
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
                'name' => 'UserHr',
                'username' => 'userhr',
                'email' => 'shinigamii.hikaru@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id' => 1,
                'remember_token' => Str::random(10),
            ],
            [
                'name' => 'Interviewer',
                'username' => 'interviewer',
                'email' => 'shoppingall4youu@gmail.com',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                'role_id' => 1,
                'remember_token' => Str::random(10),
            ]
        ];

        Source::insert($data);
        factory(App\User::class, 5)->create();
    }
}
