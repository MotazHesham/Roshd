@if(isset($frontend))
    <form method="POST" action="{{ route('frontend.payments.update', [$payment->id]) }}" enctype="multipart/form-data" id="edit_payment_form">
@else
    <form method="POST" action="{{ route('admin.payments.update', [$payment->id]) }}" enctype="multipart/form-data" id="edit_payment_form">
@endif
    @method('PUT')
    @csrf
    <div class="row text-center mb-4">

        @if(!isset($frontend))
            <div class="col-md-6">
                <i class="fa fa-money payment_type_cash_icon"  style="font-size: 35px;@if($payment->payment_type == 'cash') color:violet @endif"
                    onclick="change_payment_type('#edit_payment_form','cash')"></i>
                <br>
                <div class="form-check ">
                    <input class="form-check-input payment_type_cash" type="radio" id="payment_type_cash" name="payment_type" value="cash"
                        onclick="change_payment_type('#edit_payment_form','cash')" @if($payment->payment_type == 'cash') checked @endif>
                    <label class="form-check-label" for="payment_type_cash">نقدي</label>
                </div>
            </div>
        @endif
        <div class="col-md-6">
            <i class="fa fa-credit-card payment_type_bank_icon"  style="font-size: 35px;@if($payment->payment_type == 'bank') color:violet @endif"
                onclick="change_payment_type('#edit_payment_form','bank')" ></i>
            <br>
            <div class="form-check ">
                <input class="form-check-input payment_type_bank" type="radio" id="payment_type_bank" name="payment_type" value="bank"
                    onclick="change_payment_type('#edit_payment_form','bank')" @if($payment->payment_type == 'bank') checked @endif>
                <label class="form-check-label" for="payment_type_bank">تحويل بنكي</label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 cash-info"  @if($payment->payment_type == 'package') style="display:none" @endif>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                    <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" min="0"
                        name="amount" id="amount" value="{{ old('amount', $payment->amount) }}">
                    @if ($errors->has('amount'))
                        <div class="invalid-feedback">
                            {{ $errors->first('amount') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
                </div>
                @if(!isset($frontend))
                    <div class="form-group col-md-6">
                        <label class="">{{ trans('cruds.payment.fields.payment_status') }}</label>
                        @foreach (App\Models\Payment::PAYMENT_STATUS_SELECT as $key => $label)
                            <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="payment_status_{{ $key }}"
                                    name="payment_status" value="{{ $key }}"
                                    {{ old('payment_status', $payment->payment_status) === (string) $key ? 'checked' : '' }}>
                                <label class="form-check-label"
                                    for="payment_status_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if ($errors->has('payment_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('payment_status') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.payment.fields.payment_status_helper') }}</span>
                    </div>
                @endif
            </div>
        </div>
        <div class="col-md-12 bank-info"  @if($payment->payment_type != 'bank') style="display:none" @endif>
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="transfer_name">{{ trans('cruds.payment.fields.transfer_name') }}</label>
                    <input class="form-control {{ $errors->has('transfer_name') ? 'is-invalid' : '' }}" type="text"
                        name="transfer_name" id="transfer_name"
                        value="{{ old('transfer_name', $payment->transfer_name) }}">
                    @if ($errors->has('transfer_name'))
                        <div class="invalid-feedback">
                            {{ $errors->first('transfer_name') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.transfer_name_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class=""
                        for="reference_number">{{ trans('cruds.payment.fields.reference_number') }}</label>
                    <input class="form-control {{ $errors->has('reference_number') ? 'is-invalid' : '' }}"
                        type="text" name="reference_number" id="reference_number"
                        value="{{ old('reference_number', $payment->reference_number) }}">
                    @if ($errors->has('reference_number'))
                        <div class="invalid-feedback">
                            {{ $errors->first('reference_number') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.reference_number_helper') }}</span>
                </div>
                <div class="form-group col-md-6">
                    <label class=""
                        for="last_4_digits">{{ trans('cruds.payment.fields.last_4_digits') }}</label>
                    <input class="form-control {{ $errors->has('last_4_digits') ? 'is-invalid' : '' }}" type="text"
                        name="last_4_digits" id="last_4_digits"
                        value="{{ old('last_4_digits', $payment->last_4_digits) }}">
                    @if ($errors->has('last_4_digits'))
                        <div class="invalid-feedback">
                            {{ $errors->first('last_4_digits') }}
                        </div>
                    @endif
                    <span class="help-block">{{ trans('cruds.payment.fields.last_4_digits_helper') }}</span>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
        <button class="btn btn-danger" type="submit">
            {{ trans('global.save') }}
        </button>
    </div>
</form>
