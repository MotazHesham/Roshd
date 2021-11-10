@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="page about">
            <div class="container">
                <div class="home-contact">
                    <div class="container">
                        <div class="section_title text-center">
                            <br />
                            <h3>بانات التواصل</h3>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-4">
                                <div class="icon"><i class="fas fa-mobile-alt"></i></div>
                                <h5>{{$setting->phone}}</h5>
                            </div>

                            <div class="col-md-4">
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <h5>{{ $setting->address }}</h5>
                            </div>

                            <div class="col-md-4">
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <h5>{{ $setting->email}}</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row contact bg-primary color-white pa-80 m-b-20 rounded-circle ">
                    <div class="col-lg-2 mb-4 text-center"></div>
                    <div class="col-lg-8 mb-4 text-center"> 
                        @if($errors->count() > 0)
                            <div class="alert alert-danger">
                                <ul class="list-unstyled">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form name="sentMessage" id="contactForm" novalidate="" method="POST" action="{{ route("frontend.contactus.store") }}" enctype="multipart/form-data">
                            @csrf
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>الاسم بالكامل:</label>
                                    <input type="text" name="name" class="form-control" id="name" required=""
                                        data-validation-required-message="Please enter your name." />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>رقم التليفون:</label>
                                    <input type="tel" name="phone" class="form-control" id="phone" required=""
                                        data-validation-required-message="Please enter your phone number." />
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>البريد الإلكتروني:</label>
                                    <input type="email" name="email" class="form-control" id="email" required=""
                                        data-validation-required-message="Please enter your email address." />
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div class="control-group form-group">
                                <div class="controls">
                                    <label>الرسالة:</label>
                                    <textarea rows="4" cols="100" name="message" class="form-control" id="message" required=""
                                        data-validation-required-message="Please enter your message" maxlength="999"
                                        style="resize: none" aria-invalid="false"></textarea>
                                    <div class="help-block"></div>
                                </div>
                            </div>
                            <div id="success"></div>
                            <!-- For success/fail messages -->
                            <button class="btn-primary">إرســـال</button>
                        </form>
                    </div>
                    <div class="col-lg-4 mb-4 text-center"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
