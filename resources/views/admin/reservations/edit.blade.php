@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.payment.new_payment') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('admin.reservations.update', [$reservation->id]) }}" enctype="multipart/form-data" id="edit_reservation_form">
                    @method('PUT')
                    @csrf
                        @include('partials.payments.create',['cost' => $reservation->cost, 'package' => true,'form_name' => '#edit_reservation_form','patientPackages' => $patientPackages])
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ trans('cruds.payment.title_singular') }}
            </div>

            <div class="card-body">
                @include('partials.payments.index',['payments' => $reservation->payments,'required_amount' => $reservation->cost])
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.reservation.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.reservations.update_status", [$reservation->id]) }}" enctype="multipart/form-data">
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
