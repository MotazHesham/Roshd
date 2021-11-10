@extends('layouts.patient')
@section('styles')
    <style>
        .start-time {
            width: calc(20% - 6px);
            padding: 7px 10px;
            border: 1px solid #ddd;
            display: inline-block;
            margin: 3px;
            text-align: center;
            cursor: pointer;
        }

        .start-time:hover {
            background: #ddd;
        }

        .active-time {
            background: #0193d6;
            color: #fff;
            font-weight: bold;
        } 

    </style>
    <link href='{{ asset('fullcalendar-5.9.0/lib/main.css') }}' rel='stylesheet' />
@endsection
@section('content')

    <div class="card">
        <div class="card-header">
            {{ trans('global.create') }} {{ trans('cruds.reservation.title_singular') }}
        </div>

        <div class="card-body">
            @includeIf('patient.reservations.partials.choose_doctor', ['doctors' => $doctors])

            <div class="row">
                <div class="col-md-6">
                    <label class="required">أختر المعاد</label>
                    <div id='calendar'></div>
                </div>
                <div class="col-md-6" id="times">
                    {{-- times --}}
                </div>
            </div>

        </div>
    </div>



@endsection
@section('scripts')
    @parent
    <script src='{{ asset('fullcalendar-5.9.0/lib/main.js') }}'></script>
    <script>
        $(document).on('submit', '#add_patient', function(event) {
            event.preventDefault(); //prevent default action 
            var post_url = $(this).attr("action"); //get form action url
            var request_method = $(this).attr("method"); //get form GET/POST method
            var form_data = $(this).serialize(); //Encode form elements for submission
            $('#jquery-error-patient').html(null);
            $('#jquery-error-patient').css('display', 'none');
            $.ajax({
                url: post_url,
                method: request_method,
                data: form_data,
                success: function(data) {
                    showFrontendAlert('success', '{{ trans('global.flash.created') }}', '');
                    $('#user_id').html(data);
                },
                error: function(data) {
                    if (data.status === 422) {
                        $('#jquery-error-patient').css('display', 'block');
                        let response = $.parseJSON(data.responseText);
                        $.each(response.errors, function(key, value) {
                            $('#jquery-error-patient').append("<p> " + value + " </p>");
                        });
                    }
                }
            })
        })
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                views: {
                    listWeek: {
                        buttonText: 'List a week'
                    },
                },
                selectable: true,
                dateClick: function(info) {
                    $('#choosen_time').val(null);
                    doctor_id = $('#doctor_id').val();
                    if (doctor_id) {
                        $('#choosen_date').val(info.dateStr);
                        $.post('{{ route('patient.reservations.ranges') }}', {
                            _token: '{{ csrf_token() }}',
                            date: info.dateStr,
                            doctor_id: doctor_id
                        }, function(data) {
                            $('#times').html(null);
                            $('#times').html(data);
                        });
                    } else {
                        $('#times').html(null);
                        alert('من فضلك أختر استشاري أولا');
                    }
                    // alert('Clicked on: ' + info.dateStr);
                    // alert('Coordinates: ' + info.jsEvent.pageX + ',' + info.jsEvent.pageY);
                    // alert('Current view: ' + info.view.type);
                    // change the day's background color just for fun
                    // info.dayEl.style.backgroundColor = 'red';
                }
            });
            calendar.render();
        });

        function start_time(li) {
            let time = $(li).attr('data-time');
            $('ul li').removeClass('active-time');
            $(li).toggleClass('active-time');
            $('#choosen_time').val(time);
        }
    </script>
@stop
