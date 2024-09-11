<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Subject;

class SubjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subject::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'category' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'topic' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'subject' => $this->faker->regexify('[A-Za-z0-9]{100}'),
        ];
    }
}
