@extends('layouts.doctor')
@section('content') 
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.reservation.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable datatable-Reservation">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.reservation.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.reservation.fields.user') }}
                            </th>
                            <th>
                                {{ trans('cruds.reservation.fields.reservation_date') }}
                            </th>
                            <th>
                                {{ trans('cruds.reservation.fields.statuse') }}
                            </th> 
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reservations as $key => $reservation)
                            <tr data-entry-id="{{ $reservation->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $reservation->id ?? '' }}
                                </td>
                                <td>
                                    {{ $reservation->user->name ?? '' }}
                                </td>
                                <td>
                                    <span class="badge badge-dark">{{ $reservation->reservation_date ?? '' }}</span>
                                    <br>
                                    <span class="badge badge-light">{{ $reservation->reservation_time ?? '' }}</span>
                                </td>
                                <td>
                                    {{ App\Models\Reservation::STATUSE_SELECT[$reservation->statuse] ?? '' }}
                                </td> 
                                <td> 

                                    <a class="btn btn-xs btn-primary" href="{{ route('doctor.reservations.show', $reservation->id) }}">
                                        {{ trans('global.show') }}
                                    </a> 
                                    <a class="btn btn-xs btn-info" href="{{ route('doctor.reservations.edit', $reservation->id) }}">
                                        {{ trans('global.edit') }}
                                    </a> 


                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script>
        $(function() {
            let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons) 

            $.extend(true, $.fn.dataTable.defaults, {
                orderCellsTop: true,
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-Reservation:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
