<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctor =  Doctor::first();
        $user = User::first();
        return [
            'name' => $this->faker->name(),
            'doctor_id' => Doctor::factory(),
            'phone' => '09'.$this->faker->randomNumber(8,true),
            'user_id' => 1,
            'shift_id' => 1,
        ];
    }
}
