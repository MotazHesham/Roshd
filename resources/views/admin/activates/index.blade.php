@extends('layouts.admin')
@section('content')
@can('activate_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.activates.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.activate.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.activate.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Activate">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.activate.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.activate.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.activate.fields.date') }}
                        </th>
                        <th>
                            {{ trans('cruds.activate.fields.description') }}
                        </th>
                        <th>
                            {{ trans('cruds.activate.fields.photo') }}
                        </th>
                        <th>
                            {{ trans('cruds.activate.fields.video') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($activates as $key => $activate)
                        <tr data-entry-id="{{ $activate->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $activate->id ?? '' }}
                            </td>
                            <td>
                                {{ $activate->title ?? '' }}
                            </td>
                            <td>
                                {{ $activate->date ?? '' }}
                            </td>
                            <td>
                                {{ $activate->description ?? '' }}
                            </td>
                            <td>
                                @if($activate->photo)
                                    <a href="{{ $activate->photo->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $activate->photo->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if($activate->video)
                                    <a href="{{ $activate->video->getUrl() }}" target="_blank">
                                        {{ trans('global.view_file') }}
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('activate_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.activates.show', $activate->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('activate_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.activates.edit', $activate->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('activate_delete')
                                    <form action="{{ route('admin.activates.destroy', $activate->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('activate_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.activates.massDestroy') }}",
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
  let table = $('.datatable-Activate:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection