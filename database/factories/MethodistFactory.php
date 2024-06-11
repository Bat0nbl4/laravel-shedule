<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Methodist>
 */
class MethodistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::whereNotIn('id', function ($query) {
                $query->select('user_id')->from('methodists');
            })->inRandomOrder()->first(),
        ];
    }
}
