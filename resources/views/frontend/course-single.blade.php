@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="page text-right m-b-50 market">
            <div class="row">
                @php
                    if($group->photo){
                        $group_image = $group->photo->getUrl('preview2');
                    }else{
                        // $group_image = asset('frontend/img/activ01.png');
                        $group_image = '';
                    }
                @endphp 
                <div class="col-md-3">
                    <div class="img-circle">
                        <img src="{{ $group_image }}" class="img-fluid" />
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="text">
                        <h2 class="h3">{{$group->title}}</h2>

                        <div class="details">
                            <li>
                                <i class="fas fa-calendar-minus"></i>بداية الدورة: {{$group->start_date}}
                            </li>
                            <li>
                                <i class="fas fa-calendar-minus"></i>نهاية الدورة: {{$group->end_date}}
                            </li> 
                            <li><i class="fas fa-users"></i> عدد المشاركين: {{$group->students->count()}}</li>
                        </div>
                        <div class="clear"></div>
                        <hr />
                        <br />
                        <p> 
                            <?php echo nl2br($group->description); ?>
                        </p>

                        <button class="btn-primary">
                            <a href="{{ route('frontend.signup') }}"> التسجيل </a>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
