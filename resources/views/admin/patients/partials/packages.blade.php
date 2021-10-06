<table>
    @foreach($packages as   $package)
        <tr>
            <td><input {{ $package->name ? 'checked' : null }} data-id="{{ $package->id }}" type="checkbox" class="ingredient-enable"></td>
            <td>{{ $package->name }}</td>
            <td><input value="{{ $package->remaining ?? null }}" {{ $package->remaining ? null : 'disabled' }} data-id="{{ $package->id }}" name="packages[{{ $package->id }}]" type="text" class="ingredient-amount form-control" placeholder="القيمة المتبقية"></td>
            <td>
            <select class="form-control {{ $errors->has('payment_status') ? 'is-invalid' : '' }}" name="payment_status" id="payment_status">
                <option value disabled {{ old('payment_status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                @foreach(App\Models\CenterServicesPackage::PAYMENT_STATUS_SELECT as $key => $label)
                    <option value="{{ $key }}" {{ old('payment_status', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                @endforeach
            </select>
            </td>
                <td>
                <select class="form-control {{ $errors->has('payment_type') ? 'is-invalid' : '' }}" name="payment_type" id="payment_type">
                    <option value disabled {{ old('payment_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\CenterServicesPackage::PAYMENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('payment_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </td>
            <td><input value="{{ $package->transfer_name ?? null }}" {{ $package->transfer_name ? null : 'disabled' }} data-id="{{ $package->id }}" name="packages[{{ $package->id }}]" type="text" class="ingredient-amount form-control" placeholder=" اسم المحول"></td>
            <td><input value="{{ $package->reference_number ?? null }}" {{ $package->reference_number ? null : 'disabled' }} data-id="{{ $package->id }}" name="packages[{{ $package->id }}]" type="text" class="ingredient-amount form-control" placeholder=" الرقم المرجعي"></td>
        </tr>




    @endforeach
</table>

@section('scripts')
    @parent
    <script>
        $('document').ready(function () {
            $('.ingredient-enable').on('click', function () {
                let id = $(this).attr('data-id')
                let enabled = $(this).is(":checked")
                $('.ingredient-amount[data-id="' + id + '"]').attr('disabled', !enabled)
                $('.ingredient-amount[data-id="' + id + '"]').val(0)
            })
        });
    </script>
@endsection
