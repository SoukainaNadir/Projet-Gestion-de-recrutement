<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title= $this->faker->realText($maxNbChars=20,$indexSize = 2);
        return [
            //
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => $this->faker->text(),
            'location' => $this->faker->text(),
            'salary' => $this->faker->numberBetween(100, 10000),
            'jobtype'=> $this-> faker->randomElement(['full-time', 'Part-time', 'Contract','Internship','Temporary']),
            'image' => $this->faker->imageUrl(640,480)
        ];
    }
}
