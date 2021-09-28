@extends('layouts.admin')
@section('content')
@can('precentage_contract_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.precentage-contracts.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.precentageContract.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.precentageContract.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-PrecentageContract">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.precentageContract.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.precentageContract.fields.percentage') }}
                        </th>
                        <th>
                            {{ trans('cruds.precentageContract.fields.doctor') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($precentageContracts as $key => $precentageContract)
                        <tr data-entry-id="{{ $precentageContract->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $precentageContract->id ?? '' }}
                            </td>
                            <td>
                                {{ $precentageContract->percentage ?? '' }}
                            </td>
                            <td>
                                {{ $precentageContract->doctor->years_experience ?? '' }}
                            </td>
                            <td>
                                @can('precentage_contract_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.precentage-contracts.show', $precentageContract->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('precentage_contract_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.precentage-contracts.edit', $precentageContract->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('precentage_contract_delete')
                                    <form action="{{ route('admin.precentage-contracts.destroy', $precentageContract->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('precentage_contract_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.precentage-contracts.massDestroy') }}",
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
  let table = $('.datatable-PrecentageContract:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection