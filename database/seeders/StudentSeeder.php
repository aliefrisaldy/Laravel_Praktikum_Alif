<?php
namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class StudentSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('students')->insert([
            [
                'name' => 'Muhammad Alif Risaldy',
                'student_id_number' => 'F55123055',
                'email' => 'Alif@gmail.com',
                'phone_number' => '6282259709369',
                'birth_date' => '2005-10-16',
                'gender' => 'Male',
                'status' => 'Active',
                'major_id' => 1,
            ],
        ]);
    }
}
