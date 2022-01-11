@extends('layouts.frontend')

@section('content')
     
</div>
 <div class="courses-second-section section container single-course">
     <div class="row">
         <div class="col-lg-8">
             <div class="course-row">
             <div class="course-wrap">
                @php
                if($group->photo){
                    $group_image = $group->photo->getUrl('preview2');
                }else{
                     $group_image = asset('frontend/img/activ01.png');
                    $group_image = '';
                }
            @endphp 
                         <img class="course-img" src="{{$group_image}}">
                     </div>
                     <div class="course-info">
                         <p class="item-info"> {{$group->title}}</p>
                         <p class="course-tutor"> {{$group->user->name }}</p>
                         <p class="date">
                         <i class="far fa-calendar-alt"></i>
                         من  {{$group->start_date}}
                        </p>
                        <p class="date">
                        <i class="far fa-calendar-alt"></i>
                        إلى  {{$group->end_date}}
                        </p>
                     </div>
             </div>
         <p class="single-course-title">عن الدورة:</p>
         <p>
            {{$group->description}}
         </p>
         </div>
         <p class="single-course-title">عدد المشتركين: <span class="course-price">{{$group->students->count()}} </span></p>
         @auth 
         @if(auth()->user()->user_type == 'student')
         <a class="btn blue-btn shadow-none join-course-btn" href="{{ route('frontend.courses.join',$group->id) }}"> طلب انضمام </a>
         @endif
     @else 
         <a  class="btn blue-btn shadow-none join-course-btn" href="{{ route('frontend.signup') }}"> التسجيل </a>
     @endauth
         

         <div class="col-lg-4">
            
         </div>
     </div>    
     
 </div>    
 @endsection