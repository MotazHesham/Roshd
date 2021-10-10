@extends('layouts.frontend')

@section('styles') 
    <link rel="stylesheet" href="{{ asset('frontend/css/cv.css')}}" />
@endsection

@section('content')

    <div class="page">
        <div class="section" id="about">
            <div class="container">
                <div class="card" data-aos="fade-up" data-aos-offset="10">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">
                            @php
                                if($doctor->user && $doctor->user->photo){
                                    $doctor_image = $doctor->user->photo->getUrl('preview2');
                                }else{
                                    // $doctor_image = asset('frontend/img/activ01.png');
                                    $doctor_image = '';
                                }
                            @endphp
                            <img src="{{ $doctor_image }}" class="img-circle" />
                        </div>
                        <div class="col-lg-10 col-md-12">
                            <div class="card-body">
                                <div class="h4 mt-0 title">{{$doctor->user->name ?? ''}}</div>
                                <br />
                                <p>
                                    {{ $doctor->specialization->name ?? ''}}
                                </p> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <div class="section" id="skill">
            <div class="container">
                <div class="h4 text-center mb-4 title">المهارات العامة</div>
                <div class="card" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">HTML</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%">
                                        </div>
                                        <span class="progress-value">80%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">CSS</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                        </div>
                                        <span class="progress-value">75%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">JavaScript</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        </div>
                                        <span class="progress-value">60%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">SASS</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">
                                        </div>
                                        <span class="progress-value">60%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">Bootstrap</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                        </div>
                                        <span class="progress-value">75%</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="progress-container progress-primary">
                                    <span class="progress-badge">Photoshop</span>
                                    <div class="progress">
                                        <div class="progress-bar progress-bar-primary" data-aos="progress-full"
                                            data-aos-offset="10" data-aos-duration="2000" role="progressbar"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 70%">
                                        </div>
                                        <span class="progress-value">70%</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}

        <div class="section" id="experience">
            <div class="container cc-experience">
                <div class="h4 text-center mb-4 title">الخبرات السابقة</div>
                @foreach($doctor->doctorExperiences as $exper)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body cc-experience-header">
                                    <p>{{$exper->start_date}} - {{$exper->end_date}}</p>
                                    <div class="h5">{{$exper->work_place}}</div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h5">{{$exper->job_title}}</div>
                                    <p> 
                                        <?php echo nl2br($exper->description); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div> 
                @endforeach
            </div>
        </div>
        <div class="section">
            <div class="container cc-education">
                <div class="h4 text-center mb-4 title">التعليم</div>
                @foreach($doctor->doctorEducation as $edu)
                    <div class="card">
                        <div class="row">
                            <div class="col-md-3 bg-primary" data-aos="fade-right" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body cc-education-header">
                                    <p>{{$edu->start_date}} - {{$edu->end_date}}</p>
                                    <div class="h5">{{$edu->name}}</div>
                                </div>
                            </div>
                            <div class="col-md-9" data-aos="fade-left" data-aos-offset="50" data-aos-duration="500">
                                <div class="card-body">
                                    <div class="h5">اسم الدرجة العلمية</div>
                                    <br />
                                    <p>
                                        هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم
                                        توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل
                                        هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد
                                        الحروف التى يولدها التطبيق. إذا كنت تحتاج إلى عدد أكبر من
                                        الفقرات يتيح لك مولد النص العربى زيادة عدد الفقرات كما تريد،
                                        النص لن يبدو مقسما ولا يحوي أخطاء لغوية، مولد النص العربى
                                        مفيد لمصممي المواقع على وجه الخصوص، حيث يحتاج العميل فى كثير
                                        من الأحيان أن يطلع على صورة حقيقية لتصميم الموقع.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>
    </div>
@endsection
