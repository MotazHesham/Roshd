@extends('layouts.frontend')

@section('content')
</div>
    <div class="contact-second-section container">
        <div class="title_lines">
              <p class="title-a">للتواصل</p>
           </div>    
           <div class="contact-form-wrap">
            @if($errors->count() > 0)
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
           <form  method="POST" action="{{ route("frontend.contactus.store") }}" enctype="multipart/form-data">
            @csrf 
           <div class="form-group">
             <input type="text" class="form-control shadow-none" id="usr" placeholder="الاسم" name="name" >
           </div>
            <div class="form-group">
           <input type="email" class="form-control shadow-none" id="email" placeholder="البريد الالكتروني" name="email">
           </div> 
           <div class="form-group">
             <input type="number" class="form-control shadow-none" id="usr" placeholder="رقم الهاتف" name="phone" >
           </div>
            <div class="form-group">
             <textarea class="form-control shadow-none" rows="5" id="comment" placeholder="الرسالة" name="message" ></textarea>
           </div>
               <button type="submit" class="btn btn-default blue-btn form-btn">ارسال</button>
           </form>
           </div>
           <div class="row contact-us-inner">
               <div class="col-md-6 contact-us-right">
                   <div class="social-media-wrap">
                    <div class="social-media">
                        <i class="fas fa-envelope social-icon"></i>
                        <p><a href="mailto:INFO@DOMAIN.COM">  <?php echo nl2br($setting->email); ?></a></p>
                        </div>
                        <div class="social-media">
                        <i class="fas fa-phone-alt social-icon"></i>
                        <p><a href="tel:0533350181">  <?php echo nl2br($setting->phone); ?></a></p>
                        </div>
                        </div>
                    
                    </div>
                    <div class="col-md-6"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d475324.7393261735!2d38.930956130977606!3d21.44988976368877!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x15c3d01fb1137e59%3A0xe059579737b118db!2sJeddah%20Saudi%20Arabia!5e0!3m2!1sen!2seg!4v1641168558689!5m2!1sen!2seg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></div>
                </div>
           </div>
       </div> 
@endsection
