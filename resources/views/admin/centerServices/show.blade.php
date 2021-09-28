@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.centerService.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.center-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.centerService.fields.id') }}
                        </th>
                        <td>
                            {{ $centerService->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centerService.fields.name') }}
                        </th>
                        <td>
                            {{ $centerService->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.centerService.fields.price') }}
                        </th>
                        <td>
                            {{ $centerService->price }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.center-services.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection