@extends('layouts.frontend')

@section('content')
</div>
<div class="courses-second-section section container">
    <div class="row">
        <div class="col-lg-3">
            <div class="pages-list">
                <ul>
                <li><a  href="{{ route('frontend.service','familly_advice') }}" class="active-page">الاستشارات الأسرية</a></li>
                <li><a  href="{{ route('frontend.service','individual_advice') }}">الاستشارات الفردية</a></li>
                <li><a  href="{{ route('frontend.service','el_gadaly_elsloky') }}">علاج الجدل السلوكي</a></li>
                <li><a  href="{{ route('frontend.service','el_maarefe_elsloky') }}">علاج المعرفي السلوكي</a></li>
                <li><a  href="{{ route('frontend.service','art_therapy') }}">العلاج بالفن</a></li>
                <li><a  href="{{ route('frontend.service','play_therapy') }}">العلاج باللعب</a></li>
                
                </ul>
            </div>
        
        </div>
        <div class="col-lg-9 service-information">
            <div class="row">
           <p class="services-p">
             <?php echo nl2br($setting->familly_advice)?>   
             </p>
            <p class="services-p">
            </p>
            <p class="services-p">
                 
            </p>
            </div>
        </div>
    </div>    
    
</div>    

@endsection