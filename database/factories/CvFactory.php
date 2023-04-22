<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cv>
 */
class CvFactory extends Factory
{
    protected $model = \App\Models\Cv::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'address' => $this->faker->address,
            'education' => $this->faker->paragraphs(3, true),
            'experience' => $this->faker->paragraphs(3, true),
            'skills' => $this->faker->paragraphs(3, true),
            'interests' => $this->faker->paragraphs(3, true),
        ];
    }
}
