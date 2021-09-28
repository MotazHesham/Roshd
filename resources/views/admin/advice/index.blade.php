@extends('layouts.admin')
@section('content')
@can('advice_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.advice.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.advice.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.advice.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Advice">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.advice.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.advice.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.advice.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.advice.fields.advice_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.advice.fields.description') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($advice as $key => $advice)
                        <tr data-entry-id="{{ $advice->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $advice->id ?? '' }}
                            </td>
                            <td>
                                {{ $advice->name ?? '' }}
                            </td>
                            <td>
                                {{ $advice->email ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Advice::ADVICE_TYPE_SELECT[$advice->advice_type] ?? '' }}
                            </td>
                            <td>
                                {{ $advice->description ?? '' }}
                            </td>
                            <td>
                                @can('advice_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.advice.show', $advice->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('advice_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.advice.edit', $advice->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('advice_delete')
                                    <form action="{{ route('admin.advice.destroy', $advice->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('advice_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.advice.massDestroy') }}",
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
  let table = $('.datatable-Advice:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection