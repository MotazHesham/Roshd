@extends('layouts.frontend')

@section('content')
</div>

<div class="courses-second-section section container">
    <div class="row">
        <div class="col-lg-3">
            <div class="pages-list">
                <ul>
                    <li><a  href="{{ route('frontend.service','familly_advice') }}"   class="{{ request()->is("service/familly_advice") ? " active-page" : "" }}">الاستشارات الأسرية</a></li>
                    <li><a  href="{{ route('frontend.service','individual_advice') }}"  class="{{ request()->is("service/individual_advice") ? " active-page" : "" }}" >الاستشارات الفردية</a></li>
                    <li><a  href="{{ route('frontend.service','el_gadaly_elsloky') }}"  class="{{ request()->is("service/el_gadaly_elsloky") ? " active-page" : "" }}">علاج الجدل السلوكي</a></li>
                    <li><a  href="{{ route('frontend.service','el_maarefe_elsloky') }}"  class="{{ request()->is("service/el_maarefe_elsloky") ? " active-page" : "" }}" >علاج المعرفي السلوكي</a></li>
                    <li><a  href="{{ route('frontend.service','art_therapy') }}"   class="{{ request()->is("service/art_therapy") ? " active-page" : "" }}">العلاج بالفن</a></li>
                    <li><a  href="{{ route('frontend.service','play_therapy') }}"  class="{{ request()->is("service/play_therapy") ? " active-page" : "" }}"> العلاج باللعب</a></li>

                    </ul>
            </div>    
        </div>
        <div class="col-lg-9 service-information">
            <div class="row">
                <p> 
                    <?php echo nl2br($desc); ?>
                </p>
            </div>
        </div>
    </div>    
    
</div>    
    @endsection
     