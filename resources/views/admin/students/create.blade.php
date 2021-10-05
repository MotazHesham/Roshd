@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.student.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.students.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="required" for="name">{{ trans('cruds.user.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="email">{{ trans('cruds.user.fields.email') }}</label>
                    <input class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" id="email" value="{{ old('email') }}" required>
                    @if($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.email_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="password">{{ trans('cruds.user.fields.password') }}</label>
                    <input class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" id="password" required>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.password_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class="required" for="phone">{{ trans('cruds.user.fields.phone') }}</label>
                    <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', '') }}" required>
                    @if($errors->has('phone'))
                        <div class="invalid-feedback">
                            {{ $errors->first('phone') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.user.fields.phone_helper') }}</span>
                </div>
            <div class="form-group col-md-6">
                <label class="required" for="hours">{{ trans('cruds.student.fields.hours') }}</label>
                <input class="form-control {{ $errors->has('hours') ? 'is-invalid' : '' }}" type="number" name="hours" id="hours" value="{{ old('hours', '') }}" step="1" required>
                @if($errors->has('hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.hours_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="specialization_id">{{ trans('cruds.student.fields.specialization') }}</label>
                <select class="form-control select2 {{ $errors->has('specialization') ? 'is-invalid' : '' }}" name="specialization_id" id="specialization_id" required>
                    @foreach($specializations as $id => $entry)
                        <option value="{{ $id }}" {{ old('specialization_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('specialization'))
                    <div class="invalid-feedback">
                        {{ $errors->first('specialization') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.student.fields.specialization_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            </div>
        </form>
    </div>
</div>



@endsection