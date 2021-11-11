<div class="card">
    <div class="card-header">
        {{ trans('cruds.reservation.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-userReservations">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.reservation.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.reservation.fields.doctor') }}
                        </th>
                        <th>
                            {{ trans('cruds.reservation.fields.reservation_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.reservation.fields.statuse') }}
                        </th> 
                        <th>
                            {{ trans('cruds.reservation.fields.cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.reservation.fields.condation') }}
                        </th> 
                        <th>
                            {{ trans('cruds.reservation.fields.notes') }}
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
                                {{ $reservation->doctor->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $reservation->reservation_date ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Reservation::STATUSE_SELECT[$reservation->statuse] ?? '' }}
                            </td> 
                            <td>
                                {{ $reservation->cost ?? '' }}
                            </td>
                            <td>
                                {{ $reservation->condation ?? '' }}
                            </td> 
                            <td>
                                {{ $reservation->notes ?? '' }}
                            </td> 
                            <td> 

                                @if($reservation->payment_status == 'not_paid')
                                    @can('reservation_delete')
                                        <form action="{{ route('admin.reservations.destroy', $reservation->id) }}"
                                            method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                            style="display: inline-block;">
                                            <input type="hidden" name="_method" value="DELETE">
                                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                            <input type="submit" class="btn btn-xs btn-danger"
                                                value="{{ trans('global.delete') }}">
                                        </form>
                                    @endcan
                                @endif

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

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
                pageLength: 100,
            });
            let table = $('.datatable-userReservations:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
