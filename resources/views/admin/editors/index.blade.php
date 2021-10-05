@extends('layouts.admin')
@section('content')
@can('editor_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.editors.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.editor.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.editor.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Editor">
                <thead>
                    <tr>
                        <th width="10">

                        </th>

                        <th>
                            {{ trans('cruds.editor.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.user.fields.name') }}
                        </th>

                        <th>
                            {{ trans('cruds.user.fields.email') }}
                        </th>
                        <th>
                            {{ trans('cruds.editor.fields.city') }}
                        </th>
                        <th>
                            {{ trans('cruds.editor.fields.work') }}
                        </th>
                        
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($editors as $key => $editor)
                        <tr data-entry-id="{{ $editor->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $editor->id ?? '' }}
                            </td>
                            <td>
                                {{ $editor->user->name ?? '' }}
                            </td>
                            <td>
                                {{ $editor->user->email ?? '' }}
                            </td>
                            <td>
                                {{ $editor->city ?? '' }}
                            </td>
                            <td>
                                {{ $editor->work ?? '' }}
                            </td>

                            <td>
                                @can('editor_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.editors.show', $editor->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('editor_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.editors.edit', $editor->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('editor_delete')
                                    <form action="{{ route('admin.editors.destroy', $editor->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
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
@can('editor_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.editors.massDestroy') }}",
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
  let table = $('.datatable-Editor:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });

})

</script>
@endsection
