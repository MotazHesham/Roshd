@php
if (!isset($form_name)) {
    $form_name = ' ';
}
@endphp
<div class="row text-center mb-4">

    @if (!isset($frontend))
        <div class="col-md-4">
            <i class="fa fa-money payment_type_cash_icon" style="font-size: 35px"
                onclick="change_payment_type('{{ $form_name }}','cash')"></i>
            <br>
            <div class="form-check ">
                <input class="form-check-input payment_type_cash" type="radio" id="payment_type_cash" name="payment_type"
                    value="cash" onclick="change_payment_type('{{ $form_name }}','cash')" required>
                <label class="form-check-label" for="payment_type_cash">نقدي</label>
            </div>
        </div>
    @endif
    <div class="col-md-4">
        <i class="fa fa-credit-card payment_type_bank_icon" style="font-size: 35px"
            onclick="change_payment_type('{{ $form_name }}','bank')"></i>
        <br>
        <div class="form-check ">
            <input class="form-check-input payment_type_bank" type="radio" id="payment_type_bank" name="payment_type"
                value="bank" onclick="change_payment_type('{{ $form_name }}','bank')" required @if (isset($frontend)) checked @endif>
            <label class="form-check-label" for="payment_type_bank">تحويل بنكي</label>
        </div>
    </div>
    @if (isset($package))
        <div class="col-md-4">
            <i class="fa fa-gift payment_type_package_icon" style="font-size: 35px"
                onclick="change_payment_type('{{ $form_name }}','package')"></i>
            <br>
            <div class="form-check ">
                <input class="form-check-input payment_type_package" type="radio" id="payment_type_package"
                    name="payment_type" value="package" onclick="change_payment_type('{{ $form_name }}','package')"
                    required>
                <label class="form-check-label" for="payment_type_package">باقة</label>
            </div>
        </div>
    @endif
</div>
<div class="row">

    <div class="col-md-12 cash-info" @if (!isset($frontend)) style="display:none" @endif>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="amount">{{ trans('cruds.payment.fields.amount') }}</label>
                <input class="form-control {{ $errors->has('amount') ? 'is-invalid' : '' }}" type="number" min="0"
                    name="amount" id="amount" value="{{ old('amount', $cost) }}">
                @if ($errors->has('amount'))
                    <div class="invalid-feedback">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.amount_helper') }}</span>
            </div>

            @if (!isset($frontend))
                <div class="form-group col-md-6">
                    <label class="">{{ trans('cruds.payment.fields.payment_status') }}</label>
                    @foreach (App\Models\Payment::PAYMENT_STATUS_SELECT as $key => $label)
                        @php
                            if ($key == 'paid') {
                                $checked = 'paid';
                            } else {
                                $checked = '';
                            }
                        @endphp
                        <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                            <input class="form-check-input" type="radio" id="payment_status_{{ $key }}"
                                name="payment_status" value="{{ $key }}"
                                {{ old('payment_status', $checked) === (string) $key ? 'checked' : '' }}>
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
    <div class="col-md-12 bank-info" @if (!isset($frontend)) style="display:none" @endif >
        <div class="row">
            <div class="form-group col-md-12">
                <label for="transfer_name">{{ trans('cruds.payment.fields.transfer_name') }}</label>
                <input class="form-control {{ $errors->has('transfer_name') ? 'is-invalid' : '' }}" type="text"
                    name="transfer_name" id="transfer_name" value="{{ old('transfer_name', '') }}">
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
                <input class="form-control {{ $errors->has('reference_number') ? 'is-invalid' : '' }}" type="text"
                    name="reference_number" id="reference_number" value="{{ old('reference_number', '') }}">
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
                    name="last_4_digits" id="last_4_digits" value="{{ old('last_4_digits', '') }}">
                @if ($errors->has('last_4_digits'))
                    <div class="invalid-feedback">
                        {{ $errors->first('last_4_digits') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.payment.fields.last_4_digits_helper') }}</span>
            </div>
        </div>
    </div>
    @if (isset($patientPackages))
        <div class="col-md-12 package-info" style="display:none">
            <h5 for="">{{ trans('cruds.payment.fields.package') }}</h5>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th width="10">
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.sessions_left') }}
                        </th>
                        <th>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($patientPackages as $key => $raw)
                        <tr data-entry-id="{{ $raw->id }}" for="{{ $raw->id }}">
                            <td>
                                <input class="@if(isset($frontend)) form-check-input @endif user_package_radio" type="radio" id="{{ $raw->id }}" name="user_package_id" value="{{ $raw->id }}" @if($loop->first) checked @endif>
                            </td>
                            <td>
                                @php
                                    $sum = $raw->payments()->where('payment_status','paid')->sum('amount');
                                @endphp
                                {{ $raw->package->name ?? '' }}
                                <br>
                                <span class="badge @if(isset($frontend)) bg-info @else badge-info @endif">
                                    تم سداد: {{ round(($sum / $raw->package_value) * 100) }}%
                                </span>
                            </td>
                            <td>
                                <span class="badge @if(isset($frontend)) bg-info @else badge-info @endif">{{ $raw->remaining_sessions ?? '' }} جلسة</span>
                                <span class="badge @if(isset($frontend)) bg-warning @else badge-warning @endif">{{ $raw->remaining_free_sessions ?? '' }} جلسة مجانية</span>
                            </td>
                            <td>
                                <span class="badge @if(isset($frontend)) bg-success @else badge-success @endif" @if($raw->package->attend_type == 'offline') style="background-color:#86bf99" @endif>
                                    {{ \App\Models\CenterServicesPackage::ATTEND_TYPE_RADIO[$raw->package->attend_type] ?? '' }}</span>
                                <br>
                                <span class="badge @if(isset($frontend)) bg-danger @else badge-danger @endif" @if($raw->package->doctor_type == 'advisor') style="background-color:#a36464" @endif>
                                    {{ \App\Models\CenterServicesPackage::DOCTOR_TYPE_RADIO[$raw->package->doctor_type] ?? '' }}</span>
                            </td>
                        <tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
<div class="form-group">
    <button class="btn btn-danger" type="submit">
        {{ trans('global.save') }}
    </button>
</div>
