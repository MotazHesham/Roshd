
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>أضافة باقة</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.package-patient.store') }}"
                    enctype="multipart/form-data" id="add_package_patient_form">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $patient->user->id }}">
                    <input type="hidden" name="patient_id" value="{{ $patient->id }}">
                    <div class="form-group col-md-12">
                        <label class="required" for="package">{{ trans('cruds.patients.fields.package') }}</label>
                        <select class="form-control select2 {{ $errors->has('package') ? 'is-invalid' : '' }}" name="package_id" id="package" required>
                            @foreach (\App\Models\CenterServicesPackage::get() as $raw)
                                <option value="{{ $raw->id }}" {{ in_array($raw->id, old('package', [])) ? 'selected' : '' }}>
                                    {{ $raw->name }}
                                </option>
                            @endforeach
                        </select>
                        @if ($errors->has('package'))
                            <div class="invalid-feedback">
                                {{ $errors->first('package') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.patients.fields.package_helper') }}</span>
                    </div>
                    @include('partials.payments.create', ['cost' => 0,'form_name' => '#add_package_patient_form'])
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                باقات المراجع
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed">
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
                                    {{ trans('cruds.centerServicesPackage.fields.attend_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.centerServicesPackage.fields.doctor_type') }}
                                </th>
                                <th>
                                    {{ trans('cruds.centerServicesPackage.fields.sessions_left') }}
                                </th>
                                <th>

                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patientPackages as $key => $raw)
                                <tr data-entry-id="{{ $raw->id }}">
                                    <td>
                                        {{ $raw->id }}
                                    </td>
                                    <td>
                                        {{ $raw->package->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $raw->package_value ?? '' }}
                                    </td>
                                    <td>
                                        {{ \App\Models\CenterServicesPackage::ATTEND_TYPE_RADIO[$raw->package->attend_type] ?? '' }}
                                    </td>
                                    <td>
                                        {{ \App\Models\CenterServicesPackage::DOCTOR_TYPE_RADIO[$raw->package->doctor_type] ?? '' }}
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ $raw->remaining_sessions ?? '' }} جلسة</span>
                                        <span class="badge badge-warning">{{ $raw->remaining_free_sessions ?? '' }} جلسة مجانية</span>
                                    </td>
                                    <td>

                                        @can('payment_store')
                                            <button class="btn btn-success btn-xs" onclick="add_payments('CenterServicesPackageUser','{{ $raw->id }}')">{{ trans('cruds.payment.new_payment') }}</button>
                                        @endcan

                                        <button class="btn btn-info btn-xs" onclick="show_payments('CenterServicesPackageUser','{{ $raw->id }}')">{{ trans('cruds.payment.title_singular') }}</button>

                                        @can('center_services_package_delete')
                                            <form action="{{ route('admin.package-patient.destroy', $raw->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="حذف الباقة">
                                            </form>
                                        @endcan
                                    </td>
                                <tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
