<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Employee;

class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $gender = $this->faker->randomElement(['P', 'W']);
        $hoby = $this->faker->randomElement(['sepak bola', 'voli', 'tenis meja']);
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->email,
            'gender' => $gender,
            'nip'    => rand(0,10000000),
            'hoby' => $hoby,
            'photo'     => null
        ];
    }
}
