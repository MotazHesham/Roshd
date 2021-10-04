@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.experience.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.id') }}
                        </th>
                        <td>
                            {{ $experience->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.job_title') }}
                        </th>
                        <td>
                            {{ $experience->job_title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.work_place') }}
                        </th>
                        <td>
                            {{ $experience->work_place }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.description') }}
                        </th>
                        <td>
                            {{ $experience->description }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.sart_work') }}
                        </th>
                        <td>
                            {{ $experience->sart_work }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.end_work') }}
                        </th>
                        <td>
                            {{ $experience->end_work }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.experience.fields.doctor') }}
                        </th>
                        <td>
                            {{ $experience->doctor->years_experience ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.experiences.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection