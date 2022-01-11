
  @section('styles')
  <style>
  form {
    display: block;
    text-align: center;
  }
  .btn-primary { background-color: #505050; color: #fff; border: thin solid #595959;  padding: 10px 30px;line-height: 1.5;text-decoration:none;  font-weight: bold; margin-bottom: 10px; font-size: 13px; border-radius: 15px;}
  .btn-primary:hover {background-color: #3c3a3a; color: #fff; border: thin solid #3c3a3a; }
  </style>
  @endsection  
@extends('layouts.frontend')

@section('content')
</div>
  
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
                            <form action="{{ route('frontend.signup_user') }}" method="POST">
                                @csrf 
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
                                    <select class="form-control" name="user_type" id="user_type">
                                        <option value="patient">حجز موعد</option>
                                        <option value="student">حجز دورة تدريبية</option>
                                    </select>
                                </div> 
                                
                                <div class="row" id="student_type" style="display: none">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">اسم الدورة </label>
                                            <select class="form-control" name="group_id" id="group_id">
                                                @foreach(\App\Models\Group::get() as $group)
                                                    <option value="{{ $group->id }}">{{ $group->title }}</option> 
                                                @endforeach
                                            </select>
                                        </div> 
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1">التخصص </label>
                                            <select class="form-control" name="specialization_id" id="specialization_id">
                                                @foreach(\App\Models\Specialization::get() as $specialization)
                                                    <option value="{{ $specialization->id }}">{{ $specialization->name }}</option> 
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn-primary">تسجيل</button>
                                
                            </form>
                        </div>

                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @parent 
    <script>
        $('#user_type').on('change',function(){
            if($('#user_type').val() == 'student'){
                $('#student_type').css('display','');
            }else{
                $('#student_type').css('display','none');
            }
        })
    </script>
@endsection