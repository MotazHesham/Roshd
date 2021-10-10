@extends('layouts.frontend')

@section('content')
    <!--------------------------------services--------------------------->
    
    <div class="home_services">

        <div class="section_title text-center">
            <h3> خـــدمــــات رشــــد </h3>
            <img src="{{ asset('frontend/img/title_bg_bej.png') }}">
        </div>


        <div class="container">
            <div class="row">

                <div class="col-md-2"><a href="{{ route('frontend.service','familly_advice')}}">
                        <div class="home-s home_service"><img src="{{ asset('frontend/img/icon01.png') }}"></div>
                        <h4>الاستشارات الاسرية </h4>
                    </a>
                </div>

                <div class="col-md-2"><a href="{{ route('frontend.service','individual_advice')}}">
                        <div class="home-s home_service"><img src="{{ asset('frontend/img/icon02.png') }}"></div>
                        <h4>الاستشارات الفردية </h4>
                    </a>
                </div>

                <div class="col-md-2"><a href="{{ route('frontend.service','el_gadaly_elsloky')}}">
                        <div class="home-s home_service"><img src="{{ asset('frontend/img/icon03.png') }}"></div>
                        <h4>علاج الجدلي السلوكي </h4>
                    </a>
                </div>

                <div class="col-md-2"><a href="{{ route('frontend.service','el_maarefe_elsloky')}}">
                        <div class="home-s home_service"><img src="{{ asset('frontend/img/icon04.png') }}"></div>
                        <h4>علاج المعرفي السلوكي </h4>
                    </a>
                </div>

                <div class="col-md-2"><a href="{{ route('frontend.service','art_therapy')}}">
                        <div class="home-s home_service"><img src="{{ asset('frontend/img/icon05.png') }}"></div>
                        <h4>العلاج بالفن </h4>
                    </a>
                </div>


                <div class="col-md-2"><a href="{{ route('frontend.service','play_therapy')}}">
                        <div class="home-s home_service"><img src="{{ asset('frontend/img/icon06.png') }}"></div>
                        <h4>العلاج باللعب </h4>
                    </a>
                </div>

            </div>


        </div>
    </div>
    <!--------------------------------services----------------------------->
    <!--  .overview -->
    <!----------------------slider-------------->

    <div class="overview">
        <div class="container">
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-10">
                    <div class="pic"><img src="{{ asset('frontend/img/home_about_bg.png') }}"></div>
                    <div class="section_title text-center">
                        <h3> مرحبا بكم </h3>
                        <img src="{{ asset('frontend/img/title_bg_bej.png') }}">
                    </div>


                    <div class="text">

                        <p>
                            <?php echo nl2br($setting->about_rosd); ?>
                        </p>

                        <div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
            </div>

        </div>
    </div>

    <!------------------------>





    <!----------our activites---------->
    <div class="home_activties">

        <div class="section_title text-center">
            <h3> نشاطــــات رشــــد </h3>
            <img src="{{ asset('frontend/img/title_bg_bej.png') }}">
        </div>


        <div class="container">

            <div class="row">

                @foreach($activites as $activity)
                    @php
                        if($activity->photo){
                            $activity_image = $activity->photo->getUrl('preview2');
                        }else{
                            // $activity_image = asset('frontend/img/activ01.png');
                            $activity_image = '';
                        }
                    @endphp
                    <div class="col-md-4">
                        <div class="home_activty">
                            <div class="pic"><img src="{{ $activity_image }}"></div>
                            <div class="title">{{ $activity->title}}</div>
                            <p> 
                                <?php echo nl2br($activity->description); ?>
                            </p>
                            <div class="more"> <a href="{{ route('frontend.activity',$activity->id) }}"> <button class="btn-primary"><i
                                            class="fas fa-plus" aria-hidden="true"></i>المزيد</button></a></div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </div>
    <!----ourteam----------->
    <div class="ourteam">
        <div class="container">


            <div class="section_title text-center">
                <h3> مستشارين رشد </h3>
                <img src="{{ asset('frontend/img/title_bg_white.png') }}">
            </div>


            <ul id="flexiselDemo3">

                @foreach($doctors as $doctor)
                @php
                    if($doctor->user && $doctor->user->photo){
                        $doctor_image = $doctor->user->photo->getUrl('preview2');
                    }else{
                        // $doctor_image = asset('frontend/img/activ01.png');
                        $doctor_image = '';
                    }
                @endphp
                    <li><a href="{{ route('frontend.doctor',$doctor->id) }}">
                            <div class="team_"><img src="{{ $doctor_image }}" />
                                <h4>{{$doctor->user->name ?? ''}}</h4>
                                <div class="jobtitle">{{ $doctor->specialization->name ?? ''}}</div> 
                            </div>
                        </a>
                    </li>
                @endforeach 
            </ul>

        </div>
        <div class="clear"> </div>

    </div>
    <div class="clear"> </div>

    <!--------------------->
@endsection