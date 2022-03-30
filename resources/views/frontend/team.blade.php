@extends('layouts.frontend')

@section('content')
    <div class="consaltants-second-section section container">
        <div class="row consultant-row">

            @foreach ($doctors as $doctor)
                @php
                    if ($doctor->user && $doctor->user->photo) {
                        $doctor_image = $doctor->user->photo->getUrl();
                    } else {
                        // $doctor_image = asset('frontend/new/img/conversation.png');
                        $doctor_image = '';
                    }
                @endphp
                <!--generate consultants here-->
                <div class="col-lg-3 col-md-6 consaltant-name-img">
                    <div class="consaltant">
                        <div class="consultant-wrap">
                            <a  href="{{route('frontend.doctor',$doctor->id)}}"><img class="consultant-img" src="{{ $doctor_image }}"></a>
                        </div>
                        <div class="consultant-info">
                            <a  href="{{route('frontend.doctor',$doctor->id)}}">
                                <p class="item-info">{{ $doctor->user->name ?? '' }}</p>
                            </a>
                            <p class="consultant-job">{{ $doctor->specialization->name ?? '' }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
    {{ $doctors->links() }}
@endsection
