@extends('layouts.frontend')

@section('content')

    <!-----------market------------------>
    <div class="market">
        <div class="container">
            <div class="section_title text-center">
                <h3>
                    <br />
                    الدورات التدريبية
                </h3>
            </div>

            <div class="row">
                @foreach($groups as $group)
                    @php
                        if($group->photo){
                            $group_image = $group->photo->getUrl('preview2');
                        }else{
                            // $group_image = asset('frontend/img/activ01.png');
                            $group_image = '';
                        }
                    @endphp 
                    <div class="col-md-4">
                        <div class="item">
                            <div class="pic">
                                <img src="{{ $group_image }}" class="img-fluid" />
                            </div>
                            <div class="title">
                                <h4>{{$group->title}}</h4>
                            </div>
                            <div class="clear"></div>
                            <div class="details">
                                <li><i class="fas fa-calendar-minus"></i> {{$group->start_date}} - {{$group->end_date}}</li> 
                            </div>
                            <div class="clear"></div>

                            <p>
                                <?php echo nl2br($group->description); ?>
                            </p>

                            <button class="btn-success">
                                <a href="{{ route('frontend.course',$group->id)}}"> المزيد </a>
                            </button>
                            <button class="btn-primary">
                                <a href="#"> التسجيل </a>
                            </button>
                        </div>
                    </div> 
                @endforeach
            </div> 
        </div>
    </div>
@endsection
