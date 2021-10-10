@extends('layouts.frontend')

@section('content')

    <!----ourteam----------->

    <div class="page">
        <div class="ourteam">
            <div class="container">
                <div class="section_title text-center">
                    <h3>مستشارين رشد</h3>
                    <img src="{{ asset('frontend/img/title_bg_white.png') }}" />
                </div>

                <div class="row">
                    
                    @foreach($doctors as $doctor)
                        @php
                            if($doctor->user && $doctor->user->photo){
                                $doctor_image = $doctor->user->photo->getUrl('preview2');
                            }else{
                                // $doctor_image = asset('frontend/img/activ01.png');
                                $doctor_image = '';
                            }
                        @endphp 
                        <div class="col-md-3">
                            <div class="team_">
                                <img src="{{ $doctor_image }}" class="img-fluid" />
                                <h4>{{$doctor->user->name ?? ''}}</h4>
                                <div class="jobtitle">{{ $doctor->specialization->name ?? ''}}</div> 
                                <br />
                                <a href="{{ route('frontend.doctor',$doctor->id) }}" class="btn-primary">المزيد <i class="fas fa-plus"
                                        aria-hidden="true"></i></a>
                            </div>
                        </div>
                    @endforeach  
                </div>
                <div>
                    {{ $doctors->links() }}
                </div>
            </div>
        </div>
    </div>
    <!--------------------->
@endsection
