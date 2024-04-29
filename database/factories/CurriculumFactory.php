<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CurriculumFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'thumbnail' => $this->faker->imageUrl(),
            'description' => $this->faker->paragraph,
            'video_url' => $this->faker->url,
            'always_delivery_flg' => $this->faker->boolean,
            'grades_id' => function () {
                return \App\Models\Grade::inRandomOrder()->first()->id;
            },
        ];
    }
}
