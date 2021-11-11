@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reservation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reservations.update", [$reservation->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="row">
                <div class="form-group col-md-4">
                    <label class="required">{{ trans('cruds.reservation.fields.statuse') }}</label>
                    <select class="form-control {{ $errors->has('statuse') ? 'is-invalid' : '' }}" name="statuse" id="statuse" required>
                        <option value disabled {{ old('statuse', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                        @foreach(App\Models\Reservation::STATUSE_SELECT as $key => $label)
                            <option value="{{ $key }}" {{ old('statuse', $reservation->statuse) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                        @endforeach
                    </select>
                    @if($errors->has('statuse'))
                        <div class="invalid-feedback">
                            {{ $errors->first('statuse') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservation.fields.statuse_helper') }}</span>
                </div> 
                <div class="form-group col-md-4">
                    <label for="transfer_name">{{ trans('cruds.reservation.fields.transfer_name') }}</label>
                    <input class="form-control {{ $errors->has('transfer_name') ? 'is-invalid' : '' }}" type="text" name="transfer_name" id="transfer_name" value="{{ old('transfer_name', $reservation->transfer_name) }}">
                    @if($errors->has('transfer_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('transfer_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservation.fields.transfer_name_helper') }}</span>
                </div> 
                <div class="form-group col-md-4">
                    <label class="" for="reference_number">{{ trans('cruds.group.fields.reference_number') }}</label>
                    <input class="form-control {{ $errors->has('reference_number') ? 'is-invalid' : '' }}" type="text" name="reference_number" id="reference_number" value="{{ old('reference_number', '') }}" >
                    @if($errors->has('reference_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('reference_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservation.fields.reference_number_helper') }}</span>
                </div>   
                <div class="form-group col-md-3">
                    <label class="" for="payment_type">{{ trans('cruds.reservation.fields.payment_type') }}</label>
                    @foreach(App\Models\Reservation::PAYMENT_TYPE_SELECT as $key => $label)
                        <div class="form-check {{ $errors->has('payment_type') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="payment_type_{{ $key }}" name="payment_type" value="{{ $key }}" {{ old('payment_type', '') === (string) $key ? 'checked' : '' }} >
                            <label class="form-check-label" for="payment_type_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('payment_type'))
                        <div class="invalid-feedback">
                            {{ $errors->first('payment_type') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservation.fields.payment_type_helper') }}</span>
                </div>   
                <div class="form-group col-md-3">
                    <label class="">{{ trans('cruds.reservation.fields.payment_status') }}</label>
                    @foreach(App\Models\Reservation::PAYMENT_STATUS_SELECT as $key => $label)
                        <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="payment_status_{{ $key }}" name="payment_status" value="{{ $key }}" {{ old('payment_status', '') === (string) $key ? 'checked' : '' }} >
                            <label class="form-check-label" for="payment_status_{{ $key }}">{{ $label }}</label>
                        </div>
                    @endforeach
                    @if($errors->has('payment_status'))
                        <div class="invalid-feedback">
                            {{ $errors->first('payment_status') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.reservation.fields.payment_status_helper') }}</span>
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