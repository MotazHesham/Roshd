@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.relatedData') }}
        </div>
        <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
            <li class="nav-item">
                <a class="nav-link " href="#groups_info" role="tab" data-toggle="tab">
                    {{ trans('global.show') }} {{ trans('cruds.group.title_singular') }}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#groups_students" role="tab" data-toggle="tab">
                    {{ trans('cruds.student.title') }}
                </a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane " role="tabpanel" id="groups_info">
                @includeIf('admin.groups.relationships.info', ['group' => $group])
            </div>
            <div class="tab-pane active" role="tabpanel" id="groups_students">
                @includeIf('admin.groups.relationships.groupStudents', ['students' => $groupStudents])
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
