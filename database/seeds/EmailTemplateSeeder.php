<?php

use Illuminate\Database\Seeder;
use App\Email_Template;
use Faker\Factory;

class EmailTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $data = [
            [
                'name'  => 'Thank email',
                'title' => $faker->unique()->jobTitle,
                'content' => $faker->unique()->realText(),
                'created_at' => now(),
            ],
            [
                'name'  => 'Schedule interview email',
                'title' => $faker->unique()->jobTitle,
                'content' => $faker->unique()->realText(),
                'created_at' => now(),
            ],
            [
                'name'  => 'schedule work email',
                'title' => $faker->unique()->jobTitle,
                'content' => $faker->unique()->realText(),
                'created_at' => now(),
            ],
        ];

        Email_Template::insert($data);
    }
}
