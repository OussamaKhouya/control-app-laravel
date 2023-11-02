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
            $date = $this->faker->dateTime();
            $date1 = $date->modify('+1 day');
            $date2 = $date->modify('+2 day');

        return
            [
                'bcc_nupi' => $this->faker->regexify('[A-Z]{1,1}[0-9]{9,9}'),
                'bcc_dat' => $date,
                'bcc_dach1' => $date1,
                'bcc_dach2' => $date2,
                'bcc_lcli' => $this->faker->name(),
                'bcc_lrep' => $this->faker->name(),
                'bcc_lexp' => $this->faker->name(),
                'bcc_veh' => $this->faker->regexify('[0-9]{9,9}'),
                'bcc_eta' => $this->faker->randomElement(['INITIAL','EN PREPARATION','TERMINE','ANNULE','LIVREE']),
                'bcc_val' => $this->faker->boolean(),
                'bcc_usr_sai' => $this->faker->userName(),
                'bcc_usr_com' => $this->faker->userName(),
                'bcc_usr_con1' => $this->faker->userName(),
                'bcc_usr_con2' => $this->faker->userName(),
                'bcc_usr_sup' => $this->faker->userName(),
                'created_at' => now()
            ];
    }
}
