@extends('frontend.main')
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
      <h2>Update Profile</h2>
     
    </div>

    <div class="row">

      <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
        <form action="{{url('voter/update-profile')}}/{{base64_encode($user->id)}}" method="post" role="form" class="php-email-form">
            @csrf
          <!-- <div class="row"> -->
            <div class="form-group col-md-6">
              <label for="name">Name</label>
              <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
              @if ($errors->has('name'))
                <span class="text-danger">{{ $errors->first('name') }}</span>
              @endif 
            </div>
            <div class="form-group col-md-6">
              <label for="name">Email</label>
              <input type="email" class="form-control" name="email" id="email" value="{{$user->email}}">
              @if ($errors->has('email'))
                <span class="text-danger">{{ $errors->first('email') }}</span>
              @endif 
            </div>

            <div class="form-group col-md-6">
              <label for="name">User Type</label>
              <input type="text" class="form-control" name="user_type" id="email" value="{{$user->user_type}}">
              @if ($errors->has('user_type'))
                <span class="text-danger">{{ $errors->first('user_type') }}</span>
              @endif 
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