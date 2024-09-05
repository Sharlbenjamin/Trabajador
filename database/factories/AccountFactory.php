<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Account;
use App\Models\User;

class AccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Account::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'website' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'username' => $this->faker->userName(),
            'email' => $this->faker->safeEmail(),
            'account_password' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'password' => $this->faker->password(),
        ];
    }
}
