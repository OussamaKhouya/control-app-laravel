<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;

    protected $primaryKey = 'numpiece';
    protected $keyType = 'string';

    protected $fillable = ['numpiece','date','client','etat', 'saisie','commercial','control1','control2'];

    protected $dates = ['date'];

    public function ligneCommandes()
    {
        return $this->hasMany(LigneCommande::class,'numpiece','numpiece');
    }
    // comment setDateAttribue if you want to use faker
//    public function setDateAttribute($value){
//        $this->attributes['date'] = Carbon::createFromFormat('d-m-Y H:i:s', $value)
//            ->format('Y-m-d H:i:s');
//    }
}
