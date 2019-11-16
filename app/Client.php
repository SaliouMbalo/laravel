<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;

    public $table = 'clients';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom',
        'email',
        'prenoms',
        'adresse',
        'telephone',
        'employeur',
        'profession',
        'created_at',
        'updated_at',
        'deleted_at',
        'salaire_actuel',
        'numero_identification',
    ];

    public function comptes()
    {
        return $this->belongsToMany(Compte::class);
    }

    public function depots()
    {
        return $this->belongsToMany(Depot::class);
    }
}
