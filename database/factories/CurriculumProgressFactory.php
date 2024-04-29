<?php

namespace Database\Factories;

use App\Models\CurriculumProgress;
use Illuminate\Database\Eloquent\Factories\Factory;

class CurriculumProgressFactory extends Factory
{
    protected $model = CurriculumProgress::class;

    public function definition()
    {
        return [
            'curriculums_id' => 1,
            'users_id' => 1,
            'clear_flg' => $this->faker->randomElement([0, 1]),
        ];
    }
}
