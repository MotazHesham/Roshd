
@extends('layouts.frontend')

@section('content')
</div>

<div class="courses-second-section courses-second-section-new section container">
    <div class="row">
       <h2 class="section-title">خدماتنا</h2>
    <div class="container services-carousel-wrap">
    <div class="owl-one owl-carousel owl-theme owl-container">
        @foreach ($services as $service )
              @php
              if($service->photo){
                  $image=$service->photo->geturl();
              }
              else {
                 $image=asset('frontend/new/img/family-silhouette.png');
              }    

              @endphp
            <div class="item">
            <img class="service-img" src="{{ $image }}">
            <a class="service-name" href="{{ route('frontend.service',$service->id) }}">{{$service->name }}</a>
            </div>
                       
        @endforeach
        
    </div>
    </div>
    </div>    
    
</div>      

@endsection