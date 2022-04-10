@can('salary_contract_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.salary-contracts.create', $doctor->id) }}">
                {{ trans('global.add') }} {{ trans('cruds.salaryContract.title_singular') }}
            </a>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.salaryContract.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-doctorSalaryContracts">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.salaryContract.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryContract.fields.contract_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryContract.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryContract.fields.duration') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryContract.fields.work_hours') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryContract.fields.mechanism') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryContract.fields.salary') }}
                        </th>
                        <th>
                            {{ trans('cruds.salaryContract.fields.allowance') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salaryContracts as $key => $salaryContract)
                        <tr data-entry-id="{{ $salaryContract->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $salaryContract->id ?? '' }}
                            </td>
                            <td>
                                {{ $salaryContract->contract_number ?? '' }}
                            </td>
                            <td>
                                {{ $salaryContract->date ?? '' }}
                            </td>
                            <td>
                                {{ $salaryContract->duration ?? '' }}
                            </td>
                            <td>
                                {{ $salaryContract->work_hours ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\SalaryContract::MECHANISM_RADIO[$salaryContract->mechanism] ?? '' }}
                            </td>
                            <td>
                                {{ $salaryContract->salary ?? '' }}
                            </td>
                            <td>
                                @foreach($salaryContract->allowances as $key => $item)
                                    <span class="badge badge-info">{{ $item->name }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('salary_contract_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.salary-contracts.show', $salaryContract->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('salary_contract_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.salary-contracts.edit', $salaryContract->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('salary_contract_delete')
                                    <form action="{{ route('admin.salary-contracts.destroy', $salaryContract->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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

@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('salary_contract_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.salary-contracts.massDestroy') }}",
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
  let table = $('.datatable-doctorSalaryContracts:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection