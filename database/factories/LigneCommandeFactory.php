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
        $commandes = Commande::pluck('numpiece')->toArray();
        $quantite = $this->faker->randomFloat(2,1000,9999999);
        return [
            'numero' => $this->faker->numberBetween(1000,9999),
            'numpiece' => $this->faker->randomElement($commandes),
            'designation' => $this->faker->text(15),
            'observation' => $this->faker->text(30),
            'quantite' => $quantite,
            'quantite_partiel' => $this->faker->randomFloat(2,0,$quantite),
            'quantite_liv' => $this->faker->randomFloat(2,1000,9999999),
            'created_at' => now()
        ];
    }
}
