<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\LigneCommande;
use Illuminate\Database\Eloquent\Factories\Factory;

class LigneCommandeFactory extends Factory
{

    protected $model = LigneCommande::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'numpiece' => substr($this->faker->uuid(),0,10),
            'designation' => $this->faker->name(),
            'quantite' => $this->faker->randomFloat(2,1000,9999999),
            'created_at' => now()
        ];
    }
}
