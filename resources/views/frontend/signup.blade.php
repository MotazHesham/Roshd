@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="page about">
            <div class="container">
                <div class="section_title text-center">
                    <h3>مستخدم جديد</h3>
                </div>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الاسم بالكامل</label>
                                        <input class="form-control" type="text" name="name" placeholder="الاسم بالكامل" />
                                    </div>
                                </div>

                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الجوال</label>
                                        <input class="form-control" type="text" name="phone" placeholder="الجوال" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">البريد اللكتروني</label>
                                        <input class="form-control" type="text" name="email" placeholder="البريد اللكتروني" />
                                    </div> 
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">كلمة المرور
                                        </label>
                                        <input class="form-control" name="password" type="text" placeholder="****" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">نوع التسجيل </label>
                                <select class="form-control" name="user_type">
                                    <option value="patient">حجز موعد</option>
                                    <option value="student">حجز دورة تدريبية</option>
                                </select>
                            </div> 
                            <button class="btn-primary">تسجيل</button>
                        </div>

                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
