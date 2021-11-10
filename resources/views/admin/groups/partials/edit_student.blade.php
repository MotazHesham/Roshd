
<form method="POST" action="{{ route("admin.groups.update_student") }}" enctype="multipart/form-data">
    @method('PUT')
    @csrf
    <input type="hidden" name="group_id" value="{{ $group->id }}"> 
    <input type="hidden" name="student_id" value="{{ $student->id }}">
    <div class="row"> 
        <div class="form-group col-md-6">
            <label class="" for="transfer_name">{{ trans('cruds.group.fields.transfer_name') }}</label>
            <input class="form-control {{ $errors->has('transfer_name') ? 'is-invalid' : '' }}" type="text" name="transfer_name" id="transfer_name" value="{{ old('transfer_name', $student->pivot->transfer_name) }}" >
            @if($errors->has('transfer_name'))
                <div class="invalid-feedback">
                    {{ $errors->first('transfer_name') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.group.fields.transfer_name_helper') }}</span>
        </div>  
        <div class="form-group col-md-6">
            <label class="" for="reference_number">{{ trans('cruds.group.fields.reference_number') }}</label>
            <input class="form-control {{ $errors->has('reference_number') ? 'is-invalid' : '' }}" type="text" name="reference_number" id="reference_number" value="{{ old('reference_number', $student->pivot->reference_number) }}" >
            @if($errors->has('reference_number'))
                <div class="invalid-feedback">
                    {{ $errors->first('reference_number') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.group.fields.reference_number_helper') }}</span>
        </div>   
        <div class="form-group col-md-4">
            <label class="" for="payment_type">{{ trans('cruds.group.fields.payment_type') }}</label>
            @foreach(App\Models\Group::PAYMENT_TYPE_SELECT as $key => $label)
                <div class="form-check {{ $errors->has('payment_type') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="radio" id="payment_type_{{ $key }}" name="payment_type" value="{{ $key }}" {{ old('payment_type', $student->pivot->payment_type) === (string) $key ? 'checked' : '' }} >
                    <label class="form-check-label" for="payment_type_{{ $key }}">{{ $label }}</label>
                </div>
            @endforeach
            @if($errors->has('payment_type'))
                <div class="invalid-feedback">
                    {{ $errors->first('payment_type') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.group.fields.payment_type_helper') }}</span>
        </div>   
        <div class="form-group col-md-4">
            <label class="">{{ trans('cruds.group.fields.payment_status') }}</label>
            @foreach(App\Models\Group::PAYMENT_STATUS_SELECT as $key => $label)
                <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="radio" id="payment_status_{{ $key }}" name="payment_status" value="{{ $key }}" {{ old('payment_status', $student->pivot->payment_status) === (string) $key ? 'checked' : '' }} >
                    <label class="form-check-label" for="payment_status_{{ $key }}">{{ $label }}</label>
                </div>
            @endforeach
            @if($errors->has('payment_status'))
                <div class="invalid-feedback">
                    {{ $errors->first('payment_status') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.group.fields.payment_status_helper') }}</span>
        </div> 
        <div class="form-group col-md-4">
            <label class="required">{{ trans('cruds.student.fields.group_status') }}</label>
            @foreach(App\Models\Group::STATUS_SELECT as $key => $label)
                <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                    <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', $student->pivot->status) === (string) $key ? 'checked' : '' }} required>
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
    </div>
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form>