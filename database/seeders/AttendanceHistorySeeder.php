<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Student\AttendanceHistory;
use App\Models\Admin\SubjectModel;
use App\Models\Student\StudentAccount;
use App\Models\Teacher\TeacherAccount;
use App\Models\TeacherGradeHandle;

class AttendanceHistorySeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $statuses = ['Present', 'Absent', 'Late'];

        foreach (range(1, 50) as $index) {
            AttendanceHistory::create([
                'subject_model_id' => SubjectModel::all()->random()->id,
                'student_id' => StudentAccount::all()->random()->id,
                'teacher_id' => TeacherAccount::all()->random()->id,
                'grade_handle_id' => TeacherGradeHandle::all()->random()->id,
                'status' => $faker->randomElement($statuses),
                'date' => $faker->date('Y-m-d'),
                'time_in' => $faker->time('H:i:s'),
            ]);
        }
    }
}