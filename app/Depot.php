<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Depot extends Model
{
    use SoftDeletes;

    public $table = 'depots';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'montant',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function telephones()
    {
        return $this->belongsToMany(Client::class);
    }

    public function numero_comptes()
    {
        return $this->belongsToMany(Compte::class);
    }
}
