@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.group.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.groups.update", [$group->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="start_date">{{ trans('cruds.group.fields.start_date') }}</label>
                <input class="form-control date {{ $errors->has('start_date') ? 'is-invalid' : '' }}" type="text" name="start_date" id="start_date" value="{{ old('start_date', $group->start_date) }}" required>
                @if($errors->has('start_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('start_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.start_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="end_date">{{ trans('cruds.group.fields.end_date') }}</label>
                <input class="form-control date {{ $errors->has('end_date') ? 'is-invalid' : '' }}" type="text" name="end_date" id="end_date" value="{{ old('end_date', $group->end_date) }}" required>
                @if($errors->has('end_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('end_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.end_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_hours">{{ trans('cruds.group.fields.course_hours') }}</label>
                <input class="form-control {{ $errors->has('course_hours') ? 'is-invalid' : '' }}" type="number" name="course_hours" id="course_hours" value="{{ old('course_hours', $group->course_hours) }}" step="1" required>
                @if($errors->has('course_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.course_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="course_cost">{{ trans('cruds.group.fields.course_cost') }}</label>
                <input class="form-control {{ $errors->has('course_cost') ? 'is-invalid' : '' }}" type="number" name="course_cost" id="course_cost" value="{{ old('course_cost', $group->course_cost) }}" step="1" required>
                @if($errors->has('course_cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('course_cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.course_cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.group.fields.status') }}</label>
                @foreach(App\Models\Group::STATUS_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $group->status) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('status'))
                    <div class="invalid-feedback">
                        {{ $errors->first('status') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.status_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.group.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $group->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="students">{{ trans('cruds.group.fields.students') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('students') ? 'is-invalid' : '' }}" name="students[]" id="students" multiple required>
                    @foreach($students as $id => $student)
                        <option value="{{ $id }}" {{ (in_array($id, old('students', [])) || $group->students->contains($id)) ? 'selected' : '' }}>{{ $student }}</option>
                    @endforeach
                </select>
                @if($errors->has('students'))
                    <div class="invalid-feedback">
                        {{ $errors->first('students') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.group.fields.students_helper') }}</span>
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