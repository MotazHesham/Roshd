@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.doctor.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.doctors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.id') }}
                        </th>
                        <td>
                            {{ $doctor->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.years_experience') }}
                        </th>
                        <td>
                            {{ $doctor->years_experience }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.user') }}
                        </th>
                        <td>
                            {{ $doctor->user->email ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.specialization') }}
                        </th>
                        <td>
                            {{ $doctor->specialization->name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.clinic') }}
                        </th>
                        <td>
                            {{ $doctor->clinic->clinic_name ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.work_days') }}
                        </th>
                        <td>
                            {{ App\Models\Doctor::WORK_DAYS_SELECT[$doctor->work_days] ?? '' }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.start_time') }}
                        </th>
                        <td>
                            {{ $doctor->start_time }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.doctor.fields.end_time') }}
                        </th>
                        <td>
                            {{ $doctor->end_time }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.doctors.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#doctor_salary_contracts" role="tab" data-toggle="tab">
                {{ trans('cruds.salaryContract.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#doctor_precentage_contracts" role="tab" data-toggle="tab">
                {{ trans('cruds.precentageContract.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#doctor_experiences" role="tab" data-toggle="tab">
                {{ trans('cruds.experience.title') }}
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#doctor_education" role="tab" data-toggle="tab">
                {{ trans('cruds.education.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="doctor_salary_contracts">
            @includeIf('admin.doctors.relationships.doctorSalaryContracts', ['salaryContracts' => $doctor->doctorSalaryContracts])
        </div>
        <div class="tab-pane" role="tabpanel" id="doctor_precentage_contracts">
            @includeIf('admin.doctors.relationships.doctorPrecentageContracts', ['precentageContracts' => $doctor->doctorPrecentageContracts])
        </div>
        <div class="tab-pane" role="tabpanel" id="doctor_experiences">
            @includeIf('admin.doctors.relationships.doctorExperiences', ['experiences' => $doctor->doctorExperiences])
        </div>
        <div class="tab-pane" role="tabpanel" id="doctor_education">
            @includeIf('admin.doctors.relationships.doctorEducation', ['education' => $doctor->doctorEducation])
        </div>
    </div>
</div>

@endsection