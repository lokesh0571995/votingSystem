@extends('frontend.main')
@section('title')
<title>Votining List</title>
@endsection
@section('content')
<section id="hero" class="d-flex align-items-center" style="height:10vh;">


</section><!-- End Hero -->
<main id="main">

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Approved Nominie</h2>
      <p>Nominie Votining List</p>
    </div>

    <div class="row">
               
      <div class="col-lg-7 mt-5  d-flex align-items-stretch">
        
        <form action="{{url('stripe')}}" method="post" role="form" class="php-email-form">
            @csrf
          <div class="row">
            
            <div class="form-group col-md-6">
              <label for="name">Nominee Name</label>
              <select  class="form-control" name="nominie_id" id="name" >
                <option value ="">Select Nominie</option>
                @if(!empty($approvedNominie))
                @foreach($approvedNominie as $value)
                  @php 
                   
                  $nominieName = \App\Models\Candidate::where('id',$value->candidate_id)->first();
                  
                  @endphp
                  <option value ="{{$value->id}}">{{$nominieName->name}}</option>

                @endforeach
                @endif
              
                @if ($errors->has('nominie_id'))
                <span class="error">{{ $errors->first('nominie_id') }}</span>
                @endif 
              </select>  
             
            </div>  

            <div class="form-group col-md-6">
              <label for="name">Amount</label>
              <input  class="form-control" name="amount" id="amount" >
               
                @if ($errors->has('amount'))
                <span class="error">{{ $errors->first('amount') }}</span>
                @endif 
            
            </div>  
    
          </div>

          <h4 class="heading">select payment mode</h4>
          <label>
            <input type="radio" name="pamentMode" id="cod" value="stripe" checked>STRIPE PAYMENT
        </label>
       
        <label>
            <input type="radio" name="pamentMode" id="paypal" value="mti_mobile"> MTI MOBILE PAYMENT
        </label>
    
          <div class="text-center"><button type="submit">Submit</button></div>
        </form>
      </div>
      <br>
      <br>

    </div>

  </div>
</section>
<!-- End Contact Section -->

</main><!-- End #main -->
<style>
.error{
    color:red;
}
</style>


@endsection