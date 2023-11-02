<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;


    protected $table = 'm_bcc';
    protected $primaryKey = 'bcc_nupi';
    protected $keyType = 'string';

    protected $fillable = ['bcc_nupi', 'bcc_dat', 'bcc_dach1', 'bcc_dach2', 'bcc_lcli', 'bcc_lrep', 'bcc_lexp', 'bcc_veh', 'bcc_eta', 'bcc_val', 'bcc_usr_sai', 'bcc_usr_com', 'bcc_usr_con1', 'bcc_usr_con2', 'bcc_usr_sup'];
    protected $dates = ['bcc_dat', 'bcc_dach1', 'bcc_dach2'];
    protected $dateFormat = 'Y-m-d H:i:s';


    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class,'bcc_nupi','a_bcc_nupi');
    }
     // comment these 3 functions if you want to use faker

    public function setBccDatAttribute($value){
        $this->attributes['bcc_dat'] = Carbon::createFromFormat('d-m-Y H:i:s', $value)
            ->format('Y-m-d H:i:s');
    }
    public function setBccDach1Attribute($value){
        $this->attributes['bcc_dach1'] = Carbon::createFromFormat('d-m-Y H:i:s', $value)
            ->format('Y-m-d H:i:s');
    }
    public function setBccDach2Attribute($value){
        $this->attributes['bcc_dach2'] = Carbon::createFromFormat('d-m-Y H:i:s', $value)
            ->format('Y-m-d H:i:s');
    }




}
