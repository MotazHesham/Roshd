@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.experience.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.experiences.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="job_title">{{ trans('cruds.experience.fields.job_title') }}</label>
                <input class="form-control {{ $errors->has('job_title') ? 'is-invalid' : '' }}" type="text" name="job_title" id="job_title" value="{{ old('job_title', '') }}" required>
                @if($errors->has('job_title'))
                    <div class="invalid-feedback">
                        {{ $errors->first('job_title') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.job_title_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="work_place">{{ trans('cruds.experience.fields.work_place') }}</label>
                <input class="form-control {{ $errors->has('work_place') ? 'is-invalid' : '' }}" type="text" name="work_place" id="work_place" value="{{ old('work_place', '') }}" required>
                @if($errors->has('work_place'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_place') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.work_place_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="description">{{ trans('cruds.experience.fields.description') }}</label>
                <textarea class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description" required>{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="sart_work">{{ trans('cruds.experience.fields.sart_work') }}</label>
                <input class="form-control date {{ $errors->has('sart_work') ? 'is-invalid' : '' }}" type="text" name="sart_work" id="sart_work" value="{{ old('sart_work') }}" required>
                @if($errors->has('sart_work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('sart_work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.sart_work_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_work">{{ trans('cruds.experience.fields.end_work') }}</label>
                <input class="form-control date {{ $errors->has('end_work') ? 'is-invalid' : '' }}" type="text" name="end_work" id="end_work" value="{{ old('end_work') }}" required>
                @if($errors->has('end_work'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_work') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.end_work_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="doctor_id">{{ trans('cruds.experience.fields.doctor') }}</label>
                <select class="form-control select2 {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor_id" id="doctor_id" required>
                    @foreach($doctors as $id => $entry)
                        <option value="{{ $id }}" {{ old('doctor_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('doctor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('doctor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.experience.fields.doctor_helper') }}</span>
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