@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.centerServicesPackage.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.center-services-packages.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.centerServicesPackage.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="package_content">{{ trans('cruds.centerServicesPackage.fields.package_content') }}</label>
                <textarea class="form-control {{ $errors->has('package_content') ? 'is-invalid' : '' }}" name="package_content" id="package_content" required>{{ old('package_content') }}</textarea>
                @if($errors->has('package_content'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package_content') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.package_content_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.centerServicesPackage.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date') }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.centerServicesPackage.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date') }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="package_value">{{ trans('cruds.centerServicesPackage.fields.package_value') }}</label>
                <input class="form-control {{ $errors->has('package_value') ? 'is-invalid' : '' }}" type="number" name="package_value" id="package_value" value="{{ old('package_value', '') }}" step="0.01" required>
                @if($errors->has('package_value'))
                    <div class="invalid-feedback">
                        {{ $errors->first('package_value') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.package_value_helper') }}</span>
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