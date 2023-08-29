@extends('frontend.inner_main')
@section('title')
<title>Register</title>
@endsection
@section('content')

<section id="hero" class="d-flex align-items-center" style="height:10vh;">


</section><!-- End Hero -->
<main id="main">

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Change Password</h2>
    
    </div>

    <div class="row">

      <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
        <form action="{{url('voter/update-password')}}/{{base64_encode($user->id)}}" method="post" role="form" class="php-email-form">
        @csrf
          <div class="row">
            <div class="form-group col-md-6">
              <label for="name">Password</label>
              <input type="password" name="password" class="form-control" id="name" >
              @if ($errors->has('password'))
                <span class="text-danger">{{ $errors->first('password') }}</span>
              @endif 
            </div>
            <div class="form-group col-md-6">
              <label for="name">Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password" id="email" >
              @if ($errors->has('confirm_password'))
                <span class="text-danger">{{ $errors->first('confirm_password') }}</span>
              @endif 
            </div>
          </div>
          
          <div class="text-center"><button type="submit">Update</button></div>
        </form>
      </div>

    </div>

  </div>
</section>
<!-- End Contact Section -->

</main><!-- End #main -->
@endsection