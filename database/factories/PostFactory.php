<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use \App\Models\User;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = $this->faker->name();

        // Get all image filenames from the public storage directory
        $imageFilenames = scandir(public_path('storage'));

        // Remove "." and ".." from the list
        $imageFilenames = array_diff($imageFilenames, ['.', '..']);

        // Randomly select an image filename
        $randomImage = $imageFilenames[array_rand($imageFilenames)];
        return [
            'user_id' => User::factory(),
            'title' => fake()->sentence,
            'content' => fake()->paragraph,
            'image_url' =>'storage/' . $randomImage,

        ];
    }
    
}
