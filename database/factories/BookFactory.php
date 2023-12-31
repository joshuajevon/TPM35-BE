<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->text(20),
            'author' => $this->faker->name(),
            'publication_date' => $this->faker->date(),
            'stock' => $this->faker->numberBetween(10,100),
            'image' => 'harrypotter.jpg',
            'category_id' => $this->faker->numberBetween(1,4)
        ];
    }
}
