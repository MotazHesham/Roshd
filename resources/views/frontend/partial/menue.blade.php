<div class="col-lg-4 account-nav-menu-wrap">
    <div class="account-nav-menu">
        <ul>
         <li class="account-nav-menu-item {{ request()->is("account*") ? "   active-nav-menu-item" : "" }}">
            <a href="{{route('frontend.account') }}">
                    حسابي
            </a></li>  
        
            @if(Auth::user()->user_type=='patient')  
              
            <li class="account-nav-menu-item {{ request()->is("reservations*") ? "   active-nav-menu-item" : "" }}"><a class="" href="{{route('frontend.reservations.index') }}">   
            الحجوزات السابقة
            @else
            الدورات السابقة
            @endif
        </a>
        </li>  
        <li class="account-nav-menu-item"><a class="signout-item" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    تسجيل الخروج
       </a></li>
        </ul>
    </div>
</div>