<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Magazine>
 */
class MagazineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->name(),
            'slug' => $this->faker->unique()->name(),
            'uid' => $this->faker->realText(30),
            'description' => $this->faker->text(70),
            'image' => $this->faker->imageUrl(400, 400),
            'user_id' => User::factory()
        ];
    }
}
