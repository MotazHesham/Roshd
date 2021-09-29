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
            <div class="form-group">
                <label class="required" for="reservation_date">{{ trans('cruds.reservation.fields.reservation_date') }}</label>
                <input class="form-control date {{ $errors->has('reservation_date') ? 'is-invalid' : '' }}" type="text" name="reservation_date" id="reservation_date" value="{{ old('reservation_date', $reservation->reservation_date) }}" required>
                @if($errors->has('reservation_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('reservation_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.reservation_date_helper') }}</span>
            </div>
            <div class="form-group">
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
            <div class="form-group">
                <label for="delay_date">{{ trans('cruds.reservation.fields.delay_date') }}</label>
                <input class="form-control date {{ $errors->has('delay_date') ? 'is-invalid' : '' }}" type="text" name="delay_date" id="delay_date" value="{{ old('delay_date', $reservation->delay_date) }}">
                @if($errors->has('delay_date'))
                    <div class="invalid-feedback">
                        {{ $errors->first('delay_date') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.delay_date_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="cancel_reason">{{ trans('cruds.reservation.fields.cancel_reason') }}</label>
                <textarea class="form-control {{ $errors->has('cancel_reason') ? 'is-invalid' : '' }}" name="cancel_reason" id="cancel_reason">{{ old('cancel_reason', $reservation->cancel_reason) }}</textarea>
                @if($errors->has('cancel_reason'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cancel_reason') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.cancel_reason_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="cost">{{ trans('cruds.reservation.fields.cost') }}</label>
                <input class="form-control {{ $errors->has('cost') ? 'is-invalid' : '' }}" type="number" name="cost" id="cost" value="{{ old('cost', $reservation->cost) }}" step="0.01" required>
                @if($errors->has('cost'))
                    <div class="invalid-feedback">
                        {{ $errors->first('cost') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.cost_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="condation">{{ trans('cruds.reservation.fields.condation') }}</label>
                <textarea class="form-control {{ $errors->has('condation') ? 'is-invalid' : '' }}" name="condation" id="condation">{{ old('condation', $reservation->condation) }}</textarea>
                @if($errors->has('condation'))
                    <div class="invalid-feedback">
                        {{ $errors->first('condation') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.condation_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="user_id">{{ trans('cruds.reservation.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id" required>
                    @foreach($users as $id => $entry)
                        <option value="{{ $id }}" {{ (old('user_id') ? old('user_id') : $reservation->user->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('user'))
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.user_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="doctor_id">{{ trans('cruds.reservation.fields.doctor') }}</label>
                <select class="form-control select2 {{ $errors->has('doctor') ? 'is-invalid' : '' }}" name="doctor_id" id="doctor_id" required>
                    @foreach($doctors as $id => $entry)
                        <option value="{{ $id }}" {{ (old('doctor_id') ? old('doctor_id') : $reservation->doctor->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('doctor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('doctor') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.doctor_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="clinic_id">{{ trans('cruds.reservation.fields.clinic') }}</label>
                <select class="form-control select2 {{ $errors->has('clinic') ? 'is-invalid' : '' }}" name="clinic_id" id="clinic_id" required>
                    @foreach($clinics as $id => $entry)
                        <option value="{{ $id }}" {{ (old('clinic_id') ? old('clinic_id') : $reservation->clinic->id ?? '') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                    @endforeach
                </select>
                @if($errors->has('clinic'))
                    <div class="invalid-feedback">
                        {{ $errors->first('clinic') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.clinic_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="notes">{{ trans('cruds.reservation.fields.notes') }}</label>
                <textarea class="form-control {{ $errors->has('notes') ? 'is-invalid' : '' }}" name="notes" id="notes">{{ old('notes', $reservation->notes) }}</textarea>
                @if($errors->has('notes'))
                    <div class="invalid-feedback">
                        {{ $errors->first('notes') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.notes_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="transfer_name">{{ trans('cruds.reservation.fields.transfer_name') }}</label>
                <input class="form-control {{ $errors->has('transfer_name') ? 'is-invalid' : '' }}" type="text" name="transfer_name" id="transfer_name" value="{{ old('transfer_name', $reservation->transfer_name) }}">
                @if($errors->has('transfer_name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('transfer_name') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.reservation.fields.transfer_name_helper') }}</span>
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