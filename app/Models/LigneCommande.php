<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;
    public $nbrPhoto = 0;

    protected $table = 'm_a_bcc';
    protected $primaryKey = 'a_bcc_num';
    protected $fillable = ['a_bcc_num','a_bcc_nupi','a_bcc_lib','a_bcc_dep','a_bcc_qua','a_bcc_coe','a_bcc_boi','a_bcc_quch1','a_bcc_boch1','a_bcc_obs1','a_bcc_quch2','a_bcc_boch2','a_bcc_obs2'];

    public function commande()
    {
        return $this->belongsTo(Commande::class,'a_bcc_nupi','bcc_nupi');
    }

}
