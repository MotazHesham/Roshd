@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.doctor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.doctors.store") }}" enctype="multipart/form-data">
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
                <label class="required" for="years_experience">{{ trans('cruds.doctor.fields.years_experience') }}</label>
                <input class="form-control {{ $errors->has('years_experience') ? 'is-invalid' : '' }}" type="number" name="years_experience" id="years_experience" value="{{ old('years_experience', '') }}" step="1" required>
                @if($errors->has('years_experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('years_experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.years_experience_helper') }}</span>
            </div>
     
            <div class="form-group col-md-6">
                <label class="required" for="specialization_id">{{ trans('cruds.doctor.fields.specialization') }}</label>
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
                <span class="help-block">{{ trans('cruds.doctor.fields.specialization_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="clinic_id">{{ trans('cruds.doctor.fields.clinic') }}</label>
                <select class="form-control select2 {{ $errors->has('clinic') ? 'is-invalid' : '' }}" name="clinic_id" id="clinic_id" required>
                    @foreach($clinics as $id => $entry)
                        <option value="{{ $id }}" {{ old('clinic_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('clinic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clinic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.clinic_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required">{{ trans('cruds.doctor.fields.work_days') }}</label>
                <select class="form-control {{ $errors->has('work_days') ? 'is-invalid' : '' }}" name="work_days" id="work_days" required  multiple="multiple" >
                    <option value disabled {{ old('work_days', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Doctor::WORK_DAYS_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('work_days', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('work_days'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_days') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.work_days_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="start_time">{{ trans('cruds.doctor.fields.start_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <label class="required" for="end_time">{{ trans('cruds.doctor.fields.end_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                @if($errors->has('end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.end_time_helper') }}</span>
            </div>
            <div class="form-group col-md-6">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
            </div>
        </form>
    </div>
</div>



@endsection