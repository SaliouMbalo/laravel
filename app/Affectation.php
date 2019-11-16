<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Affectation extends Model
{
    use SoftDeletes;

    public $table = 'affectations';

    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date_depart',
        'date_affectation',
    ];

    protected $fillable = [
        'created_at',
        'updated_at',
        'deleted_at',
        'date_depart',
        'date_affectation',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function agences()
    {
        return $this->belongsToMany(Agence::class);
    }

    public function getDateAffectationAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateAffectationAttribute($value)
    {
        $this->attributes['date_affectation'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }

    public function getDateDepartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format(config('panel.date_format')) : null;
    }

    public function setDateDepartAttribute($value)
    {
        $this->attributes['date_depart'] = $value ? Carbon::createFromFormat(config('panel.date_format'), $value)->format('Y-m-d') : null;
    }
}
