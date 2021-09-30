@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.salaryContract.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salary-contracts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.id') }}
                        </th>
                        <td>
                            {{ $salaryContract->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.contract_number') }}
                        </th>
                        <td>
                            {{ $salaryContract->contract_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.date') }}
                        </th>
                        <td>
                            {{ $salaryContract->date }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.duration') }}
                        </th>
                        <td>
                            {{ $salaryContract->duration }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.workday') }}
                        </th>
                        <td>
                            {{ App\Models\SalaryContract::WORKDAY_SELECT[$salaryContract->workday] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.work_hours') }}
                        </th>
                        <td>
                            {{ $salaryContract->work_hours }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.mechanism') }}
                        </th>
                        <td>
                            {{ App\Models\SalaryContract::MECHANISM_RADIO[$salaryContract->mechanism] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.salary') }}
                        </th>
                        <td>
                            {{ $salaryContract->salary }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.doctor') }}
                        </th>
                        <td>
                            {{ $salaryContract->doctor->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.salaryContract.fields.allowance') }}
                        </th>
                        <td>
                            @foreach($salaryContract->allowances as $key => $allowance)
                                <span class="label label-info">{{ $allowance->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.salary-contracts.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection
