@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.salaryContract.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.salary-contracts.update", [$salaryContract->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="contract_number">{{ trans('cruds.salaryContract.fields.contract_number') }}</label>
                <input class="form-control {{ $errors->has('contract_number') ? 'is-invalid' : '' }}" type="number" name="contract_number" id="contract_number" value="{{ old('contract_number', $salaryContract->contract_number) }}" step="1" required>
                @if($errors->has('contract_number'))
                    <div class="invalid-feedback">
                        {{ $errors->first('contract_number') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.contract_number_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="date">{{ trans('cruds.salaryContract.fields.date') }}</label>
                <input class="form-control date {{ $errors->has('date') ? 'is-invalid' : '' }}" type="text" name="date" id="date" value="{{ old('date', $salaryContract->date) }}" required>
                @if($errors->has('date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.date_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="duration">{{ trans('cruds.salaryContract.fields.duration') }}</label>
                <input class="form-control {{ $errors->has('duration') ? 'is-invalid' : '' }}" type="number" name="duration" id="duration" value="{{ old('duration', $salaryContract->duration) }}" step="1" required>
                @if($errors->has('duration'))
                    <div class="invalid-feedback">
                        {{ $errors->first('duration') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.duration_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.salaryContract.fields.workday') }}</label>
                <select class="form-control {{ $errors->has('workday') ? 'is-invalid' : '' }}" name="workday" id="workday" required>
                    <option value disabled {{ old('workday', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\SalaryContract::WORKDAY_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('workday', $salaryContract->workday) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('workday'))
                    <div class="invalid-feedback">
                        {{ $errors->first('workday') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.workday_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="work_hours">{{ trans('cruds.salaryContract.fields.work_hours') }}</label>
                <input class="form-control {{ $errors->has('work_hours') ? 'is-invalid' : '' }}" type="number" name="work_hours" id="work_hours" value="{{ old('work_hours', $salaryContract->work_hours) }}" step="1" required>
                @if($errors->has('work_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('work_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.work_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required">{{ trans('cruds.salaryContract.fields.mechanism') }}</label>
                @foreach(App\Models\SalaryContract::MECHANISM_RADIO as $key => $label)
                    <div class="form-check {{ $errors->has('mechanism') ? 'is-invalid' : '' }}">
                        <input class="form-check-input" type="radio" id="mechanism_{{ $key }}" name="mechanism" value="{{ $key }}" {{ old('mechanism', $salaryContract->mechanism) === (string) $key ? 'checked' : '' }} required>
                        <label class="form-check-label" for="mechanism_{{ $key }}">{{ $label }}</label>
                    </div>
                @endforeach
                @if($errors->has('mechanism'))
                    <div class="invalid-feedback">
                        {{ $errors->first('mechanism') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.mechanism_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="salary">{{ trans('cruds.salaryContract.fields.salary') }}</label>
                <input class="form-control {{ $errors->has('salary') ? 'is-invalid' : '' }}" type="number" name="salary" id="salary" value="{{ old('salary', $salaryContract->salary) }}" step="0.01" required>
                @if($errors->has('salary'))
                    <div class="invalid-feedback">
                        {{ $errors->first('salary') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.salary_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="doctor_id">{{ trans('cruds.salaryContract.fields.doctor') }}</label>
                <select class="form-control select2 {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor_id" id="doctor_id" required>
                    @foreach($doctors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('doctor_id') ? old('doctor_id') : $salaryContract->doctor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('doctor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('doctor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.doctor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="allowances">{{ trans('cruds.salaryContract.fields.allowance') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('allowances') ? 'is-invalid' : '' }}" name="allowances[]" id="allowances" multiple required>
                    @foreach($allowances as $id => $allowance)
                        <option value="{{ $id }}" {{ (in_array($id, old('allowances', [])) || $salaryContract->allowances->contains($id)) ? 'selected' : '' }}>{{ $allowance }}</option>
                    @endforeach
                </select>
                @if($errors->has('allowances'))
                    <div class="invalid-feedback">
                        {{ $errors->first('allowances') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.salaryContract.fields.allowance_helper') }}</span>
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