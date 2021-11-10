
<form method="POST" action="{{ route("admin.patients.update_patient_package") }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
    <input type="hidden" name="row_id" value="{{ $centerServicesPackage->pivot->id }}">
    <input type="hidden" name="package_id" value="{{ $centerServicesPackage->id }}">
    <div class="row"> 
        <div class="form-group col-md-6">
            <label class="required" for="transfer_name">{{ trans('cruds.centerServicesPackage.fields.transfer_name') }}</label>
            <input class="form-control {{ $errors->has('transfer_name') ? 'is-invalid' : '' }}" type="text" name="transfer_name" id="transfer_name" value="{{ old('transfer_name', $centerServicesPackage->pivot->transfer_name) }}" required>
            @if($errors->has('transfer_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('transfer_name') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.transfer_name_helper') }}</span>
        </div>  
        <div class="form-group col-md-6">
            <label class="required" for="reference_number">{{ trans('cruds.centerServicesPackage.fields.reference_number') }}</label>
            <input class="form-control {{ $errors->has('reference_number') ? 'is-invalid' : '' }}" type="text" name="reference_number" id="reference_number" value="{{ old('reference_number', $centerServicesPackage->pivot->reference_number) }}" required>
            @if($errors->has('reference_number'))
                <div class="invalid-feedback">
                    {{ $errors->first('reference_number') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.reference_number_helper') }}</span>
        </div>   
        <div class="form-group col-md-6">
            <label class="required" for="payment_type">{{ trans('cruds.centerServicesPackage.fields.payment_type') }}</label>
            @foreach(App\Models\CenterServicesPackage::PAYMENT_TYPE_SELECT as $key => $label)
                <div class="form-check {{ $errors->has('payment_type') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="radio" id="payment_type_{{ $key }}" name="payment_type" value="{{ $key }}" {{ old('payment_type', $centerServicesPackage->pivot->payment_type) === (string) $key ? 'checked' : '' }} required>
                    <label class="form-check-label" for="payment_type_{{ $key }}">{{ $label }}</label>
                </div>
            @endforeach
            @if($errors->has('payment_type'))
                <div class="invalid-feedback">
                    {{ $errors->first('payment_type') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.payment_type_helper') }}</span>
        </div>   
        <div class="form-group col-md-6">
            <label class="required">{{ trans('cruds.centerServicesPackage.fields.payment_status') }}</label>
            @foreach(App\Models\CenterServicesPackage::PAYMENT_STATUS_SELECT as $key => $label)
                <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="radio" id="payment_status_{{ $key }}" name="payment_status" value="{{ $key }}" {{ old('payment_status', $centerServicesPackage->pivot->payment_status) === (string) $key ? 'checked' : '' }} required>
                    <label class="form-check-label" for="payment_status_{{ $key }}">{{ $label }}</label>
                </div>
            @endforeach
            @if($errors->has('payment_status'))
                <div class="invalid-feedback">
                    {{ $errors->first('payment_status') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.payment_status_helper') }}</span>
        </div> 
    </div>
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form>