<?php

namespace Database\Factories;

use App\Models\Exam;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExamFactory extends Factory
{
            /**
     * Define the model's default state.
     * 
     *
     * @return string
     */
    protected $model = Exam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {   
        static $i = 0;
        $i++;

        return [
            'name' => json_encode([
                'ar' =>$this->faker->word(),
                'en' =>$this->faker->word(),
            ]),
            'desc' => json_encode([
                'ar' =>$this->faker->text(5000),
                'en' =>$this->faker->text(5000),
            ]),
            'img' => "exams/$i.png",
            'questions_num' => 15,
            'duration_h' => $this->faker->numberBetween(1,3) * 24,
            'opening_duration' => $this->faker->numberBetween(1,3) * 24,
            'code' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'all_codes' => $this->faker->randomElement(['51asdf1asdf','das4fADs4']),

            
        ];
    }
}
