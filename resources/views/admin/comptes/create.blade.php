@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.compte.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.comptes.store") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('numero') ? 'has-error' : '' }}">
                            <label for="numero">{{ trans('cruds.compte.fields.numero') }}*</label>
                            <input type="text" id="numero" name="numero" class="form-control" value="{{ old('numero', isset($compte) ? $compte->numero : '') }}" required>
                            @if($errors->has('numero'))
                                <p class="help-block">
                                    {{ $errors->first('numero') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.compte.fields.numero_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('cle_rib') ? 'has-error' : '' }}">
                            <label for="cle_rib">{{ trans('cruds.compte.fields.cle_rib') }}*</label>
                            <input type="text" id="cle_rib" name="cle_rib" class="form-control" value="{{ old('cle_rib', isset($compte) ? $compte->cle_rib : '') }}" required>
                            @if($errors->has('cle_rib'))
                                <p class="help-block">
                                    {{ $errors->first('cle_rib') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.compte.fields.cle_rib_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('code_id') ? 'has-error' : '' }}">
                            <label for="code">{{ trans('cruds.compte.fields.code') }}*</label>
                            <select name="code_id" id="code" class="form-control select2" required>
                                @foreach($codes as $id => $code)
                                    <option value="{{ $id }}" {{ (isset($compte) && $compte->code ? $compte->code->id : old('code_id')) == $id ? 'selected' : '' }}>{{ $code }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('code_id'))
                                <p class="help-block">
                                    {{ $errors->first('code_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('telephones') ? 'has-error' : '' }}">
                            <label for="telephone">{{ trans('cruds.compte.fields.telephone') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="telephones[]" id="telephones" class="form-control select2" multiple="multiple" required>
                                @foreach($telephones as $id => $telephone)
                                    <option value="{{ $id }}" {{ (in_array($id, old('telephones', [])) || isset($compte) && $compte->telephones->contains($id)) ? 'selected' : '' }}>{{ $telephone }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('telephones'))
                                <p class="help-block">
                                    {{ $errors->first('telephones') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.compte.fields.telephone_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('type_compte') ? 'has-error' : '' }}">
                            <label for="type_compte">{{ trans('cruds.compte.fields.type_compte') }}*</label>
                            <select id="type_compte" name="type_compte" class="form-control" required>
                                <option value="" disabled>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Compte::TYPE_COMPTE_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('type_compte', 0) === (string)$key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('type_compte'))
                                <p class="help-block">
                                    {{ $errors->first('type_compte') }}
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