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
        $commandes = Commande::pluck('bcc_nupi')->toArray();
        $quantite = $this->faker->randomFloat(2,10,9999);
        $coeff = $this->faker->randomFloat(2,2,20);
        return [
            'a_bcc_num' => $this->faker->numberBetween(10,9999),
            'a_bcc_nupi' => $this->faker->randomElement($commandes),
            'a_bcc_lib' => $this->faker->text(15),
            'a_bcc_dep' => $this->faker->city(),
            'a_bcc_qua' => $quantite,
            'a_bcc_coe' => $coeff,
            'a_bcc_boi' => $quantite/$coeff,
            'a_bcc_quch1' => $quantite,
            'a_bcc_boch1' => $quantite/$coeff,
            'a_bcc_obs1' => $this->faker->text(30),
            'a_bcc_quch2' => $quantite,
            'a_bcc_boch2' => $quantite/$coeff,
            'a_bcc_obs2' => $this->faker->text(30),

            'created_at' => now()
        ];
    }
}
