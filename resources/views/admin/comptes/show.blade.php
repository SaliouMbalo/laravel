@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.show') }} {{ trans('cruds.compte.title') }}
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.compte.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $compte->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.compte.fields.numero') }}
                                    </th>
                                    <td>
                                        {{ $compte->numero }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.compte.fields.cle_rib') }}
                                    </th>
                                    <td>
                                        {{ $compte->cle_rib }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.compte.fields.code') }}
                                    </th>
                                    <td>
                                        {{ $compte->code->code ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        Téléphone
                                    </th>
                                    <td>
                                        @foreach($compte->telephones as $id => $telephone)
                                            <span class="label label-info label-many">{{ $telephone->telephone }}</span>
                                        @endforeach
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.compte.fields.type_compte') }}
                                    </th>
                                    <td>
                                        {{ App\Compte::TYPE_COMPTE_SELECT[$compte->type_compte] ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>

                    <ul class="nav nav-tabs">

                    </ul>
                    <div class="tab-content">

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection