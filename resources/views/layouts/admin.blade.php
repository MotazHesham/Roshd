<!DOCTYPE html>
<html dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ trans('panel.site_title') }}</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@3.2/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @if(app()->getLocale() == 'ar')
      <style>
        .c-sidebar-nav .c-sidebar-nav-dropdown-items{
          padding-right: 8%;
        }
      </style>
    @else
      <style>
        .c-sidebar-nav .c-sidebar-nav-dropdown-items{
          padding-left: 8%;
        }
      </style>
    @endif
    <style>
        .pulse {
            animation: pulse-animation 2s infinite;
        }

        @keyframes pulse-animation {
            0% {
                box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.2);
            }
            100% {
                box-shadow: 0 0 0 20px rgba(0, 0, 0, 0);
            }
        }
    </style>
    @yield('styles')
</head>

<body class="c-app">
    @include('partials.menu')
    <div class="c-wrapper">
        <header class="c-header c-header-fixed px-3">
            <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <a class="c-header-brand d-lg-none" href="#">{{ trans('panel.site_title') }}</a>

            <button class="c-header-toggler mfs-3 d-md-down-none" type="button" responsive="true">
                <i class="fas fa-fw fa-bars"></i>
            </button>

            <ul class="c-header-nav @if(app()->getLocale() == 'ar') mr-auto @else ml-auto @endif">
              <li class="c-header-nav-item">
                  <a href="{{route('frontend.home')}}" class="c-header-nav-link">
                      {{trans('global.homepage')}} &nbsp;
                      <i class="fa fa-home"></i>
                  </a>
              </li>

                @if(count(config('panel.available_languages', [])) > 1)
                    <li class="c-header-nav-item dropdown d-md-down-none">
                        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            {{ strtoupper(app()->getLocale()) }}
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            @foreach(config('panel.available_languages') as $langLocale => $langName)
                                <a class="dropdown-item" href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }} ({{ $langName }})</a>
                            @endforeach
                        </div>
                    </li>
                @endif

                <ul class="c-header-nav ml-auto">
                    <li class="c-header-nav-item dropdown notifications-menu">
                        <a href="#" class="c-header-nav-link" data-toggle="dropdown">
                            <i class="far fa-bell"></i>
                            @php($alertsCount = \Auth::user()->userUserAlerts()->where('read', false)->count())
                            <?php
                                $types = [];
                                if(\Gate::allows('reservation_access')){
                                    $types[]= 'reservation';
                                }
                                if(\Gate::allows('patient_access')){
                                    $types[]= 'patient_package';
                                }
                                if(\Gate::allows('student_access')){
                                    $types[]= 'student_group';
                                }
                                if(\Gate::allows('payment_edit')){
                                    $types[]= 'payment';
                                }
                            ?>
                            @can('reservation_access')
                                @php($alertsCount += \App\Models\UserAlert::whereIn('type',$types)->where('seen', false)->count())
                            @endcan
                            @if($alertsCount > 0)
                                <span class="badge badge-warning navbar-badge">
                                    {{ $alertsCount }}
                                </span>
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="width:600px">
                            <div class="row">
                                @if(count($alerts = \Auth::user()->userUserAlerts()->withPivot('read')->limit(100)->orderBy('created_at', 'ASC')->get()->reverse()) > 0)
                                    <div class="col-md-6 " style="background: #efefef">
                                        <h5 class="text-center mt-3">الأشعارات</h5>
                                        <div class="partials-scrollable">
                                            @foreach($alerts as $alert)
                                                <div class="dropdown-item">
                                                    @php($link = $alert->alert_link ? $alert->alert_link : "#")
                                                    <a href="#" target="_blank" rel="noopener noreferrer" onclick="notification_read('{{$alert->id}}','personal','{{$link}}')" title="{{$alert->created_at}}">
                                                        <span @if($alert->pivot->read) style="color:black" @else  style="font-weight:bolder"  @endif >
                                                            {{ $alert->alert_text }}
                                                        </span>
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                @endif

                                @php($types = ['reservation','patient_package','student_group','payment'])

                                @if(count($alerts = \App\Models\UserAlert::whereIn('type',$types)->limit(100)->orderBy('created_at', 'ASC')->get()->reverse()) > 0)
                                    <div class="col-md-6 " >
                                        <h5 class="text-center mt-3">الطالبات</h5>
                                        <div class="partials-scrollable">
                                            @foreach($alerts as $alert)
                                                <?php
                                                    if($alert->type == 'reservation'){
                                                        $authorize = 'reservation_access';
                                                        $routing = '/admin/reservations/'.$alert->alert_link;
                                                    }elseif($alert->type == 'patient_package'){
                                                        $authorize = 'patient_access';
                                                        $routing = '/admin/patients/'.$alert->alert_link;
                                                    }elseif($alert->type == 'student_group'){
                                                        $authorize = 'student_access';
                                                        $routing = '/admin/students/'.$alert->alert_link;
                                                    }elseif($alert->type == 'payment'){
                                                        $authorize = 'payment_edit';
                                                        $routing = $alert->alert_link;
                                                    }else{
                                                        $authorize = '..';
                                                        $routing = '#';
                                                    }
                                                ?>
                                                @can($authorize)
                                                    <div class="dropdown-item">
                                                        @php($link = $alert->alert_link ? url($routing) : "#")
                                                        <a href="#"  rel="noopener noreferrer" onclick="notification_read('{{$alert->id}}','reservation','{{$link}}')" title="{{$alert->created_at}}">
                                                            <span @if($alert->seen) style="color:black" @else  style="font-weight:bolder"  @endif >
                                                                {{ $alert->alert_text }}
                                                            </span>
                                                        </a>
                                                    </div>
                                                @endcan
                                            @endforeach
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </li>
                </ul>

            </ul>
        </header>

        <div class="c-body">
            <main class="c-main">


                <div class="container-fluid">
                    @if(session('message'))
                        <div class="row mb-2">
                            <div class="col-lg-12">
                                <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                            </div>
                        </div>
                    @endif
                    @if($errors->count() > 0)
                        <div class="alert alert-danger">
                            <ul class="list-unstyled">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @yield('content')

                    <div  aria-live="polite" aria-atomic="true" style=" min-height: 200px;" >
                        <!-- Position it -->
                        <div class="partials-scrollable" style=" position: fixed; bottom: 25px; left: 15px; max-height: 240px;" id="incoming-notifications">
                            {{-- incoming notifications --}}
                        </div>
                    </div>

                </div>


            </main>
            <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="show_payments" tabindex="-1" role="dialog" aria-labelledby="show_payments" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="show_payments">عرض معلومات الدفع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="edit_payment" tabindex="-1" role="dialog" aria-labelledby="edit_payment" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_payment">تعديل معلومات الدفع</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="add_payment" tabindex="-1" role="dialog" aria-labelledby="add_payment" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="add_payment">دفع جديد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route("admin.payments.store") }}" enctype="multipart/form-data" id="new_payment_form">
                        @csrf
                        <input type="hidden" name="paymentable_id" id="model_id" value="">
                        <input type="hidden" name="paymentable_type" id="model" value="">
                        <input type="hidden" name="user_id" value="{{auth()->user()->id}}">

                        @include('partials.payments.create', ['cost' => 0,'form_name' => '#new_payment_form' ])
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">غلق</button>
                </div>
            </div>
        </div>
    </div>

    @include('sweetalert::alert')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@3.2/dist/js/coreui.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('3ee10a66a332e23173a4', {
            cluster: 'eu'
        });
    </script>

    <script>
        var channel = pusher.subscribe('notification-channel');

        channel.bind('App\\Events\\NotificationEvent',function(obj){
            @php($authorization = '..')
            if(obj['type'] == 'reservation'){
                var header = '<a href="/admin/reservations/'+obj['alert_link']+'" class="text-white">'+obj["data"]["user"]+' حجز جديد من </a>';
                var header_color = '#A569BD';
                var body =  '<div class="row">';
                    body +=   '<div class="col-md-4">';
                    body +=     '<span class="badge badge-info">العيادة</span>';
                    body +=     '<br>';
                    body +=     obj['data']['clinic'];
                    body +=   '</div>';
                    body +=   '<div class="col-md-4">';
                    body +=     '<span class="badge badge-success">الاستشاري</span>';
                    body +=     '<br>';
                    body +=     obj['data']['doctor'];
                    body +=   '</div>';
                    body +=   '<div class="col-md-4">';
                    body +=     '<span class="badge badge-warning">الموعد</span>';
                    body +=     '<br>';
                    body +=     '<span class="badge badge-dark">'+obj["data"]["reservation_date"]+'</span>';
                    body +=     '<span class="badge badge-light">'+obj["data"]["reservation_time"]+'</span>';
                    body +=   '</div>';
                    body += '</div>';
                @php($authorization = 'reservation_access')
            }else if(obj['type'] == 'patient_package'){
                var header = '<a href="/admin/patients/'+obj['alert_link']+'" class="text-white">'+obj["data"]["user"]+' باقة جديد من </a>';
                var header_color = '#5DADE2';
                @php($authorization = 'patient_access')
                var body = '<p>'+obj["data"]["package_name"]+' <span class="badge bg-warning text-white"> اسم الباقة </span></p> ';
            }else if(obj['type'] == 'student_group'){
                var header = '<a href="/admin/students/'+obj['alert_link']+'" class="text-white">'+obj["data"]["user"]+' طلب انضمام لدورة من </a>';
                var header_color = '#28B463';
                var body = '<p>'+obj["data"]["group_name"]+' <span class="badge bg-danger text-white"> اسم الدورة التدريبية </span></p> ';
                @php($authorization = 'student_access')
            }else if(obj['type'] == 'payment'){
                var header = '<a href="'+obj['alert_link']+'" class="text-white">'+obj["data"]["user"]+' تحويل جديد من </a>';
                var header_color = '#943126';
                @php($authorization = 'payment_edit')
                if(obj['data']['payment_type'] == 'package'){
                    var body = '<p>الدفع عن طريق باقة للحجز رقم <a href="/admin/reservations/'+obj["data"]["paymentable_id"]+'">'+obj["data"]["paymentable_id"]+'</a></p>';
                }else{
                    var body =  '<p>تحويل بنكي بمبلغ '+obj['data']['amount']+'</p>';
                        body +=  '<div class="row">';
                        body +=   '<div class="col-md-4">';
                        body +=     '<span class="badge badge-info">اسم المحول</span>';
                        body +=     '<br>';
                        body +=     obj['data']['transfer_name'];
                        body +=   '</div>';
                        body +=   '<div class="col-md-4">';
                        body +=     '<span class="badge badge-success">الرقم المرجعي</span>';
                        body +=     '<br>';
                        body +=     obj['data']['reference_number'];
                        body +=   '</div>';
                        body +=   '<div class="col-md-4">';
                        body +=     '<span class="badge badge-warning">أخر 4 أرقام من الحساب</span>';
                        body +=     '<br>';
                        body +=     obj["data"]["last_4_digits"];
                        body +=   '</div>';
                        body += '</div>';
                }
            }

            @can($authorization)
                var data = '<div id="toast-'+obj["id"]+'" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="100000" style="direction: ltr;">';
                    data +=  '<div class="toast-header" style="background: '+header_color+' ; color: white;">';
                    data +=     '<strong class="mr-auto">'+header+'</strong>';
                    data +=     '<button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">';
                    data +=       '<span aria-hidden="true" style="color:white">&times;</span>';
                    data +=     '</button>';
                    data +=  '</div>';
                    data +=  '<div class="toast-body">';
                    data +=    body;
                    data +=  '</div>';
                    data += '</div>';
                $('#incoming-notifications').append(data);
                $('#toast-'+obj['id']).toast('show');
            @endcan
        });
    </script>
    <script>


      function showFrontendAlert(type, title, message){
          swal({
            title: title,
            text: message,
            type: type,
            showConfirmButton: 'Okay',
            timer: 3000
        });
      }

      function deleteConfirmation(route, div = null, partials = false) {
          swal({
              title: "{{trans('global.flash.delete_')}}",
              text: "{{trans('global.flash.sure_')}}",
              type: "warning",
              showCancelButton: !0,
              confirmButtonText: "{{trans('global.flash.yes_')}}",
              cancelButtonText: "{{trans('global.flash.no_')}}",
              reverseButtons: !0
          }).then(function (e) {

              if (e.value === true) {

                  $.ajax({
                      type: 'DELETE',
                      url: route,
                      data: { _token: '{{ csrf_token() }}', partials: partials},
                      success: function (results) {
                        if(div != null){
                          showFrontendAlert('success', '{{trans('global.flash.deleted')}}', '');
                          $(div).html(null);
                          $(div).html(results);
                        }else{
                          location.reload();
                        }
                      }
                  });

              } else {
                  e.dismiss;
              }

          }, function (dismiss) {
              return false;
          })
      }

        $(function() {
        let copyButtonTrans = '{{ trans('global.datatables.copy') }}'
        let csvButtonTrans = '{{ trans('global.datatables.csv') }}'
        let excelButtonTrans = '{{ trans('global.datatables.excel') }}'
        let pdfButtonTrans = '{{ trans('global.datatables.pdf') }}'
        let printButtonTrans = '{{ trans('global.datatables.print') }}'
        let colvisButtonTrans = '{{ trans('global.datatables.colvis') }}'
        let selectAllButtonTrans = '{{ trans('global.select_all') }}'
        let selectNoneButtonTrans = '{{ trans('global.deselect_all') }}'

        let languages = {
            'ar': 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json'
        };

        $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, { className: 'btn' })
        $.extend(true, $.fn.dataTable.defaults, {
            language: {
            url: languages['{{ app()->getLocale() }}']
            },
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }, {
                orderable: false,
                searchable: false,
                targets: -1
            }],
            select: {
            style:    'multi+shift',
            selector: 'td:first-child'
            },
            order: [],
            scrollX: true,
            pageLength: 100,
            dom: 'lBfrtip<"actions">',
            buttons: [
            {
                extend: 'selectAll',
                className: 'btn-primary',
                text: selectAllButtonTrans,
                exportOptions: {
                columns: ':visible'
                },
                action: function(e, dt) {
                e.preventDefault()
                dt.rows().deselect();
                dt.rows({ search: 'applied' }).select();
                }
            },
            {
                extend: 'selectNone',
                className: 'btn-primary',
                text: selectNoneButtonTrans,
                exportOptions: {
                columns: ':visible'
                }
            },
            {
                extend: 'copy',
                className: 'btn-default',
                text: copyButtonTrans,
                exportOptions: {
                columns: ':visible'
                }
            },
            {
                extend: 'csv',
                className: 'btn-default',
                text: csvButtonTrans,
                exportOptions: {
                columns: ':visible'
                }
            },
            {
                extend: 'excel',
                className: 'btn-default',
                text: excelButtonTrans,
                exportOptions: {
                columns: ':visible'
                }
            },
            {
                extend: 'pdf',
                className: 'btn-default',
                text: pdfButtonTrans,
                exportOptions: {
                columns: ':visible'
                }
            },
            {
                extend: 'print',
                className: 'btn-default',
                text: printButtonTrans,
                exportOptions: {
                columns: ':visible'
                }
            },
            {
                extend: 'colvis',
                className: 'btn-default',
                text: colvisButtonTrans,
                exportOptions: {
                columns: ':visible'
                }
            }
            ]
        });

        $.fn.dataTable.ext.classes.sPageButton = '';
        });

    </script>
    <script>
        $(document).ready(function () {
            $(".notifications-menu").on('click', function () {
                if (!$(this).hasClass('open')) {
                    $('.notifications-menu .label-warning').hide();
                }
            });
        });

        function notification_read(id,type,link){
            $.post('{{ route('admin.alert.read') }}', {_token:'{{ csrf_token() }}', id:id, type:type}, function(data){
                window.location = link;
            });
        }
    </script>

    <script>
        function change_payment_type(form_name,type){
            if(type == 'cash'){
                $(form_name + ' .payment_type_cash_icon').css('color', 'violet');

                $(form_name + ' .payment_type_bank_icon').css('color', '#3c4b64');
                $(form_name + ' .payment_type_package_icon').css('color', '#3c4b64');

                $(form_name + ' .bank-info').css('display', 'none');
                $(form_name + ' .cash-info').css('display', 'block');
                $(form_name + ' .package-info').css('display', 'none');

                $(form_name + ' .payment_type_cash').prop('checked', true);
            }else if(type == 'bank'){
                $(form_name + ' .payment_type_bank_icon').css('color', 'violet');

                $(form_name + ' .payment_type_cash_icon').css('color', '#3c4b64');
                $(form_name + ' .payment_type_package_icon').css('color', '#3c4b64');

                $(form_name + ' .bank-info').css('display', 'block');
                $(form_name + ' .cash-info').css('display', 'block');
                $(form_name + ' .package-info').css('display', 'none');

                $(form_name + ' .payment_type_bank').prop('checked', true);
            }else if(type == 'package'){
                $(form_name + ' .payment_type_package_icon').css('color', 'violet');

                $(form_name + ' .payment_type_cash_icon').css('color', '#3c4b64');
                $(form_name + ' .payment_type_bank_icon').css('color', '#3c4b64');

                $(form_name + ' .package-info').css('display', 'block');
                $(form_name + ' .bank-info').css('display', 'none');
                $(form_name + ' .cash-info').css('display', 'none');

                $(form_name + ' .payment_type_package').prop('checked', true);
            }
        }

        function edit_payment(payment_id){
            $.post('{{ route('admin.payments.edit_partials') }}',{_token:'{{ csrf_token()}}',id: payment_id},function(data){
                $('#edit_payment').modal('show');
                $('#edit_payment .modal-body').html(null);
                $('#edit_payment .modal-body').html(data);
            })
        }

        function show_payments(model,model_id,payment_id = null){
            $.post('{{ route('admin.payments.show_payments') }}',{_token:'{{ csrf_token()}}',model: model,model_id:model_id,payment_id:payment_id},function(data){
                $('#show_payments').modal('show');
                $('#show_payments .modal-body').html(null);
                $('#show_payments .modal-body').html(data);
            })
        }

        function add_payments(model,model_id){
            $('#add_payment').modal('show');
            $('#new_payment_form #model').val(model);
            $('#new_payment_form #model_id').val(model_id);
        }
    </script>
    @yield('scripts')
</body>

</html>
