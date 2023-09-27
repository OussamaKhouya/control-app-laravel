<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Database\Eloquent\Factories\Factory;
use PhpParser\Node\Scalar\String_;

class CommandeFactory extends Factory
{

    protected $model = Commande::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        return
            [
                'numpiece' => $this->faker->regexify('[A-Z]{1,1}[0-9]{9,9}'),
                'date' => $this->faker->dateTime(),
                'client' => $this->faker->name(),
                'etat' => $this->faker->randomElement(['EN ATTENTE','FINIE','CONFIRMER','EN PREPARARTION']),
                'saisie' => $this->faker->boolean(),
                'commercial' => $this->faker->boolean(),
                'control1' => $this->faker->boolean(),
                'control2' => $this->faker->boolean(),
                'created_at' => now()
            ];
    }
}