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
                                        <label for="exampleFormControlTextarea1">الاسم الاول</label>
                                        <input class="form-control" type="text" placeholder="الاسم الاول" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">الاسم الاخير
                                        </label>
                                        <input class="form-control" type="text" placeholder="الاسم الاخير" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">البريد اللكتروني</label>
                                        <input class="form-control" type="text" placeholder="البريد اللكتروني" />
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">كلمة المرور
                                        </label>
                                        <input class="form-control" type="text" placeholder="****" />
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">نوع التسجيل </label>
                                <select class="form-control">
                                    <option>حجز موعد</option>
                                    <option>حجز دورة تدريبية</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">اسم الدورة التدريبية
                                </label>
                                <select class="form-control">
                                    <option>اسم الدورة التدربية</option>
                                    <option>اسم الدورة التدريبية</option>
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
