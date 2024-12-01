<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;
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
        $category=[1,8,9];
        $randomIndex = array_rand($category);
        return [
            'title'=>fake()->text(),
            'category_id'=>$category[$randomIndex],
            'description'=>fake()->paragraph(),
            'created_by'=>1
        ];
    }
}
