<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;
use App\Models\StudentAccount as Student;
use App\Models\AdminAccount as Admin;
use App\Models\TeacherAccount as Teacher;
use App\Models\GuidanceAccount as Guidance;


class AccountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $defaultPassword = 'password';

        foreach (range(1, 100) as $index) {
            Student::create([
                'id_number' => $faker->unique()->numerify('##########'),
                'name' => $faker->name,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'strand' => $faker->randomElement(['ICT', 'ABM', 'HE', 'HUMSS']),
                'grade' => $faker->numberBetween(1, 12),
                'parents_contact_number' => $faker->phoneNumber,
                'username' => $faker->userName,
                'password' => $defaultPassword,
                'email' => $faker->unique()->safeEmail,
                'profile' => 'profiles/CB3weYefVHn3ZEGU9autkG8mhIGhgdyLOXUFLdws.jpg',
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);


            Admin::create([
                'id_number' => $faker->unique()->numerify('##########'),
                'name' => $faker->name,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'username' => $faker->userName,
                'password' => $defaultPassword,
                'email' => $faker->unique()->safeEmail,
                'profile' => 'profiles/CB3weYefVHn3ZEGU9autkG8mhIGhgdyLOXUFLdws.jpg',
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);

            Guidance::create([
                'id_number' => $faker->unique()->numerify('##########'),
                'name' => $faker->name,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'username' => $faker->userName,
                'password' => $defaultPassword,
                'email' => $faker->unique()->safeEmail,
                'profile' => 'profiles/CB3weYefVHn3ZEGU9autkG8mhIGhgdyLOXUFLdws.jpg',
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);


            Teacher::create([
                'id_number' => $faker->unique()->numerify('##########'),
                'name' => $faker->name,
                'gender' => $faker->randomElement(['Male', 'Female']),
                'position' => $faker->randomElement(['Teacher 1', 'Teacher 2', 'Teacher 3']),
                'grade_handle' => $faker->randomElement(['11 ABM', '11 ICT', '11 HUMSS', '11 HE', '12 ABM', '12 ICT', '12 HUMSS', '12 HE']),
                'username' => $faker->userName,
                'password' => $defaultPassword,
                'email' => $faker->unique()->safeEmail,
                'profile' => 'profiles/CB3weYefVHn3ZEGU9autkG8mhIGhgdyLOXUFLdws.jpg',
                'phone_number' => $faker->phoneNumber,
                'address' => $faker->address,
            ]);
        }
    }
}
