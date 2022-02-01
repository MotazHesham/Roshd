@extends('layouts.frontend')
@section('styles')
    <style>
        .start-time {
            width: calc(40% - 6px);
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
        
        .btn.blue-btn {
        font-size: 20px;
        color: #fff;
        background-color: #19B6B1;
        border-radius: 0;
        margin-top: 60px;
        padding: 10px 20px;
        max-width: 300px;
    }
    .btn.blue-btn:hover {
        background-color: #d2ad4f;
        color: #fff;
    }
        </style>
    <link href='{{ asset('fullcalendar-5.9.0/lib/main.css') }}' rel='stylesheet' />
@endsection
@section('content')
</div>
<div class="container book-date-wrap">
 <div class="row">
    @if($errors->count() > 0)
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
     <div class="col-lg-6 book-date-right">
         <p class="book-date-title">اختر اسم الاستشاري</p>
         @includeIf('frontend.reservations.partials.choose_doctor', ['doctors' => $doctors])
         <div class="col-md-6" id="times">
            <div class="hour-options">
            {{-- times --}}
        </div>
        </div>
     </div>
     <div class="col-lg-6 book-date-left">
         <div class="col-md-8">
            <label class="required">أختر موعد الاستشارة</label>
            <div id='calendar'></div>
        </div>
     
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
                        $.post('{{ route('frontend.reservations.ranges') }}', {
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
        <script>
        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
          selElmnt = x[i].getElementsByTagName("select")[0];
          ll = selElmnt.length;
          /*for each element, create a new DIV that will act as the selected item:*/
          a = document.createElement("DIV");
          a.setAttribute("class", "select-selected");
          a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
          x[i].appendChild(a);
          /*for each element, create a new DIV that will contain the option list:*/
          b = document.createElement("DIV");
          b.setAttribute("class", "select-items select-hide");
          for (j = 1; j < ll; j++) {
            /*for each option in the original select element,
            create a new DIV that will act as an option item:*/
            c = document.createElement("DIV");
            c.innerHTML = selElmnt.options[j].innerHTML;
            c.addEventListener("click", function(e) {
                /*when an item is clicked, update the original select box,
                and the selected item:*/
                var y, i, k, s, h, sl, yl;
                s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                sl = s.length;
                h = this.parentNode.previousSibling;
                for (i = 0; i < sl; i++) {
                  if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y = this.parentNode.getElementsByClassName("same-as-selected");
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                      y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                  }
                }
                h.click();
            });
            b.appendChild(c);
          }
          x[i].appendChild(b);
          a.addEventListener("click", function(e) {
              /*when the select box is clicked, close any other select boxes,
              and open/close the current select box:*/
              e.stopPropagation();
              closeAllSelect(this);
              this.nextSibling.classList.toggle("select-hide");
              this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
          /*a function that will close all select boxes in the document,
          except the current select box:*/
          var x, y, i, xl, yl, arrNo = [];
          x = document.getElementsByClassName("select-items");
          y = document.getElementsByClassName("select-selected");
          xl = x.length;
          yl = y.length;
          for (i = 0; i < yl; i++) {
            if (elmnt == y[i]) {
              arrNo.push(i)
            } else {
              y[i].classList.remove("select-arrow-active");
            }
          }
          for (i = 0; i < xl; i++) {
            if (arrNo.indexOf(i)) {
              x[i].classList.add("select-hide");
            }
          }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);
        </script>
@stop
