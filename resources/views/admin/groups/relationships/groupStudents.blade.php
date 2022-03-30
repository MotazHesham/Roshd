
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>أضافة طالب</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route("admin.group-student.store") }}" enctype="multipart/form-data" id="add_group_student_form">
                    @csrf
                    <input type="hidden" name="group_id" value="{{ $group->id }}">
                    <div class="form-group ">
                        <label  for="required">{{ trans('cruds.group.fields.student') }}</label>
                        <select class="form-control select2 {{ $errors->has('student') ? 'is-invalid' : '' }}" name="student_id" id="student" required>
                            @foreach(\App\Models\Student::get() as $student)
                                <option value="{{ $student->id }}" {{ in_array($student->id, old('student', [])) ? 'selected' : '' }}>{{ $student->user->name ?? '' }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('student'))
                            <div class="invalid-feedback">
                                {{ $errors->first('student') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.group.fields.student_helper') }}</span>
                    </div>
                    @include('partials.payments.create', ['cost' => $group->course_cost,'form_name' => '#add_group_student_form'])
                </form>
            </div>
        </div>
    </div>


    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                {{ trans('global.list') }} {{ trans('cruds.student.title_singular') }}
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class=" table table-bordered table-striped table-hover ">
                        <thead>
                            <tr>
                                <th>
                                    {{ trans('cruds.student.fields.id') }}
                                </th>
                                <th>
                                    {{ trans('cruds.student.fields.user') }}
                                </th>
                                <th>
                                    {{ trans('cruds.student.fields.specialization') }}
                                </th>
                                <th>
                                    {{ trans('cruds.student.fields.group_status') }}
                                </th>
                                <th>
                                    &nbsp;
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $key => $raw)
                                <tr data-entry-id="{{ $raw->id }}">
                                    <td>
                                        {{ $raw->id ?? '' }}
                                    </td>
                                    <td>
                                        {{ $raw->student->user->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ $raw->student->specialization->name ?? '' }}
                                    </td>
                                    <td>
                                        {{ App\Models\GroupStudent::STATUS_SELECT[$raw->status] ?? '' }}
                                        <br>
                                        @if($raw->status == 'requested')
                                            <a href="{{ route('admin.group-student.change_status', ['raw_id' => $raw->id, 'status' => 'accepted']) }}" class="btn btn-success btn-xs">قبول</a>
                                            <a href="{{ route('admin.group-student.change_status', ['raw_id' => $raw->id, 'status' => 'refused']) }}" class="btn btn-danger btn-xs">رفض</a>
                                        @elseif($raw->status == 'accepted')
                                            <a href="{{ route('admin.group-student.change_status', ['raw_id' => $raw->id, 'status' => 'refused']) }}" class="btn btn-warning btn-xs">ألغاء القبول</a>
                                        @elseif($raw->status == 'refused')
                                            <a href="{{ route('admin.group-student.change_status', ['raw_id' => $raw->id, 'status' => 'accepted']) }}" class="btn btn-success btn-xs">قبول مرة أخري</a>
                                        @endif
                                    </td>
                                    <td>
                                        @can('payment_store')
                                            <button class="btn btn-success btn-xs" onclick="add_payments('GroupStudent','{{ $raw->id }}')">{{ trans('cruds.payment.new_payment') }}</button>
                                        @endcan
                                        <button class="btn btn-info btn-xs" onclick="show_payments('GroupStudent','{{ $raw->id }}')">{{ trans('cruds.payment.title_singular') }}</button>

                                        @can('student_delete')
                                            <form action="{{ route('admin.group-student.destroy', $raw->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                                <input type="hidden" name="_method" value="DELETE">
                                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                <input type="submit" class="btn btn-xs btn-danger" value="حذف الطالب">
                                            </form>
                                        @endcan
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
