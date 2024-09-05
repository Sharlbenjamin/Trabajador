<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\Mission;
use App\Models\User;

class MissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mission::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'account_id' => Account::factory(),
            'name' => $this->faker->name(),
            'company' => $this->faker->company(),
            'priority' => $this->faker->randomElement(["low","medium","high","important"]),
            'urgency' => $this->faker->randomElement(["slow","medium","fast","urgent"]),
            'submission_date' => $this->faker->date(),
            'status' => $this->faker->randomElement(["waiting","received","pending","submitted","accepted"]),
            'income' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
