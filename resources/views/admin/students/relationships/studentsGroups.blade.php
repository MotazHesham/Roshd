
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>أضافة لمجموعة</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route("admin.group-student.store") }}" enctype="multipart/form-data" id="add_group_student_form">
                    @csrf
                    @php
                        $now_date = date('Y-m-d',strtotime('now'));
                    @endphp
                    <input type="hidden" name="student_id" value="{{ $student->id }}">
                    <div class="form-group ">
                        <label  for="required">{{ trans('cruds.student.fields.group') }}</label>
                        <select class="form-control select2 {{ $errors->has('group') ? 'is-invalid' : '' }}" name="group_id" id="group" required>
                            @foreach(\App\Models\Group::where('end_date','>',$now_date)->get() as $group)
                                <option value="{{ $group->id }}" {{ in_array($group->id, old('group', [])) ? 'selected' : '' }}>{{ $group->title ?? '' }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('group'))
                            <div class="invalid-feedback">
                                {{ $errors->first('group') }}
                            </div>
                        @endif
                        <span class="help-block">{{ trans('cruds.student.fields.group_helper') }}</span>
                    </div>
                    @include('partials.payments.create', ['cost' => 0,'form_name' => '#add_group_student_form'])
                </form>
            </div>
        </div>
    </div>

<div class="col-md-8">
    <div class="card">
        <div class="card-header">
            {{ trans('cruds.group.title_singular') }} {{ trans('global.list') }}
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable ">
                    <thead>
                        <tr>
                            <th width="10">

                            </th>
                            <th>
                                {{ trans('cruds.group.fields.id') }}
                            </th>
                            <th>
                                {{ trans('cruds.group.fields.title') }}
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
                        @foreach ($groups as $key => $raw)
                            <tr data-entry-id="{{ $raw->id }}">
                                <td>

                                </td>
                                <td>
                                    {{ $raw->id ?? '' }}
                                </td>
                                <td>
                                    {{ $raw->group->title ?? '' }}
                                    <br>
                                    <span class="badge badge-light">{{ $raw->group->start_date }}</span>
                                    <span class="badge badge-dark">{{ $raw->group->end_date }}</span>
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

                                    @can('group_delete')
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
