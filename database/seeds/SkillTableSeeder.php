<?php

use Illuminate\Database\Seeder;
use App\Skill;

class SkillTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Skill::create([
            'name' => 'Script Kiddie',
            'description' => 'Scripting PHP using Laravel Framework',
            'is_active' => '1'
        ]);
    }
}
