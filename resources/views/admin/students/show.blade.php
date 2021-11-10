@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.student.title') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.students.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.name') }}
                                    </th>
                                    <td>
                                        {{ $student->user->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.hours') }}
                                    </th>
                                    <td>
                                        {{ $student->hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.student.fields.specialization') }}
                                    </th>
                                    <td>
                                        {{ $student->specialization->name ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.user.fields.email') }}
                                    </th>
                                    <td>
                                        {{ $student->user->email ?? '' }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.students.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">
                            {{ trans('global.relatedData') }}
                        </div>
                        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                            <li class="nav-item">
                                <a class="nav-link active" href="#students_groups" role="tab" data-toggle="tab">
                                    {{ trans('cruds.group.title') }}
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="students_groups">
                                @includeIf('admin.students.relationships.studentsGroups', ['groups' =>
                                $student->studentsGroups])
                            </div>
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
