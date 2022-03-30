@extends('layouts.frontend')
@section('content')
    <div class="account-settings-section">
        <div class="container">
            <div class=" row">
                @include('frontend.partial.menue')
                <div class="col-lg-8 ">
                    <table id="booking-table">
                        <thead>

                            <tr>
                                <th scope="col"> {{ trans('cruds.group.fields.title') }}</th>
                                <th scope="col"> {{ trans('cruds.group.fields.start_date') }}</th>
                                <th scope="col"> {{ trans('cruds.group.fields.end_date') }}</th>
                                <th scope="col"> {{ trans('cruds.group.fields.course_hours') }}</th>
                                <th scope="col"> {{ trans('cruds.group.fields.course_cost') }}</th>
                                <th scope="col"> {{ trans('cruds.student.fields.group_status') }}</th>
                                <th scope="col"> {{ trans('cruds.group.fields.user') }}</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($groups as $key => $student_group)
                                <tr data-entry-id="{{ $student_group->id }}">
                                    <td data-label="اسم المستشار"> {{ $student_group->group->title ?? '' }} </td>
                                    <td data-label="اسم المستشار"> {{ $student_group->group->start_date ?? '' }} </td>
                                    <td class="booking-time" data-label="التاريخ">
                                        {{ $student_group->group->end_date ?? '' }}</td>
                                    <td class="booking-time" data-label="الساعة">
                                        {{ $student_group->group->course_hours ?? '' }}</td>
                                    <td class="" data-label="حالة الحجز">
                                        {{ $student_group->course_cost ?? '' }}</td>
                                    <td class="" data-label="سعر الحجز">
                                        {{ App\Models\GroupStudent::STATUS_SELECT[$student_group->status] ?? '' }}</td>
                                    <td class="" data-label="تعديل/حذف">
                                        {{ $student_group->group->user->name ?? '' }}
                                    </td>
                                    <td class="" data-label="تعديل/حذف">
                                        <button class="btn btn-success btn-sm text-white"
                                            onclick="payment_model('{{ $student_group->id }}','GroupStudent')">الدفع</button>
                                        @if ($student_group->frontend_delatable())
                                            <div class="delete-ediy-buttons">
                                                <form action="{{ route('frontend.groups.destroy', $student_group->id) }}"
                                                    method="POST"
                                                    onsubmit="return confirm('{{ trans('global.areYouSure') }}');"
                                                    style="display: inline-block;">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <button class="btn btn-icon btn-sm btn-danger" style="float: none;">
                                                        <span><strong>حذف</strong></span>
                                                    </button>
                                                </form>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">
                        {{ $groups->links() }}
                    </div>
                </div>

            </div>
        </div>


    </div>
@endsection
