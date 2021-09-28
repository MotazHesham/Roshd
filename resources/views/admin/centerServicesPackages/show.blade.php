@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.centerServicesPackage.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.center-services-packages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.id') }}
                        </th>
                        <td>
                            {{ $centerServicesPackage->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.name') }}
                        </th>
                        <td>
                            {{ $centerServicesPackage->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.package_content') }}
                        </th>
                        <td>
                            {{ $centerServicesPackage->package_content }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.start_date') }}
                        </th>
                        <td>
                            {{ $centerServicesPackage->start_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.end_date') }}
                        </th>
                        <td>
                            {{ $centerServicesPackage->end_date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centerServicesPackage.fields.package_value') }}
                        </th>
                        <td>
                            {{ $centerServicesPackage->package_value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.center-services-packages.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection