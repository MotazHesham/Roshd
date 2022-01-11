@extends('layouts.frontend')

@section('content')
    <!--------------------------------services--------------------------->
    <div class="hero-section-inner container row">
        <div class="col-lg-5">
            <p class="white">
                <?php echo nl2br($setting->about_rosd); ?>
            </p>

            @auth 
            @if(auth()->user()->user_type == 'patient')
          <a class="btn book-date shadow-none"  href="{{ route('patient.reservations.create') }}">حجز موعد</a>
          @endif
        
          @else 
          <a data-popup-open="popup-1" class="btn book-date shadow-none"  href="#"  aria-hidden="true">حجز موعد</a>
          @endauth
        </div>
        <div class="col-lg-7"></div>
        
    </div>
    </div>
        
    <div class="second-section section">
        <h2 class="section-title">خدماتنا</h2>
        <div class="container services-carousel-wrap">
        <div class="owl-one owl-carousel owl-theme owl-container">
                <div class="item">
                <img class="service-img" src="{{asset('frontend/new/img/family-silhouette.png')}}">
                <a class="service-name" href="#">الاستشارات الأسرية</a>
                </div>
            
                <div class="item">
                <img class="service-img" src="{{asset('frontend/new/img/standing-up-man-.png')}}">
                <a class="service-name" href="#">الاستشارات الفردية</a>
                </div>
            
                <div class="item">
                <img class="service-img"  src="{{asset('frontend/new/img/argue.png')}}">
                <a class="service-name" href="#">علاج الجدلي السلوكي</a>
                </div>
            
                <div class="item">
                <img class="service-img" src="{{asset('frontend/new/img/quarrel.png')}}">
                <a class="service-name" href="#">العلاج المعرفي السلوكي</a>
                </div>
                <div class="item">
                <img class="service-img" src="{{asset('frontend/new/img/family-silhouette.png')}}">
                <a class="service-name" href="#">الاستشارات الأسرية</a>
                </div>
            
                <div class="item">
                <img class="service-img" src="{{asset('frontend/new/img/standing-up-man-.png')}}">
                <a class="service-name" href="#">الاستشارات الفردية</a>
                </div>
            
                <div class="item">
                <img class="service-img"  src="{{asset('frontend/new/img/argue.png')}}">
                <a class="service-name" href="#">علاج الجدلي السلوكي</a>
                </div>
            
                <div class="item">
                <img class="service-img" src="{{asset('frontend/new/img/quarrel.png')}}">
                <a class="service-name" href="#">العلاج المعرفي السلوكي</a>
                </div>
        </div>
        </div>
    </div>
        <!------------------------------------------------------------------------->
        <div class="third-section section">
            <h2 class="section-title">مستشارين رشد</h2>  
            <div class="container consultant-carousel-wrap">
            <div class="owl-two owl-carousel owl-theme owl-container">
                @foreach($doctors as $doctor)
                @php
                    if($doctor->user && $doctor->user->photo){
                        $doctor_image = $doctor->user->photo->getUrl('preview2');
                    }else{
                         $doctor_image = asset('frontend/new/img/conversation.png');
                    }
                @endphp
                    <div class="item">
                    <div class="item-inner">
                    <div class="consultant-wrap">
                        <img class="consultant-img" src="{{$doctor_image  }}">
                    </div>
                    <div class="consultant-info">
                        <p class="item-info">{{$doctor->user->name ?? ''}} </p>
                        <p class="consultant-job">{{ $doctor->specialization->name ?? ''}}</p>
                    </div>
                    </div>
                    </div>
                    @endforeach
                      </div>
        
        </div>
        
    </div>
   <!----------------------------------------------------------->
   <div class="forth-section section">
    <h2 class="section-title">الدورات التدريبية</h2>  
    <div id="category-tabs" class="tabs-container">
        <div class="tab">
          <button  onclick="openTab(event, 'first-tab')" id="defaultOpen"></button>
        </div>

        <div id="first-tab" class="tabcontent">
            <div class="owl-three owl-carousel owl-theme owl-container">
                @foreach($groups as $group)
                @php
                    if($group->photo){
                        $group_image = $group->photo->getUrl('preview2');
                    }else{
                        // $group_image = asset('frontend/img/activ01.png');
                        $group_image = '';
                    }
                @endphp 
                    <div class="item">
                    <div class="item-inner">
                    <div class="course-wrap">
                        <img class="course-img" src="{{ $group_image  }}">
                    </div>
                    <div class="course-info">
                        <p class="item-info">{{ $group->title }}</p>
                        <p class="course-tutor">{{$group->user->name }}</p>
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
                    </div>
                    @endforeach
            </div>
        <a class="btn blue-btn shadow-none" href="{{ route('frontend.courses') }}">عرض كل الدورات</a>
        </div>
    </div>  
</div>
<!----------------------------------------------------------------------->
<div class="fifth-section section">
    <h2 class="section-title">تواصل معنا</h2>  
    <div class="container row contact-us-inner">
        <div class="col-md-6 contact-us-right">
            <div class="social-media-wrap">
            <div class="social-media">
            <i class="fas fa-map-marker-alt social-icon"></i>
            <p>  <?php echo nl2br($setting->address); ?></p>
            </div>
            <div class="social-media">
            <i class="fas fa-envelope social-icon"></i>
            <p><a href="mailto:INFO@DOMAIN.COM">  <?php echo nl2br($setting->email); ?></a></p>
            </div>
            <div class="social-media">
            <i class="fas fa-phone-alt social-icon"></i>
            <p><a href="tel:0533350181">  <?php echo nl2br($setting->phone); ?></a></p>
            </div>
            </div>
            
          <a class="btn blue-btn shadow-none" href="{{ route('frontend.contactus') }}">تواصل معنا</a>

        
        </div>
        <div class="col-md-6"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d475324.7393261735!2d38.930956130977606!3d21.44988976368877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2sJeddah%20Saudi%20Arabia!5e0!3m2!1sen!2seg!4v1641168558689!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
    </div>

</div>

@endsection

  