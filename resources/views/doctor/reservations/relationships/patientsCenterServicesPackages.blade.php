@can('center_services_package_create')
    <div class="card">
        <div class="card-header">
            <h5>أضافة باقة</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route("admin.patients.store_patient_package") }}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                <div class="row">
                    <div class="form-group col-md-4">
                        <label  for="package">{{ trans('cruds.patients.fields.package') }}</label> 
                        <select class="form-control select2 {{ $errors->has('package') ? 'is-invalid' : '' }}" name="package_id" id="package" >
                            @foreach(\App\Models\CenterServicesPackage::get() as $package)
                                <option value="{{ $package->id }}" {{ in_array($package->id, old('package', [])) ? 'selected' : '' }}>{{ $package->name }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('package'))
                            <div class="invalid-feedback">
                                {{ $errors->first('package') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.patients.fields.package_helper') }}</span>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="required" for="transfer_name">{{ trans('cruds.centerServicesPackage.fields.transfer_name') }}</label>
                        <input class="form-control {{ $errors->has('transfer_name') ? 'is-invalid' : '' }}" type="text" name="transfer_name" id="transfer_name" value="{{ old('transfer_name', '') }}" required>
                        @if($errors->has('transfer_name'))
                            <div class="invalid-feedback">
                                {{ $errors->first('transfer_name') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.transfer_name_helper') }}</span>
                    </div>  
                    <div class="form-group col-md-4">
                        <label class="required" for="reference_number">{{ trans('cruds.centerServicesPackage.fields.reference_number') }}</label>
                        <input class="form-control {{ $errors->has('reference_number') ? 'is-invalid' : '' }}" type="text" name="reference_number" id="reference_number" value="{{ old('reference_number', '') }}" required>
                        @if($errors->has('reference_number'))
                            <div class="invalid-feedback">
                                {{ $errors->first('reference_number') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.reference_number_helper') }}</span>
                    </div>   
                    <div class="form-group col-md-4">
                        <label class="required" for="payment_type">{{ trans('cruds.centerServicesPackage.fields.payment_type') }}</label>
                        @foreach(App\Models\CenterServicesPackage::PAYMENT_TYPE_SELECT as $key => $label)
                            <div class="form-check {{ $errors->has('payment_type') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="payment_type_{{ $key }}" name="payment_type" value="{{ $key }}" {{ old('payment_type', '') === (string) $key ? 'checked' : '' }} required>
                                <label class="form-check-label" for="payment_type_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('payment_type'))
                            <div class="invalid-feedback">
                                {{ $errors->first('payment_type') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.payment_type_helper') }}</span>
                    </div>   
                    <div class="form-group col-md-4">
                        <label class="required">{{ trans('cruds.centerServicesPackage.fields.payment_status') }}</label>
                        @foreach(App\Models\CenterServicesPackage::PAYMENT_STATUS_SELECT as $key => $label)
                            <div class="form-check {{ $errors->has('payment_status') ? 'is-invalid' : '' }}">
                                <input class="form-check-input" type="radio" id="payment_status_{{ $key }}" name="payment_status" value="{{ $key }}" {{ old('payment_status', '') === (string) $key ? 'checked' : '' }} required>
                                <label class="form-check-label" for="payment_status_{{ $key }}">{{ $label }}</label>
                            </div>
                        @endforeach
                        @if($errors->has('payment_status'))
                            <div class="invalid-feedback">
                                {{ $errors->first('payment_status') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.centerServicesPackage.fields.payment_status_helper') }}</span>
                    </div> 
                    <div class="form-group col-md-4">
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
        باقات المراجع
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table
                class=" table table-bordered table-striped table-hover datatable datatable-usersCenterServicesPackages">
                <thead>
                    <tr>
                        <th width="10">

                        </th> 
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.name') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.package_value') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.transfer_name') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.reference_number') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.payment_type') }}
                        </th>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.payment_status') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($centerServicesPackages as $key => $centerServicesPackage)
                        <tr data-entry-id="{{ $centerServicesPackage->id }}">
                            <td>

                            </td> 
                            <td>
                                {{ $centerServicesPackage->name ?? '' }}
                            </td>
                            <td>
                                {{ $centerServicesPackage->package_value ?? '' }}
                            </td>
                            <td>
                                {{ $centerServicesPackage->pivot->transfer_name ?? '' }}
                            </td>
                            <td>
                                {{ $centerServicesPackage->pivot->reference_number ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CenterServicesPackage::PAYMENT_TYPE_SELECT[$centerServicesPackage->pivot->payment_type] ?? '' }}
                            </td>
                            <td>
                                {{ App\Models\CenterServicesPackage::PAYMENT_STATUS_SELECT[$centerServicesPackage->pivot->payment_status] ?? '' }}
                            </td>
                            <td>  
                                @can('center_services_package_edit')
                                    <button onclick="editModal('{{ route('admin.patients.edit_patient_package', [ 'row_id' => $centerServicesPackage->pivot->id , 'patient_id' => $patient->id]) }}')" title="{{ trans('global.edit') }}" class="btn btn-outline-success btn-pill action-buttons-edit">
                                        <i  class="fa fa-edit actions-custom-i"></i>
                                    </button>
                                @endcan
        
                                @can('center_services_package_delete')  
                                    <a href="{{ route('admin.patients.destroy_patient_package', [ 'row_id' => $centerServicesPackage->pivot->id , 'patient_id' => $patient->id]) }}" class="btn btn-outline-danger btn-pill action-buttons-delete">
                                        <i  class="fa fa-trash actions-custom-i"></i>
                                    </a> 
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
        $(function() {
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
                order: [
                    [1, 'desc']
                ],
                pageLength: 100,
            });
            let table = $('.datatable-usersCenterServicesPackages:not(.ajaxTable)').DataTable({
                buttons: dtButtons
            })
            $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e) {
                $($.fn.dataTable.tables(true)).DataTable()
                    .columns.adjust();
            });

        })
    </script>
@endsection
