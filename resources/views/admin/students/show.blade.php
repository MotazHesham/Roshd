@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-body">
            <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="#students_info" role="tab" data-toggle="tab">
                        {{ trans('global.show') }} {{ trans('cruds.student.title') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="#students_groups" role="tab" data-toggle="tab">
                        {{ trans('cruds.group.title') }}
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" role="tabpanel" id="students_info">
                    @includeIf('admin.students.relationships.info', ['student' => $student])
                </div>
                <div class="tab-pane active" role="tabpanel" id="students_groups">
                    @includeIf('admin.students.relationships.studentsGroups', ['groups' => $groupStudents])
                </div>
            </div>

        </div>
    </div>
@endsection
@section('scripts')
    <script>

        $(document).ready(function(){
            @if(\Request::has('paymentable_id'))
                @if(\Request::has('payment_id'))
                    show_payments('GroupStudent','{{request("paymentable_id")}}' , '{{ request("payment_id") }}');
                @else
                    show_payments('GroupStudent','{{request("paymentable_id")}}');
                @endif
            @endif
        });
    </script>
@endsection
