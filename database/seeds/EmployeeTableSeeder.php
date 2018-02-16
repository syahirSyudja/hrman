<?php

use Illuminate\Database\Seeder;
use App\Employee;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::create([
            'first_name' => 'Syahir',
            'last_name' => 'Syudja',
            'profile' => 'from Geeksfarm Batch 2',
            'photo' => '1Syudja_photo.jpg',
            'skill_id' => '1',
            'division_id' => '1',
        ]);
    }
}
