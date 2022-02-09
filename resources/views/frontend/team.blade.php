@extends('layouts.frontend')

@section('content')

</div>

<div class="consaltants-second-section section container">
    @foreach($doctors as $doctor)
    @php
        if($doctor->user && $doctor->user->photo){
            //$doctor_image = $doctor->user->photo->getUrl('preview2');
            $doctor_image = $doctor->user->photo->getUrl('preview2');
        }else{
            // $doctor_image = asset('frontend/new/img/conversation.png');
            $doctor_image = '';
        }
    @endphp 
    <div class="row consultant-row">
        <div class="col-lg-3 consaltant-name-img">
            <div class="consaltant">
            <div class="consultant-wrap">
                <img class="consultant-img" src="{{$doctor_image}}">
            </div>
            <div class="consultant-info">
                <p class="item-info">{{$doctor->user->name ?? ''}}</p>
                <p class="consultant-job">{{ $doctor->specialization->name ?? ''}}</p>
            </div>
            </div>
        </div>
        <div class="col-lg-9 consaltant-job-info">
            <p class="consultant-p">الخبرات السابقة</p>
            @foreach($doctor->doctorExperiences as $exper)
            <p class="services-p">
                {{$exper->job_title}} 
                في {{$exper->work_place}} {{$exper->start_date}} - {{$exper->end_date}}<br>
                <?php echo nl2br($exper->description); ?>
              
            </p>
            @endforeach
            <p class="consultant-p">التعليم</p>
            @foreach($doctor->doctorEducation as $edu)
            <p class="services-p">
                      {{ App\Models\Education::NAME_SELECT[$edu->name] ?? '' }}  {{$edu->start_date}} - {{$edu->end_date}}
            </p>
            @endforeach  
        </div>
    </div>
                                                                                                                                
    @endforeach
</div>
{{ $doctors->links() }}
</div>
</div>
@endsection