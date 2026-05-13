<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RatingFactory extends Factory
{
    public function definition(): array
    {
        return [
            'overall'       => $this->faker->numberBetween(1, 5),
            'price'         => $this->faker->optional(0.8)->numberBetween(1, 5),
            'service'       => $this->faker->optional(0.8)->numberBetween(1, 5),
            'staff'         => $this->faker->optional(0.8)->numberBetween(1, 5),
            'quality'       => $this->faker->optional(0.8)->numberBetween(1, 5),
            'comment'       => $this->faker->optional(0.7)->sentence(10),
            'reviewer_name' => $this->faker->optional(0.6)->name(),
            'is_approved'   => false,
        ];
    }

    public function approved(): static
    {
        return $this->state(['is_approved' => true]);
    }

    public function pending(): static
    {
        return $this->state(['is_approved' => false]);
    }

    public function excellent(): static
    {
        return $this->state([
            'overall' => 5,
            'price'   => 5,
            'service' => 5,
            'staff'   => 5,
            'quality' => 5,
        ]);
    }
}
