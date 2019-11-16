<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agence extends Model
{
    use SoftDeletes;

    public $table = 'agences';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'nom',
        'code',
        'region',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    const REGION_SELECT = [
        'Dakar'       => 'Dakar',
        'Diourbel'    => 'Diourbel',
        'Fatick'      => 'Fatick',
        'Kaffrine'    => 'Kaffrine',
        'Kaolack'     => 'Kaolack',
        'Kedougou'    => 'Kédougou',
        'Kolda'       => 'Kolda',
        'Louga'       => 'Louga',
        'Matam'       => 'Matam',
        'Saint-Louis' => 'Saint-Louis',
        'Sedhiou'     => 'Sédhiou',
        'Tambacounda' => 'Tambacounda',
        'Thies'       => 'Thiès',
        'Ziguinchor'  => 'Ziguinchor',
    ];

    public function users()
    {
        return $this->hasMany(User::class, 'code_id', 'id');
    }

    public function comptes()
    {
        return $this->hasMany(Compte::class, 'code_id', 'id');
    }

    public function affectations()
    {
        return $this->belongsToMany(Affectation::class);
    }
}
