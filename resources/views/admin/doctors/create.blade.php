@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.doctor.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.doctors.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="years_experience">{{ trans('cruds.doctor.fields.years_experience') }}</label>
                <input class="form-control {{ $errors->has('years_experience') ? 'is-invalid' : '' }}" type="number" name="years_experience" id="years_experience" value="{{ old('years_experience', '') }}" step="1" required>
                @if($errors->has('years_experience'))
                    <div class="invalid-feedback">
                        {{ $errors->first('years_experience') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.years_experience_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.doctor.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
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
            <div class="form-group">
                <label class="required">{{ trans('cruds.doctor.fields.work_days') }}</label>
                <select class="form-control {{ $errors->has('work_days') ? 'is-invalid' : '' }}" name="work_days[]" id="work_days" required  multiple="multiple" >
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
            <div class="form-group">
                <label class="required" for="start_time">{{ trans('cruds.doctor.fields.start_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('start_time') ? 'is-invalid' : '' }}" type="text" name="start_time" id="start_time" value="{{ old('start_time') }}" required>
                @if($errors->has('start_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.start_time_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_time">{{ trans('cruds.doctor.fields.end_time') }}</label>
                <input class="form-control timepicker {{ $errors->has('end_time') ? 'is-invalid' : '' }}" type="text" name="end_time" id="end_time" value="{{ old('end_time') }}" required>
                @if($errors->has('end_time'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_time') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.doctor.fields.end_time_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection