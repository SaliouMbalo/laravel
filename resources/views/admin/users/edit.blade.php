@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.user.title_singular') }}
                </div>
                <div class="panel-body">

                    <form action="{{ route("admin.users.update", [$user->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group {{ $errors->has('prenoms') ? 'has-error' : '' }}">
                            <label for="prenoms">{{ trans('cruds.user.fields.prenoms') }}*</label>
                            <input type="text" id="prenoms" name="prenoms" class="form-control" value="{{ old('prenoms', isset($user) ? $user->prenoms : '') }}" required>
                            @if($errors->has('prenoms'))
                                <p class="help-block">
                                    {{ $errors->first('prenoms') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.prenoms_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.user.fields.name') }}*</label>
                            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', isset($user) ? $user->name : '') }}" required>
                            @if($errors->has('name'))
                                <p class="help-block">
                                    {{ $errors->first('name') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.name_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">{{ trans('cruds.user.fields.email') }}*</label>
                            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', isset($user) ? $user->email : '') }}" required>
                            @if($errors->has('email'))
                                <p class="help-block">
                                    {{ $errors->first('email') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.email_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                            <label for="telephone">{{ trans('cruds.user.fields.telephone') }}*</label>
                            <input type="text" id="telephone" name="telephone" class="form-control" value="{{ old('telephone', isset($user) ? $user->telephone : '') }}" required>
                            @if($errors->has('telephone'))
                                <p class="help-block">
                                    {{ $errors->first('telephone') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.telephone_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('code_id') ? 'has-error' : '' }}">
                            <label for="code">{{ trans('cruds.user.fields.code') }}*</label>
                            <select name="code_id" id="code" class="form-control select2" required>
                                @foreach($codes as $id => $code)
                                    <option value="{{ $id }}" {{ (isset($user) && $user->code ? $user->code->id : old('code_id')) == $id ? 'selected' : '' }}>{{ $code }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('code_id'))
                                <p class="help-block">
                                    {{ $errors->first('code_id') }}
                                </p>
                            @endif
                        </div>
                        <div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
                            <label for="roles">{{ trans('cruds.user.fields.roles') }}*
                                <span class="btn btn-info btn-xs select-all">{{ trans('global.select_all') }}</span>
                                <span class="btn btn-info btn-xs deselect-all">{{ trans('global.deselect_all') }}</span></label>
                            <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
                                @foreach($roles as $id => $roles)
                                    <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('roles'))
                                <p class="help-block">
                                    {{ $errors->first('roles') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.roles_helper') }}
                            </p>
                        </div>
                        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                            <label for="password">{{ trans('cruds.user.fields.password') }}</label>
                            <input type="password" id="password" name="password" class="form-control">
                            @if($errors->has('password'))
                                <p class="help-block">
                                    {{ $errors->first('password') }}
                                </p>
                            @endif
                            <p class="helper-block">
                                {{ trans('cruds.user.fields.password_helper') }}
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