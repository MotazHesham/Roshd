@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reservation.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reservations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.id') }}
                        </th>
                        <td>
                            {{ $reservation->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.reservation_date') }}
                        </th>
                        <td>
                            {{ $reservation->reservation_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.statuse') }}
                        </th>
                        <td>
                            {{ App\Models\Reservation::STATUSE_SELECT[$reservation->statuse] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.delay_date') }}
                        </th>
                        <td>
                            {{ $reservation->delay_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.cancel_reason') }}
                        </th>
                        <td>
                            {{ $reservation->cancel_reason }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.cost') }}
                        </th>
                        <td>
                            {{ $reservation->cost }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.condation') }}
                        </th>
                        <td>
                            {{ $reservation->condation }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.user') }}
                        </th>
                        <td>
                            {{ $reservation->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.doctor') }}
                        </th>
                        <td>
                            {{ $reservation->doctor->years_experience ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.clinic') }}
                        </th>
                        <td>
                            {{ $reservation->clinic->clinic_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.notes') }}
                        </th>
                        <td>
                            {{ $reservation->notes }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.payment_status') }}
                        </th>
                        <td>
                            {{ App\Models\Reservation::PAYMENT_STATUS_SELECT[$reservation->payment_status] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.payment_type') }}
                        </th>
                        <td>
                            {{ App\Models\Reservation::PAYMENT_TYPE_SELECT[$reservation->payment_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.transfer_name') }}
                        </th>
                        <td>
                            {{ $reservation->transfer_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.reservation.fields.reference_number') }}
                        </th>
                        <td>
                            {{ $reservation->reference_number }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.reservations.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection