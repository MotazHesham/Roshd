@extends('layouts.admin')
@section('content')
@can('center_services_package_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.center-services-packages.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.centerServicesPackage.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.centerServicesPackage.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-CenterServicesPackage">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.attend_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.doctor_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.package_value') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.sessions') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.free_sessions') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.package_content') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($centerServicesPackages as $key => $centerServicesPackage)
                        <tr data-entry-id="{{ $centerServicesPackage->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $centerServicesPackage->id ?? '' }}
                            </td>
                            <td>
                                {{ $centerServicesPackage->name ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CenterServicesPackage::ATTEND_TYPE_RADIO[$centerServicesPackage->attend_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CenterServicesPackage::DOCTOR_TYPE_RADIO[$centerServicesPackage->doctor_type] ?? '' }}
                            </td>
                            <td>
                                {{ $centerServicesPackage->package_value ?? '' }}
                            </td>
                            <td>
                                {{ $centerServicesPackage->sessions ?? '' }}
                            </td>
                            <td>
                                {{ $centerServicesPackage->free_sessions ?? '' }}
                            </td>
                            <td>
                                {{ $centerServicesPackage->package_content ?? '' }}
                            </td>
                            <td>
                                @can('center_services_package_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.center-services-packages.show', $centerServicesPackage->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('center_services_package_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.center-services-packages.edit', $centerServicesPackage->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('center_services_package_delete')
                                    <form action="{{ route('admin.center-services-packages.destroy', $centerServicesPackage->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

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
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('center_services_package_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.center-services-packages.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 25,
  });
  let table = $('.datatable-CenterServicesPackage:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
