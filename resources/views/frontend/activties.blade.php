@extends('layouts.frontend')

@section('content')

    <div class="page">
        <div class="home_activties" style="background: #fff">
            <div class="section_title text-center" class="padding-top-0">
                <h3>نشاطــــات رشــــد</h3>
                <img src="{{ asset('frontend/img/title_bg_bej.png')}}" />
            </div>

            <div class="container">
                <div class="row">
                    
                    @foreach($activites as $activity)
                        @php
                            if($activity->photo){
                                $image = $activity->photo->getUrl('preview2');
                            }else{
                                $image = asset('frontend/img/activ01.png');
                            }
                        @endphp
                        <div class="col-md-4">
                            <div class="home_activty">
                                <div class="pic"><img src="{{ $image }}"></div>
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
                <div>
                    {{ $activites->links() }}
                </div>
            </div>
        </div>
    </div>
    <!--------------------->
@endsection
