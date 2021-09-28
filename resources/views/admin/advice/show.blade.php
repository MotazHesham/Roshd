@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.advice.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.advice.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.advice.fields.id') }}
                        </th>
                        <td>
                            {{ $advice->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advice.fields.name') }}
                        </th>
                        <td>
                            {{ $advice->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advice.fields.email') }}
                        </th>
                        <td>
                            {{ $advice->email }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advice.fields.advice_type') }}
                        </th>
                        <td>
                            {{ App\Models\Advice::ADVICE_TYPE_SELECT[$advice->advice_type] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.advice.fields.description') }}
                        </th>
                        <td>
                            {{ $advice->description }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.advice.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection