<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Mission;
use App\Models\Task;
use App\Models\User;

class TaskFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Task::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'mission_id' => Mission::factory(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'time' => $this->faker->date(),
            'status' => $this->faker->boolean(),
        ];
    }
}
