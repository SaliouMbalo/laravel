<?php

namespace App\Http\Requests;

use App\Affectation;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAffectationRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('affectation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'users.*'          => [
                'integer',
            ],
            'users'            => [
                'required',
                'array',
            ],
            'agences.*'        => [
                'integer',
            ],
            'agences'          => [
                'required',
                'array',
            ],
            'date_affectation' => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
            'date_depart'      => [
                'required',
                'date_format:' . config('panel.date_format'),
            ],
        ];
    }
}
