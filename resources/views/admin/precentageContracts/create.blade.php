@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.precentageContract.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.precentage-contracts.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="percentage">{{ trans('cruds.precentageContract.fields.percentage') }}</label>
                <input class="form-control {{ $errors->has('percentage') ? 'is-invalid' : '' }}" type="number" name="percentage" id="percentage" value="{{ old('percentage', '') }}" step="1" required>
                @if($errors->has('percentage'))
                    <div class="invalid-feedback">
                        {{ $errors->first('percentage') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.precentageContract.fields.percentage_helper') }}</span>
            </div>
            <input type="hidden" value={{$doctor->id}} name="doctor_id">
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection