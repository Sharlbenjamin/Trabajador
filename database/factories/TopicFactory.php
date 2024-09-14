<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Topic;

class TopicFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Topic::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'topic' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'category_id' => Category::factory(),
        ];
    }
}
