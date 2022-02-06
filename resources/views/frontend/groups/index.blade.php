@extends('layouts.frontend')
@section('content')
</div>

<div class="account-settings-section">
    <div class="container">
        <div class=" row">
   @include('frontend.partial.menue')     
<div class="col-lg-8 ">
    <table id="booking-table">
    <thead>

      <tr>
        <th scope="col">  {{ trans('cruds.group.fields.title') }}</th>
        <th scope="col">   {{ trans('cruds.group.fields.start_date') }}</th>
        <th scope="col"> {{ trans('cruds.group.fields.end_date') }}</th>
        <th scope="col">   {{ trans('cruds.group.fields.course_hours') }}</th>
        <th scope="col">     {{ trans('cruds.group.fields.course_cost') }}</th>
        <th scope="col">     {{ trans('cruds.student.fields.group_status') }}</th>
        <th scope="col">  {{ trans('cruds.group.fields.user') }}</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($groups as $key => $group)
    <tr data-entry-id="{{ $group->id }}">
        <td data-label="اسم المستشار">    {{ $group->title ?? '' }} </td>
        <td data-label="اسم المستشار">    {{ $group->start_date ?? '' }} </td>
        <td class="booking-time" data-label="التاريخ">  {{ $group->end_date ?? '' }}</td>
        <td class="booking-time" data-label="الساعة">
            {{ $group->course_hours ?? '' }}</td>
        <td class="" data-label="حالة الحجز">
            {{ $group->course_cost ?? '' }}</td>
          <td class="" data-label="سعر الحجز">
            {{ App\Models\Group::STATUS_SELECT[$group->pivot->status] ?? '' }}</td>
          <td class="" data-label="تعديل/حذف">    {{ $group->user->name ?? '' }}
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
@endsection