@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.centerServicesPackage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.center-services-packages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="required" for="name">{{ trans('cruds.centerServicesPackage.fields.name') }}</label>
                    <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                    @if($errors->has('name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.name_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="package_value">{{ trans('cruds.centerServicesPackage.fields.package_value') }}</label>
                    <input class="form-control {{ $errors->has('package_value') ? 'is-invalid' : '' }}" type="number" name="package_value" id="package_value" value="{{ old('package_value', '') }}" step="1" required>
                    @if($errors->has('package_value'))
                        <div class="invalid-feedback">
                            {{ $errors->first('package_value') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.package_value_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="sessions">{{ trans('cruds.centerServicesPackage.fields.sessions') }}</label>
                    <input class="form-control {{ $errors->has('sessions') ? 'is-invalid' : '' }}" type="number" name="sessions" id="sessions" value="{{ old('sessions', '') }}" step="1" required>
                    @if($errors->has('sessions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sessions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.sessions_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required" for="free_sessions">{{ trans('cruds.centerServicesPackage.fields.free_sessions') }}</label>
                    <input class="form-control {{ $errors->has('free_sessions') ? 'is-invalid' : '' }}" type="number" name="free_sessions" id="free_sessions" value="{{ old('free_sessions', '') }}" step="1" required>
                    @if($errors->has('free_sessions'))
                        <div class="invalid-feedback">
                            {{ $errors->first('free_sessions') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.free_sessions_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required">{{ trans('cruds.centerServicesPackage.fields.attend_type') }}</label>
                    @foreach(App\Models\CenterServicesPackage::ATTEND_TYPE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('attend_type') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="attend_type_{{ $key }}" name="attend_type" value="{{ $key }}" {{ old('attend_type', 'offline') === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label" for="attend_type_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('attend_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('attend_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.attend_type_helper') }}</span>
                </div>
                <div class="form-group col-md-3">
                    <label class="required">{{ trans('cruds.centerServicesPackage.fields.doctor_type') }}</label>
                    @foreach(App\Models\CenterServicesPackage::DOCTOR_TYPE_RADIO as $key => $label)
                        <div class="form-check {{ $errors->has('doctor_type') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="doctor_type_{{ $key }}" name="doctor_type" value="{{ $key }}" {{ old('doctor_type', 'specialist') === (string) $key ? 'checked' : '' }} required>
                            <label class="form-check-label" for="doctor_type_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('doctor_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('doctor_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.doctor_type_helper') }}</span>
                </div>
                <div class="form-group col-md-12">
                    <label for="package_content">{{ trans('cruds.centerServicesPackage.fields.package_content') }}</label>
                    <textarea class="form-control {{ $errors->has('package_content') ? 'is-invalid' : '' }}" name="package_content" id="package_content">{{ old('package_content') }}</textarea>
                    @if($errors->has('package_content'))
                        <div class="invalid-feedback">
                            {{ $errors->first('package_content') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.package_content_helper') }}</span>
                </div>
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
