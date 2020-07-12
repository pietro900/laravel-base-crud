<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Student;


class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 10 ; $i++) {
           $newStudent = new Student();
           $newStudent->first_name = $faker->firstName();
           $newStudent->last_name = $faker->lastName();
           $newStudent->student_id_nr = $faker->bothify('????######');
           $newStudent->email = $faker->safeEmail;
           $newStudent->save();
       }
    }
}
