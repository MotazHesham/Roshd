@extends('layouts.frontend')

@section('content')
</div>

<div class="about-second-section section">
    <div class="container">
        <p class="grey">    <?php echo nl2br($setting->about_rosd); ?></p>
        <div class="title_lines">
       <a class="btn book-date grey-button shadow-none" href="{{ route('frontend.login') }}">حجز موعد</a>
        </div>
    </div> 
    
    <div class="container row sec2-about-part2">
        <div class="col-lg-7">
            <div class="our-values">
                <p class="grey">رسالتنا</p>
                <p class="values-p">   <?php echo nl2br($setting->message); ?> </p>
            </div>
        
        </div>
        <div class="col-lg-5 values-img-wrap">
            <img src="{{asset('frontend/new/img/undraw_new_message_re_fp03.png')}}">
        </div>
    </div>
    <div class="container row sec2-about-part2 sec-reverse-col">
        <div class="col-lg-5 values-img-wrap">
            <img src="{{asset('frontend/new/img/undraw_in_progress_re_m1l6.png')}}">
        </div>
        <div class="col-lg-7">
            <div class="our-values">
                <p class="grey">رؤيتنا</p>
                <p class="values-p">   <?php echo nl2br($setting->vision); ?></p>
            </div>
        
        </div>
    </div>
</div>
    
<div class="about-third-section">
    <div class="container">
    <div class="title_lines">
       <p class="title-a">خدماتنا</p>
    </div>
    <div class="our-services-section">
        <ol class="services-list">
            <?php echo nl2br($setting->services); ?>
        </ol> 
    </div>
     <div class="title_lines">
       <p class="title-a">لماذا رشد؟</p>
    </div>
        
    <div class="our-services-section">
        <p class="whyus-p"><?php echo nl2br($setting->why);?>
         </p> 
        
        <ul class="list-with-icons">
            <div class="list-icon-wrap">
                <img class="list-icon"src="{{asset('frontend/new/img/art-studies.png')}}">
                <li>العلاج بالفن
                <p><?php echo nl2br($setting->art_therapy);?></p>
                </li>
            </div>
            <div class="list-icon-wrap">
                <img class="list-icon" src="{{asset('frontend/new/img/argument.png')}}">
                <li>العلاج الجدلي
                <p><?php echo nl2br($setting->el_gadaly_elsloky);?></p>
                </li>
            </div>
        </ul>
    </div>
    </div>    
    
</div>
@endsection