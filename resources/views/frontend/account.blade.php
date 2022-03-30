@extends('layouts.frontend')

@section('content')
    <div class="account-settings-section">
        <div class="container">
            <div class=" row">
                @include('frontend.partial.menue')
                <div class="col-lg-4 account-email-psw-wrapper">
                    <div class="account-email-psw">
                        <div class="account-email">
                            <p class="edit-account">البريد الالكتروني
                                <img class="edit-icon edit-email-icon" src="{{ asset('frontend/new/img/pen.png') }}">
                            </p>
                            <p class="registered-email">
                                {{ Auth::user()->email }}
                            </p>
                        </div>
                        <div class="change-psw-wrap">
                            <p class="change-psw edit-psw-btn">تغيير الرقم السري</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 account-info-wrap">
                    <div class="account-info-div">
                        <p class="edit-account">المعلومات الشخصية
                            <img class="edit-icon edit-info-icon" src="{{ asset('frontend/new/img/pen.png') }}">
                        </p>
                        <div class="personal-info-wrap">
                            <p class="name-title">الاسم:</p>
                            <p class="name"> {{ Auth::user()->name }} </p>
                            <p class="phone-title">رقم الهاتف:</p>
                            <p class="phone-num"> {{ Auth::user()->phone }} </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="edit-email-div">
        <div class="edit-email-inner">
            <i class="far fa-times-circle close-edit-pop"></i>
            <p>تعديل البريد الالكتروني</p>
            <form action="{{ route('frontend.account.update') }}" method="Post">
                @csrf
                <div class="form-group form-group-edit">
                    <input type="email" placeholder="البريد الالكتروني" required name="email"
                        value="{{ Auth::user()->email }}">
                </div>
                <button type="submit" class="btn btn-default form-submit-btn blue-btn save-edit-btn">حفظ</button>
            </form>
        </div>
    </div>

    <div class="edit-psw-div">
        <div class="edit-psw-inner">
            <i class="far fa-times-circle close-edit-pop"></i>
            <p>تعديل الرقم السري</p>
            <form action="{{ route('frontend.account.update') }}" method="Post">
                @csrf
                <div class="form-group form-group-edit">
                    <input class="psw-edit-input" type="password" name="password" placeholder="الرقم السري" required>
                </div>
                <button type="submit"
                    class="btn btn-default form-submit-btn blue-btn save-edit-btn save-edit-btn">حفظ</button>
            </form>
        </div>
    </div>
    <div class="edit-info-div">
        <div class="edit-info-inner">
            <i class="far fa-times-circle close-edit-pop"></i>
            <p>تعديل المعلومات الشخصية</p>
            <form action="{{ route('frontend.account.update') }}" method="Post">
                @csrf
                <div class="form-group form-group-edit">
                    <input class="edit-name-input" type="text" placeholder="الاسم" required name="name"
                        value="{{ Auth::user()->name }}">
                    <input type="number" placeholder="رقم الهاتف" required name="phone" value="{{ Auth::user()->phone }}">
                </div>
                <button type="submit"
                    class="btn btn-default form-submit-btn blue-btn save-edit-btn save-edit-btn">حفظ</button>
            </form>
        </div>
    </div>

    </div>
    <div class="alert alert-danger">
        <ul class="list-unstyled">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endsection
