<?php

namespace App\Http\Requests;

use App\Compte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class UpdateCompteRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('compte_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'numero'       => [
                'max:10',
                'required',
                'unique:comptes,numero,' . request()->route('compte')->id,
            ],
            'cle_rib'      => [
                'required',
                'unique:comptes,cle_rib,' . request()->route('compte')->id,
            ],
            'code_id'      => [
                'required',
                'integer',
            ],
            'telephones.*' => [
                'integer',
            ],
            'telephones'   => [
                'required',
                'array',
            ],
            'type_compte'  => [
                'required',
            ],
        ];
    }
}
