<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Operator>
 */
class OperatorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'operator_tel' => $this->faker->phoneNumber(),
            'name' => $this->faker->unique()->name,
            'operator_tel' => $this->faker->phoneNumber(),
            'operator_mobile' => $this->faker->phoneNumber(),
            'operator_no_acfts' => $this->faker->numberBetween(1, 100), // Example range for number of aircraft
            'operator_location' => $this->faker->city(),
            'operator_email' => $this->faker->unique()->safeEmail(),
            'operator_website' => $this->faker->url(),
            'ops_contact_person' => $this->faker->name(),
            'ops_alternate_contact' => $this->faker->name(),
            'created_by' => \App\Models\User::factory(), // Assuming you have a User model factory
            'updated_by' => \App\Models\User::factory(), // Assuming you have a User model factory
            'active' => $this->faker->boolean(), // Randomly true or false
        ];
    }
}
