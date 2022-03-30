<?php

namespace Database\Factories;

use App\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelFactory extends Factory
{
        /**
     * Define the model's default state.
     * 
     *
     * @return string
     */
        protected $model = Level::class;
        
 
    /**
     * Define the model's default state.
     * 
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => json_encode([
                'ar' =>$this->faker->word(),
                'en' =>$this->faker->word(),
            ])
        ];
    }
}
