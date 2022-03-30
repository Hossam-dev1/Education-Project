<?php

namespace Database\Factories;

use App\Models\Question;
use Illuminate\Database\Eloquent\Factories\Factory;

class QuestionFactory extends Factory
{
            /**
     * Define the model's default state.
     * 
     *
     * @return string
     */
    protected $model = Question::class;

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
            'title' => json_encode([
                'ar' =>$this->faker->sentence(),
            ]),
            'img' => "subjects/$i.png",
            'option_1' => json_encode([
                'ar' =>$this->faker->sentence(5,true),
            ]),
            'option_2' => json_encode([
                'ar' =>$this->faker->sentence(5,true),
            ]),
            'option_3' => json_encode([
                'ar' =>$this->faker->sentence(5,true),
            ]),
            'option_4' => json_encode([
                'ar' =>$this->faker->sentence(5,true),
            ]),
            'right_ans' => $this->faker->numberBetween(1,4)
        ];
    }
}
