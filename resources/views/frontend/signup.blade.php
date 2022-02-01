@extends('layouts.frontend')

@section('content')
<div class="row signup-wrap">
    <div class="col-lg-4 sign-right">
        <a href="{{ route('frontend.home')}}"><img class="logo-sign" src="{{asset('frontend/new/img/logo.png')}}"></a>
    </div>    
    <div class="col-lg-8 signup-form-outer">
        <div class="sign-div-wrap">
            <h3 class="sign_title">تسجيل جديد</h3>
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
             <form class="signup-form" action="{{ route('frontend.signup_user') }}" method="POST">
                @csrf 
                    <div class="form-line">
                         <div class="form-group">
                        <input type="text" placeholder="الاسم بالكامل"  name="name">
                        </div>
                         <div class="form-group">
                        <input type="email" placeholder="البريد الالكتروني" name="email">
                        </div>  
                    </div>
                    <div class="form-line">
                        <div class="form-group">
                            <input type="number" placeholder="رقم الهاتف" name="phone">
           
                        </div> 
                         <div class="form-group">
                            <input type="password" name="password"  placeholder="الرقم السري">
                        </div>
                          
                    </div>
                 <div class="signup-radio">
                <label class="radio-search">
                    عميل
                  <input type="radio" checked="checked"  name="user_type"  value="patient">
                  <span class="checkmark"></span>
                </label>
                <label class="radio-search">طالب
                  <input type="radio" name="user_type"  value="student">
                  <span class="checkmark"></span>
                </label>
                </div>
                 <button type="submit" class="btn btn-default form-submit-btn shadow-none blue-btn">حفظ</button>
                <p class="signup-p">
                هل لديك حساب من قبل؟ 
                <a class="signin-link" href="{{route('frontend.login') }}">دخول</a>
                </p>
            </form>
        </div>
    
    </div>    
</div>
</div>

@endsection