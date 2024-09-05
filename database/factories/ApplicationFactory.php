<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\Application;
use App\Models\User;

class ApplicationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Application::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'account_id' => Account::factory(),
            'company' => $this->faker->company(),
            'date' => $this->faker->date(),
            'job_title' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'status' => $this->faker->randomElement(["applied","interview","accepted","rejected"]),
            'expected_reply_date' => $this->faker->date(),
            'priority' => $this->faker->randomElement(["low","medium","high","important"]),
            'salary' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
