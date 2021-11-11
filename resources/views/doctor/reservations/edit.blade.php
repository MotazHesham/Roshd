@extends('layouts.doctor')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reservation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("doctor.reservations.update", [$reservation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row"> 
                <div class="form-group col-md-4">
                    <label for="condation">{{ trans('cruds.reservation.fields.condation') }}</label>
                    <textarea class="form-control {{ $errors->has('condation') ? 'is-invalid' : '' }}" name="condation" id="condation">{{ old('condation', $reservation->condation) }}</textarea>
                    @if($errors->has('condation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('condation') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservation.fields.condation_helper') }}</span>
                </div>  
                <div class="form-group col-md-4">
                    <label for="notes">{{ trans('cruds.reservation.fields.notes') }}</label>
                    <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $reservation->notes) }}</textarea>
                    @if($errors->has('notes'))
                        <div class="invalid-feedback">
                            {{ $errors->first('notes') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservation.fields.notes_helper') }}</span>
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