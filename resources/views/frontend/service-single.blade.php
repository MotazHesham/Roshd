@extends('layouts.frontend')

@section('content')
</div>

<div class="courses-second-section courses-second-section-new section container">
    <div class="row">
      <div class="col-lg-4 course-photo-wrap">
        @php
        if($service->media){
            $image=$service->photo->geturl();
        }
        else {
           $image=asset('frontend/new/img/family-silhouette.png');
        }    

        @endphp
         <img class="service-img" src="{{  $image}}">
          <h4 class="service-name-new">{{$service->name  }}</h4>
        </div>
        <div class="col-lg-8 new-course-info">
        <p> 
            {{$service->description }}
        </p>
        </div>
    </div>    
    
</div>    
    @endsection
     