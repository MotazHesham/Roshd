@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.precentageContract.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.precentage-contracts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.precentageContract.fields.id') }}
                        </th>
                        <td>
                            {{ $precentageContract->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.precentageContract.fields.percentage') }}
                        </th>
                        <td>
                            {{ $precentageContract->percentage }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.precentageContract.fields.doctor') }}
                        </th>
                        <td>
                            {{ $precentageContract->doctor->years_experience ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.precentage-contracts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection