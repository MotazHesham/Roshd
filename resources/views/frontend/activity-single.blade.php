@extends('layouts.frontend')

@section('content')

    <div class="container">
        <div class="page text-right m-b-50">
            @php
                if($activate->photo){
                    $image = $activate->photo->getUrl('preview2');
                }else{
                    $image = asset('frontend/img/activ01.png');
                }
            @endphp
            <div class="row">
                <div class="col-md-3">
                    <div class="img-circle">
                        <img src="{{ $image}}" class="img-fluid" />
                    </div>
                </div>

                <div class="col-md-9">
                    <div class="text">
                        <br />
                        <h2 class="h3">{{ $activate->title }}</h2>
                        <div class="date">
                            <i class="fas fa-calendar"></i> تاريخ النشاط : {{ $activate->date }}
                        </div>
                        <br />
                        <p>
                            <?php echo nl2br($activate->description); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="activity__video">
        <div class="container">
            <div class="heading">
                <h3>فيديو تعريفي بالنشاط</h3>
            </div>
            @php
                if($activate->video){
                    $video = $activate->video->getUrl();
                }else{
                    $video = 'https://www.youtube.com/embed/w-ZrFGBtNgE';
                }
            @endphp
            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">
                    <div class="video">
                        <div class="video-container"> 
                            <video style="width:100%" controls>
                                <source src="{{ $video }}" type="video">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </div>

    <div class="activity__gallery">
        <div class="container">
            <div class="row"> 
                @foreach($activate->images as $key => $media)
                    <a href="{{ $media->getUrl() }}" data-toggle="lightbox" data-gallery="gallery" class="col-md-3">
                        <img src="{{ $media->getUrl('preview2') }}" class="img-fluid rounded" />
                    </a>
                @endforeach 
            </div> 
        </div>
    @endsection
