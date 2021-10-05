@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.student.title') }}
    </div>

    <div class="card-body">
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
                            {{ trans('cruds.student.fields.user') }}
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
</div>



@endsection