<?php

namespace Database\Factories;

use App\Models\Magazine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Draft>
 */
class DraftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'body' => $this->faker->paragraph(),
            'title' => $this->faker->unique()->sentence(),
            'abstract' => $this->faker->realText(75),
            'uid' => $this->faker->realText(50),
            'readTime' => $this->faker->numberBetween(1, 10),
            'visibility' => 'public',
            'magazine_id' => Magazine::factory(),
            'created_at' => mt_rand(1262055681,1262055681)
        ];
    }
}
