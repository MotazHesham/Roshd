@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="page about">
            <div class="container">
                <div class="section_title text-center">
                    <h3>إستشارات رشـــد</h3>
                </div>
                <div class="col-md-12">
                    <div class="row">   
                        <div class="col-md-2"></div>
                        <div class="col-md-8">
                            <form method="POST" action="{{ route("frontend.consulting.store") }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">الاسم</label>
                                    <input class="form-control" name="name" type="text" required placeholder="برجاء إدخال الاسم بالكامل" />
                                    @if($errors->has('name'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('name') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">البريد الإلكتروني</label>

                                    <input class="form-control" name="email" type="email" required placeholder="برجاء ادخال بريد " />
                                    @if($errors->has('email'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('email') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">نوع الاستشارة
                                    </label>
                                    <select class="form-control" name="advice_type" required>
                                        @foreach(App\Models\Advice::ADVICE_TYPE_SELECT as $key => $label)
                                            <option value="{{ $key }}" {{ old('advice_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('advice_type'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('advice_type') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">نص الإستشارة</label>
                                    <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                    @if($errors->has('description'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('description') }}
                                        </div>
                                    @endif
                                </div>

                                <button class="btn-primary">إرسال الإستشارة</button>
                            </form>
                        </div>

                        <div class="col-md-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
