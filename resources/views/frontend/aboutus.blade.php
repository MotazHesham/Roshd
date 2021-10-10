@extends('layouts.frontend')

@section('content')
<div class="container">
    <div class="page text-right m-b-50">
      <div class="row">
        <div class="col-md-3">
          <div class="img-circle">
            <img src="{{ asset('frontend/img/activ01.png') }}" class="img-fluid" />
          </div>
        </div>

        <div class="col-md-9">
          <div class="text">
            <h2 class="h3">عن رشد</h2> 
            <p> 
              <?php echo nl2br($setting->about_rosd); ?>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection