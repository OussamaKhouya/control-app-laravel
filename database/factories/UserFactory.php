<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $role = $this->faker->randomElement(['SAISIE', 'COMMERCIAL','CONTROL1','CONTROL2','ADMIN','USER']);
        $username = [
            'SAISIE' => 'sai',
            'COMMERCIAL' => 'com',
            'CONTROL1' => 'con1',
            'CONTROL2' => 'con2',
            'ADMIN' => 'admin',
            'USER' => 'user',
        ];
        return [
            'name' => $this->faker->name(),
            'username' => $username[$role],
            'role' => $role,
            "password"=>bcrypt("123"),
            'remember_token' => Str::random(10),
        ];
    }


}
