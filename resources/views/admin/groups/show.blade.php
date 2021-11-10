@extends('layouts.admin')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.show') }} {{ trans('cruds.group.title') }}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.groups.index') }}">
                                {{ trans('global.back_to_list') }}
                            </a>
                        </div>
                        <table class="table table-bordered table-striped">
                            <tbody>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.id') }}
                                    </th>
                                    <td>
                                        {{ $group->id }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.title') }}
                                    </th>
                                    <td>
                                        {{ $group->title }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.start_date') }}
                                    </th>
                                    <td>
                                        {{ $group->start_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.end_date') }}
                                    </th>
                                    <td>
                                        {{ $group->end_date }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.course_hours') }}
                                    </th>
                                    <td>
                                        {{ $group->course_hours }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.course_cost') }}
                                    </th>
                                    <td>
                                        {{ $group->course_cost }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.status') }}
                                    </th>
                                    <td>
                                        {{ App\Models\Group::STATUS_RADIO[$group->status] ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.user') }}
                                    </th>
                                    <td>
                                        {{ $group->user->email ?? '' }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.photo') }}
                                    </th>
                                    <td>
                                        @if ($group->photo)
                                            <a href="{{ $group->photo->getUrl() }}" target="_blank"
                                                style="display: inline-block">
                                                <img src="{{ $group->photo->getUrl('thumb') }}">
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        {{ trans('cruds.group.fields.description') }}
                                    </th>
                                    <td>
                                        {{ $group->description }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="form-group">
                            <a class="btn btn-default" href="{{ route('admin.groups.index') }}">
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
                                <a class="nav-link active" href="#groups_students" role="tab" data-toggle="tab">
                                    {{ trans('cruds.student.title') }}
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" role="tabpanel" id="groups_students">
                                @includeIf('admin.groups.relationships.groupStudents', ['students' => $group->students])
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
