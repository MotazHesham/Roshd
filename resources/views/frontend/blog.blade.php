@extends('layouts.frontend')

@section('content')
</div>
<div class="section container blog-second-section">
  <div class="row">
@foreach ($blogs as $blog )
      @php
         if($blog->video){
             $video=$blog->video->getUrl();
         }
         else {
             $video=asset('frontend/new/videos/MVI_8217.MP4');
         }
      @endphp
       <div class="col-md-4"> 
        <div class="blog-post">
              <video width="320" height="240" controls>

                <source src="{{$video }}" type="video/mp4">
              Your browser does not support the video tag.
              </video>
              <p class="blog-post-info">
           {{$blog->description }}
              </p>
          </div>
       </div>
 @endforeach
      </div>
</div> 
<div style=" width:100%;
display: flex;justify-content:center;">   
{{$blogs->links()  }}
</div>
    @endsection