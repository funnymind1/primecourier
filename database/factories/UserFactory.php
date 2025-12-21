<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'email_address' => "hello@" . config('app.domain'),
            'email_verified_at' => now(),
            'password' => Hash::make('Secured@0908'),
            'account_role' => "MANAGER",
            'account_status' => "ACTIVE",
        ];
    }
}
