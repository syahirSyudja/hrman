<?php

use Illuminate\Database\Seeder;
use App\Division;

class DivisionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Division::create([
            'name' => 'IT Research & Development',
            'description' => 'Web application development using Laravel Framework',
            'is_active' => '1'
        ]);
    }
}
