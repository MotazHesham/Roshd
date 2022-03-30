<div class="col-lg-4 account-nav-menu-wrap">
    <div class="account-nav-menu">
        <ul>
            <li class="account-nav-menu-item {{ request()->is('account*') ? '   active-nav-menu-item' : '' }}">
                <a href="{{ route('frontend.account') }}">
                    حسابي
                </a>
            </li>

            @if (Auth::user()->user_type == 'patient')
                <li
                    class="account-nav-menu-item {{ request()->is('reservations*') ? '   active-nav-menu-item' : '' }}">
                    <a class="" href="{{ route('frontend.reservations.index') }}">
                        الحجوزات السابقة
                    </a>
                </li>
                <li
                    class="account-nav-menu-item {{ request()->is('packages_user*') ? '   active-nav-menu-item' : '' }}">
                    <a class="" href="{{ route('frontend.packages_user.index') }}">
                        الباقات
                    </a>
                </li>
            @else
                <li class="account-nav-menu-item {{ request()->is('groups*') ? '   active-nav-menu-item' : '' }}"><a
                        class="" href="{{ route('frontend.groups.index') }}">
                        الدورات السابقة
                    </a>
                </li>
            @endif
            <li class="account-nav-menu-item"><a class="signout-item"
                    onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    تسجيل الخروج
                </a></li>
        </ul>
    </div>
</div>
