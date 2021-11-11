@extends('layouts.student')
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('cruds.group.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <table class=" table table-bordered table-striped table-hover ajaxTable datatable datatable-Group">
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
                            {{ trans('cruds.group.fields.start_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.end_date') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.course_hours') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.course_cost') }}
                        </th>
                        <th>
                            {{ trans('cruds.student.fields.group_status') }}
                        </th>
                        <th>
                            {{ trans('cruds.group.fields.user') }}
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
                                {{ $group->start_date ?? '' }}
                            </td>
                            <td>
                                {{ $group->end_date ?? '' }}
                            </td>
                            <td>
                                {{ $group->course_hours ?? '' }}
                            </td>
                            <td>
                                {{ $group->course_cost ?? '' }}
                            </td>
                            <td> 
                                {{ App\Models\Group::STATUS_SELECT[$group->pivot->status] ?? '' }}
                            </td>    
                            <td>
                                {{ $group->user->name ?? '' }}
                            </td> 
                            <td>  

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection 
