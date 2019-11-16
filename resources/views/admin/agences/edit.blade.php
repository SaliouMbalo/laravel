@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.agence.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.agences.update", [$agence->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('nom') ? 'has-error' : '' }}">
                            <label for="nom">{{ trans('cruds.agence.fields.nom') }}*</label>
                            <input type="text" id="nom" name="nom" class="form-control" value="{{ old('nom', isset($agence) ? $agence->nom : '') }}" required>
                            @if($errors->has('nom'))
                                <p class="help-block">
                                    {{ $errors->first('nom') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.agence.fields.nom_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
                            <label for="code">{{ trans('cruds.agence.fields.code') }}*</label>
                            <input type="text" id="code" name="code" class="form-control" value="{{ old('code', isset($agence) ? $agence->code : '') }}" required>
                            @if($errors->has('code'))
                                <p class="help-block">
                                    {{ $errors->first('code') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.agence.fields.code_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('region') ? 'has-error' : '' }}">
                            <label for="region">{{ trans('cruds.agence.fields.region') }}*</label>
                            <select id="region" name="region" class="form-control" required>
                                <option value="" disabled {{ old('region', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Agence::REGION_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('region', $agence->region) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('region'))
                                <p class="help-block">
                                    {{ $errors->first('region') }}
                                </p>
                            @endif
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