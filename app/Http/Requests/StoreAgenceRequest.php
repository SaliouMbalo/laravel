<?php

namespace App\Http\Requests;

use App\Agence;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StoreAgenceRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('agence_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'nom'    => [
                'required',
            ],
            'code'   => [
                'required',
                'unique:agences',
            ],
            'region' => [
                'required',
            ],
        ];
    }
}
