@extends('layouts.frontend')

@section('content')

    <div class="container m-b-20">
        <div class="page home__services">


            <div class="container">

                <div class="section_title text-center">
                    <h3>

                        خــدمات رشــــد</h3>

                </div>
                <div class="row text-center">
                    <div class="col-md-4">
                        <a href="{{ route('frontend.service','familly_advice') }}">
                            <div class="home-s home_service "><img src="{{ asset('frontend/img/icon01.png')}}"></div>
                            <h4>الاستشارات الاسرية </h4>
                        </a>

                    </div>


                    <div class="col-md-4">
                        <a href="{{ route('frontend.service','individual_advice') }}">
                            <div class="home-s home_service"><img src="{{ asset('frontend/img/icon02.png')}}"></div>
                            <h4>الاستشارات الفردية </h4>
                        </a>

                    </div>


                    <div class="col-md-4">
                        <a href="{{ route('frontend.service','el_gadaly_elsloky') }}">
                            <div class="home-s home_service"><img src="{{ asset('frontend/img/icon03.png')}}"></div>
                            <h4>علاج الجدلي السلوكي </h4>
                        </a>

                    </div>
                </div>




                <div class="row text-center">
                    <div class="col-md-4">
                        <a href="{{ route('frontend.service','el_maarefe_elsloky') }}">
                            <div class="home-s home_service"><img src="{{ asset('frontend/img/icon04.png')}}"></div>
                            <h4>علاج المعرفي السلوكي </h4>
                        </a>

                    </div>


                    <div class="col-md-4">
                        <a href="{{ route('frontend.service','art_therapy') }}">
                            <div class="home-s home_service"><img src="{{ asset('frontend/img/icon05.png')}}"></div>
                            <h4>العلاج بالفن </h4>
                        </a>

                    </div>


                    <div class="col-md-4">
                        <a href="{{ route('frontend.service','play_therapy') }}">
                            <div class="home-s home_service"><img src="{{ asset('frontend/img/icon06.png')}}"></div>
                            <h4>العلاج باللعب </h4>
                        </a>

                    </div>
                </div> 
            </div>
        </div>





    </div> 

@endsection 
