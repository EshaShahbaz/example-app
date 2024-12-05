<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Person;
use Faker\Factory as Faker;

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        for($i=1; $i<=100; $i++)
        {
        $person = new Person;
        $person->name = $faker->name;
        $person->email = $faker->email;
        $person->password = md5($faker->password);
        $person->password_confir = "123";
        $person->save();
        }
    }
}
