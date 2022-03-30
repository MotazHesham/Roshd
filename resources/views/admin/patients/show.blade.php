@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.patients.title') }}
        </div>

        <div class="card-body">
            <div class="form-group">
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
                </div>
                <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                    <li class="nav-item">
                        <a class="nav-link " href="#patient_info" role="tab" data-toggle="tab">
                            {{ trans('global.show') }} {{ trans('cruds.patients.title') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="#patients_center_services_packages" role="tab" data-toggle="tab">
                            باقات المراجع
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#user_reservations" role="tab" data-toggle="tab">
                            {{ trans('cruds.reservation.title') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content" style="padding:20px">
                    <div class="tab-pane " role="tabpanel" id="patient_info">
                        @includeIf('admin.patients.relationships.info', ['patient' => $patient])
                    </div>
                    <div class="tab-pane active" role="tabpanel" id="patients_center_services_packages">
                        @includeIf('admin.patients.relationships.patientsCenterServicesPackages', [
                            'patientPackages' => $patientPackages,
                            'patient' => $patient,
                        ])
                    </div>
                    <div class="tab-pane" role="tabpanel" id="user_reservations">
                        @includeIf('admin.patients.relationships.userReservations', [
                            'reservations' => $patient->user->userReservations,
                        ])
                    </div>
                </div>
                <div class="form-group">
                    <a class="btn btn-default" href="{{ route('admin.patients.index') }}">
                        {{ trans('global.back_to_list') }}
                    </a>
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

        $(document).ready(function(){
            @if(\Request::has('paymentable_id'))
                @if(\Request::has('payment_id'))
                    show_payments('CenterServicesPackageUser','{{request("paymentable_id")}}' , '{{ request("payment_id") }}');
                @else
                    show_payments('CenterServicesPackageUser','{{request("paymentable_id")}}');
                @endif
            @endif
        });

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
