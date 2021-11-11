@extends('layouts.doctor')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.reservation.title_singular') }}
    </div>

    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
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
                                    {{ $reservation->user->name ?? '' }}
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
                        </tbody>
                    </table>
                    <div class="form-group">
                        <a class="btn btn-default" href="{{ route('admin.reservations.index') }}">
                            {{ trans('global.back_to_list') }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card-header">
                    {{ trans('global.relatedData') }}
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">  
                    <li class="nav-item">
                        <a class="nav-link active" href="#user_reservations" role="tab" data-toggle="tab">
                            {{ trans('cruds.reservation.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content" style="padding:20px">  
                    <div class="tab-pane active" role="tabpanel" id="user_reservations">
                        @includeIf('doctor.reservations.relationships.userReservations', ['reservations' => $reservation->user->userReservations])
                    </div>
                </div> 
            </div>
        </div>
    </div>
</div>



@endsection
