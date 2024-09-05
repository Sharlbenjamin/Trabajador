<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Course;
use App\Models\User;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'link' => $this->faker->word(),
            'subject' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'level' => $this->faker->randomElement(["easy","medium","hard","difficult"]),
            'chapters' => $this->faker->numberBetween(-10000, 10000),
            'length' => $this->faker->numberBetween(-10000, 10000),
            'progress' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
