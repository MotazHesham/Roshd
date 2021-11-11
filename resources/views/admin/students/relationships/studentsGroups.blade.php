@can('group_create')
    <div class="card">
        <div class="card-header">
            <h5>أضافة لمجموعة</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.students.store_group") }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="student_id" value="{{ $student->id }}">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label  for="required">{{ trans('cruds.student.fields.group') }}</label> 
                        <select class="form-control select2 {{ $errors->has('group') ? 'is-invalid' : '' }}" name="group_id" id="group" required>
                            @foreach(\App\Models\Group::get() as $group)
                                <option value="{{ $group->id }}" {{ in_array($group->id, old('group', [])) ? 'selected' : '' }}>{{ $group->title ?? '' }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('group'))
                            <div class="invalid-feedback">
                                {{ $errors->first('group') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.student.fields.group_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="" for="transfer_name">{{ trans('cruds.group.fields.transfer_name') }}</label>
                        <input class="form-control {{ $errors->has('transfer_name') ? 'is-invalid' : '' }}" type="text" name="transfer_name" id="transfer_name" value="{{ old('transfer_name', '') }}" >
                        @if($errors->has('transfer_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('transfer_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.group.fields.transfer_name_helper') }}</span>
                    </div>  
                    <div class="form-group col-md-4">
                        <label class="" for="reference_number">{{ trans('cruds.group.fields.reference_number') }}</label>
                        <input class="form-control {{ $errors->has('reference_number') ? 'is-invalid' : '' }}" type="text" name="reference_number" id="reference_number" value="{{ old('reference_number', '') }}" >
                        @if($errors->has('reference_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reference_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.group.fields.reference_number_helper') }}</span>
                    </div>   
                    <div class="form-group col-md-3">
                        <label class="" for="payment_type">{{ trans('cruds.group.fields.payment_type') }}</label>
                        @foreach(App\Models\Group::PAYMENT_TYPE_SELECT as $key => $label)
                            <div class="form-check {{ $errors->has('payment_type') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="payment_type_{{ $key }}" name="payment_type" value="{{ $key }}" {{ old('payment_type', '') === (string) $key ? 'checked' : '' }} >
                                <label class="form-check-label" for="payment_type_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('payment_type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('payment_type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.group.fields.payment_type_helper') }}</span>
                    </div>   
                    <div class="form-group col-md-3">
                        <label class="">{{ trans('cruds.group.fields.payment_status') }}</label>
                        @foreach(App\Models\Group::PAYMENT_STATUS_SELECT as $key => $label)
                            <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="payment_status_{{ $key }}" name="payment_status" value="{{ $key }}" {{ old('payment_status', '') === (string) $key ? 'checked' : '' }} >
                                <label class="form-check-label" for="payment_status_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('payment_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('payment_status') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.group.fields.payment_status_helper') }}</span>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="required">{{ trans('cruds.student.fields.group_status') }}</label>
                        @foreach(App\Models\Group::STATUS_SELECT as $key => $label)
                            <div class="form-check {{ $errors->has('status') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="status_{{ $key }}" name="status" value="{{ $key }}" {{ old('status', '') === (string) $key ? 'checked' : '' }} required>
                                <label class="form-check-label" for="status_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('status') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.group.fields.status_helper') }}</span>
                    </div> 
                    <div class="form-group col-md-3">
                        <button class="btn btn-success btn-block btn-lg" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endcan

<div class="card">
    <div class="card-header">
        {{ trans('cruds.group.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-studentsGroups">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.group.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.title') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.group_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.transfer_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.reference_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.payment_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.payment_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($groups as $key => $group)
                        <tr data-entry-id="{{ $group->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $group->id ?? '' }}
                            </td>
                            <td>
                                {{ $group->title ?? '' }}
                            </td>
                            <td> 
                                {{ App\Models\Group::STATUS_SELECT[$group->pivot->status] ?? '' }}
                            </td>
                            <td>
                                {{ $group->pivot->transfer_name ?? '' }}
                            </td>
                            <td>
                                {{ $group->pivot->reference_number ?? '' }}
                            </td> 
                            <td>
                                {{ App\Models\Group::PAYMENT_TYPE_SELECT[$group->pivot->payment_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\Group::PAYMENT_STATUS_SELECT[$group->pivot->payment_status] ?? '' }}
                            </td>
                            <td> 
                                @if($group->pivot->payment_status != 'paid')
                                    @can('group_edit')
                                        <button onclick="editModal('{{ route('admin.students.edit_group',['student_id' => $student->id, 'group_id' => $group->id]) }}')" title="{{ trans('global.edit') }}" class="btn btn-outline-success btn-pill action-buttons-edit">
                                            <i  class="fa fa-edit actions-custom-i"></i>
                                        </button>
                                    @endcan
            
                                    @can('group_delete')  
                                        <a href="{{ route('admin.students.destroy_group',['student_id' => $student->id, 'group_id' => $group->id]) }}" class="btn btn-outline-danger btn-pill action-buttons-delete">
                                            <i  class="fa fa-trash actions-custom-i"></i>
                                        </a> 
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
            @can('group_delete')
                let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
                let deleteButton = {
                text: deleteButtonTrans,
                url: "{{ route('admin.groups.massDestroy') }}",
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
                order: [
                    [1, 'desc']
                ],
                pageLength: 25,
            });
            let table = $('.datatable-studentsGroups:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
