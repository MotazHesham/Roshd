@extends('layouts.frontend')

@section('content')
    <div class="row signup-wrap">
        <div class="col-lg-4 sign-right">
            <a href="{{ route('frontend.home')}}"><img class="logo-sign" src="{{asset('frontend/new/img/logo.png')}}"></a>
        </div>    
        <div class="col-lg-8 signup-form-outer">
            <div class="sign-div-wrap signin-div-wrap">
                <h3 class="sign_title">تسجيل الدخول</h3>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            @if($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                 <form class="signup-form signin-form" method="POST" action="{{ route('login') }}">
                    @csrf
                        <div class="form-line">
                            <div class="form-group">
                            <input type="email" placeholder="البريد الالكتروني"  name="email" >
                            </div>   
                        </div>
                        <div class="form-line">
                            <div class="form-group">
                            <input type="password" name="password" placeholder="الرقم السري">
                            </div> 
                        </div>
                     <div><a class="forget-psw" href="#">نسيت الرقم السري</a></div>
                     <button type="submit" class="btn btn-default form-submit-btn shadow-none blue-btn">تسجيل الدخول</button>
                    <p class="signup-p">
                    ليس لديك حساب؟ 
                    <a class="signin-link"  href="{{ route('frontend.signup') }}">تسجيل</a>
                    </p>
                </form>
            </div>
        
        </div>    
    </div>
    </div>
<!----end of main container----->
@endsection