<?php

namespace Database\Seeders;

use App\Models\Exam;
use App\Models\Level;
use App\Models\Question;
use App\Models\Skill;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::factory()->has(
        Skill::factory()->has(
        Exam::factory()->has(
        Question::factory()->count(60),
        )->count(2)
        )->count(2)
        )->count(3)->create();  //6
    }
}
