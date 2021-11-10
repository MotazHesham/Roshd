@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.user.title') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $patient->user->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $patient->user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $patient->user->email }}
                                    </td>
                                </tr> 
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.phone') }}
                                    </th>
                                    <td>
                                        {{ $patient->user->phone }}
                                    </td>
                                </tr> 
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card-header">
                        {{ trans('global.relatedData') }}
                    </div>
                    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs"> 
                        <li class="nav-item">
                            <a class="nav-link active" href="#patients_center_services_packages" role="tab" data-toggle="tab">
                                {{ trans('cruds.centerServicesPackage.title') }}
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content" style="padding:20px"> 
                        <div class="tab-pane active" role="tabpanel" id="patients_center_services_packages">
                            @includeIf('admin.patients.relationships.patientsCenterServicesPackages', ['centerServicesPackages' => $patient->packages , 'patient' => $patient])
                        </div>
                    </div> 
                </div>
            </div>
        </div>
    </div>  

    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function editModal(route) {
            var errorContainer =
                '<div class="alert alert-danger" style="display: none" id="jquery-error-edit-modal">  </div>';
            $.ajax({
                url: route,
                method: 'GET',
                success: function(data) {
                    $('#editModal').modal('show'); 
                    $('#editModal .modal-body').html(errorContainer + data); 
                }
            });
        } 
    </script>
@endsection