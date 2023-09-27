<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LigneCommande extends Model
{
    use HasFactory;

    protected $table = 'ligne_commandes';
    protected $primaryKey = 'id';
    protected $fillable = ['numero','numpiece','designation','quantite','observation' ,'quantitePartiel' ,'quantiteLiv'];


    public function commande()
    {
        return $this->belongsTo(Commande::class,'numpiece','numpiece');
    }


    public function getQuantitePartielAttribute($value)
    {
        return $value;
    }
    public function getQuantiteLivAttribute($value)
    {
        return $value;
    }
    public function setQuantitePartielAttribute($value)
    {
        $this->attributes['quantite_partiel'] = $value;
    }
    public function setQuantiteLivAttribute($value)
    {
        $this->attributes['quantite_liv'] = $value;
    }


}
