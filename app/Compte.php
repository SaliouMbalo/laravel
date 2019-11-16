<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compte extends Model
{
    use SoftDeletes;

    public $table = 'comptes';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const TYPE_COMPTE_SELECT = [
        'epargne' => 'Épargne',
        'courant' => 'Courant',
    ];

    protected $fillable = [
        'numero',
        'cle_rib',
        'code_id',
        'created_at',
        'updated_at',
        'deleted_at',
        'type_compte',
    ];

    public function depots()
    {
        return $this->belongsToMany(Depot::class);
    }

    public function code()
    {
        return $this->belongsTo(Agence::class, 'code_id');
    }

    public function telephones()
    {
        return $this->belongsToMany(Client::class);
    }
}
