<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\AircraftType;
use App\Models\Operator; 

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Aircraft>
 */
class AircraftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'elt_registration_id' => $this->faker->unique()->word,
            'aircraft_registration' => $this->faker->unique()->word,
            'aircraft_type_id' => AircraftType::factory(), // Use factory for AircraftType
            'operator_id' => Operator::factory(), // Use factory for Operator
            'hex_id' => $this->faker->unique()->hexColor,
            'contact_person' => $this->faker->name,
            'first_telephone_number' => $this->faker->phoneNumber,
            'second_telephone_number' => $this->faker->phoneNumber,
            'third_telephone_number' => $this->faker->phoneNumber,
            'email' => $this->faker->unique()->safeEmail,
            'protocol_type' => $this->faker->word,
            'elt_code' => $this->faker->word,
            'mode_s_address' => $this->faker->word,
            'navigation_source' => $this->faker->word,
            'website' => $this->faker->url,
            'date_entered' => $this->faker->date(),
            'beacon' => $this->faker->word,
            'beacon_model' => $this->faker->word,
            'homing_121_5' => $this->faker->boolean,
            'mhz_406' => $this->faker->boolean,
            'notes' => $this->faker->paragraph,
        ];
    }
}
