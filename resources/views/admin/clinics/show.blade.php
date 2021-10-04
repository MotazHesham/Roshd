@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.clinic.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinics.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.id') }}
                        </th>
                        <td>
                            {{ $clinic->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.clinic_number') }}
                        </th>
                        <td>
                            {{ $clinic->clinic_number }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.clinic_name') }}
                        </th>
                        <td>
                            {{ $clinic->clinic_name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.clinic.fields.specialization') }}
                        </th>
                        <td>
                            @foreach($clinic->specializations as $key => $specialization)
                                <span class="label label-info">{{ $specialization->name }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.clinics.index') }}">
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
            <a class="nav-link" href="#clinic_doctors" role="tab" data-toggle="tab">
                {{ trans('cruds.doctor.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="clinic_doctors">
            @includeIf('admin.clinics.relationships.clinicDoctors', ['doctors' => $clinic->clinicDoctors])
        </div>
    </div>
</div>

@endsection