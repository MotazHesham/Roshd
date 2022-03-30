
@if($required_amount != 0)
    @php
        $sum = $payments->where('payment_status','paid')->sum('amount');
        $progress = ($sum / $required_amount) * 100;
    @endphp
    <div class="text-center">
        <span class="badge @if(isset($frontend)) bg-success @else badge-success @endif">تم سداد:{{ $sum }}</span> /
        <span class="badge @if(isset($frontend)) bg-warning @else badge-warning @endif">مطلوب سداد:{{ $required_amount }}</span> /
        <span class="badge @if(isset($frontend)) bg-dark @else badge-dark @endif">باقي للسداد:{{ $required_amount - $sum }}</span>
    </div>
@endif
<div class="progress mb-3">
    @if($required_amount != 0)
        <div class="progress-bar bg-info" role="progressbar" style="width: {{$progress}}%;" aria-valuenow="{{$progress}}" aria-valuemin="0" aria-valuemax="100">
            {{ round($progress,2) }}%
        </div>
    @endif
</div>
<table class=" table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>
                {{ trans('cruds.payment.fields.amount') }}
            </th>
            <th>
                {{ trans('cruds.payment.fields.payment_type') }}
            </th>
            <th>
                {{ trans('cruds.payment.fields.payment_status') }}
            </th>
            <th>
                {{ trans('cruds.payment.fields.transfer_name') }}
            </th>
            <th>
                {{ trans('cruds.payment.fields.reference_number') }}
            </th>
            <th>
                {{ trans('cruds.payment.fields.last_4_digits') }}
            </th>
            <th>
                {{ trans('cruds.payment.fields.created_by') }}
            </th>
            <th>
                {{ trans('cruds.payment.fields.created_at') }}
            </th>
            <th>

            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($payments as $key => $payment)
            <tr data-entry-id="{{ $payment->id }}" id="payment-{{$payment->id}}" @if(isset($payment_id) && $payment->id == $payment_id) class="pulse" @endif>
                <td>
                    {{ $payment->amount }}
                </td>
                <td>
                    {{ \App\Models\Payment::PAYMENT_TYPE_SELECT[$payment->payment_type] ?? '' }}
                </td>
                <td>
                    {{ \App\Models\Payment::PAYMENT_STATUS_SELECT[$payment->payment_status] ?? '' }}
                </td>
                <td>
                    {{ $payment->transfer_name }}
                </td>
                <td>
                    {{ $payment->reference_number }}
                </td>
                <td>
                    {{ $payment->last_4_digits }}
                </td>
                <td>
                    {{ $payment->user->name ?? '' }}
                </td>
                <td>
                    {{ $payment->created_at ?? '' }}
                </td>
                <td>
                    @if($payment->payment_type != 'package')
                        @can('payment_edit')
                            <button type="button" class="btn btn-xs btn-info" onclick="edit_payment('{{ $payment->id }}')">
                                {{ trans('global.edit') }}
                            </button>
                        @endcan

                        @can('payment_delete')
                            <form action="{{ route('admin.payments.destroy', $payment->id) }}" method="POST"
                                onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                style="display: inline-block;">
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                            </form>
                        @else
                            @if(isset($frontend) && $payment->payment_status == 'not_paid')
                                <form action="{{ route('frontend.payments.destroy', $payment->id) }}" method="POST"
                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                    style="display: inline-block;">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="submit" class="btn btn-sm btn-danger" value="{{ trans('global.delete') }}">
                                </form>
                            @endif
                        @endcan
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
