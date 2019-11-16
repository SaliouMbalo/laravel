@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.client.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.clients.update", [$client->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('prenoms') ? 'has-error' : '' }}">
                            <label for="prenoms">{{ trans('cruds.client.fields.prenoms') }}*</label>
                            <input type="text" id="prenoms" name="prenoms" class="form-control" value="{{ old('prenoms', isset($client) ? $client->prenoms : '') }}" required>
                            @if($errors->has('prenoms'))
                                <p class="help-block">
                                    {{ $errors->first('prenoms') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.prenoms_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                            <label for="nom">{{ trans('cruds.client.fields.nom') }}*</label>
                            <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom', isset($client) ? $client->nom : '') }}" required>
                            @if($errors->has('nom'))
                                <p class="help-block">
                                    {{ $errors->first('nom') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.nom_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('adresse') ? 'has-error' : '' }}">
                            <label for="adresse">{{ trans('cruds.client.fields.adresse') }}*</label>
                            <input type="text" id="adresse" name="adresse" class="form-control" value="{{ old('adresse', isset($client) ? $client->adresse : '') }}" required>
                            @if($errors->has('adresse'))
                                <p class="help-block">
                                    {{ $errors->first('adresse') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.adresse_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.client.fields.email') }}</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($client) ? $client->email : '') }}">
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                            <label for="telephone">{{ trans('cruds.client.fields.telephone') }}*</label>
                            <input type="text" id="telephone" name="telephone" class="form-control" value="{{ old('telephone', isset($client) ? $client->telephone : '') }}" required>
                            @if($errors->has('telephone'))
                                <p class="help-block">
                                    {{ $errors->first('telephone') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.telephone_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('salaire_actuel') ? 'has-error' : '' }}">
                            <label for="salaire_actuel">{{ trans('cruds.client.fields.salaire_actuel') }}</label>
                            <input type="number" id="salaire_actuel" name="salaire_actuel" class="form-control" value="{{ old('salaire_actuel', isset($client) ? $client->salaire_actuel : '') }}" step="0.01">
                            @if($errors->has('salaire_actuel'))
                                <p class="help-block">
                                    {{ $errors->first('salaire_actuel') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.salaire_actuel_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('profession') ? 'has-error' : '' }}">
                            <label for="profession">{{ trans('cruds.client.fields.profession') }}</label>
                            <input type="text" id="profession" name="profession" class="form-control" value="{{ old('profession', isset($client) ? $client->profession : '') }}">
                            @if($errors->has('profession'))
                                <p class="help-block">
                                    {{ $errors->first('profession') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.profession_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('employeur') ? 'has-error' : '' }}">
                            <label for="employeur">{{ trans('cruds.client.fields.employeur') }}</label>
                            <input type="text" id="employeur" name="employeur" class="form-control" value="{{ old('employeur', isset($client) ? $client->employeur : '') }}">
                            @if($errors->has('employeur'))
                                <p class="help-block">
                                    {{ $errors->first('employeur') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.employeur_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('numero_identification') ? 'has-error' : '' }}">
                            <label for="numero_identification">{{ trans('cruds.client.fields.numero_identification') }}</label>
                            <input type="text" id="numero_identification" name="numero_identification" class="form-control" value="{{ old('numero_identification', isset($client) ? $client->numero_identification : '') }}">
                            @if($errors->has('numero_identification'))
                                <p class="help-block">
                                    {{ $errors->first('numero_identification') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.client.fields.numero_identification_helper') }}
                            </p>
                        </div>
                        <div>
                            <input class="btn btn-danger" type="submit" value="{{ trans('global.save') }}">
                        </div>
                    </form>


                </div>
            </div>

        </div>
    </div>
</div>
@endsection