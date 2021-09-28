@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.allowance.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.allowances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.allowance.fields.id') }}
                        </th>
                        <td>
                            {{ $allowance->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.allowance.fields.name') }}
                        </th>
                        <td>
                            {{ $allowance->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.allowance.fields.value') }}
                        </th>
                        <td>
                            {{ $allowance->value }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.allowances.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection