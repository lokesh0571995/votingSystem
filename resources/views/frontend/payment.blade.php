@extends('frontend.main')
@section('title')
<title>Payment</title>
@endsection
@section('content')
<section id="hero" class="d-flex align-items-center" style="height:10vh;">


</section><!-- End Hero -->
<main id="main">

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Payment</h2>
     
    </div>

    <div class="row">
               
      <div class="col-lg-7 mt-5  d-flex align-items-stretch">
        
      <form role="form" action="{{ url('payment') }}" method="POST" class="require-validation" data-cc-on-file="false" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}" id="payment-form">
        @csrf

        <input type="hidden" name="amount" value="{{$amount}}">
        <input type="hidden" name="nominie_id" value="{{$nominie_id}}">
        
        <div class='form-row row'>
            <div class='col-xs-12 col-md-6 form-group required'>
                <label class='control-label'>Card Holder Name</label> 
                <input class='form-control' size='4' type='text' name="card_holder_name">
                @if ($errors->has('card_holder_name'))
                <span class="text-danger">{{ $errors->first('card_holder_name') }}</span>
                @endif 
            </div>
            <div class='col-xs-12 col-md-6 form-group required'>
                <label class='control-label'>Card Number</label> 
                <input autocomplete='off' class='form-control card-number' size='20' type='text' name="card_number">
                @if ($errors->has('card_number'))
                <span class="text-danger">{{ $errors->first('card_number') }}</span>
                @endif 
            </div>                           
        </div>                        
        <div class='form-row row'>
            <div class='col-xs-12 col-md-4 form-group cvc required'>
                <label class='control-label'>CVC</label> 
                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text' name="cvc">
                @if ($errors->has('cvc'))
                <span class="text-danger">{{ $errors->first('cvc') }}</span>
                @endif 
            </div>
            <div class='col-xs-12 col-md-4 form-group expiration required'>
                <label class='control-label'>Exp. Month</label> 
                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text' name="expiry_month">
                @if ($errors->has('expiry_month'))
                <span class="text-danger">{{ $errors->first('expiry_month') }}</span>
                @endif
            </div>
            <div class='col-xs-12 col-md-4 form-group expiration required'>
                <label class='control-label'>Exp. Year</label> 
                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text' name="expiry_year">
                @if ($errors->has('expiry_year'))
                <span class="text-danger">{{ $errors->first('expiry_year') }}</span>
                @endif
            </div>
        </div>
        <br>
        
        <div class='form-row row'>
            <div class='col-md-12 form-group hide'>
            <div class='alert-success alert' style="text-align: center;">R{{$amount}}
            </div>
            </div>
        </div>
       <div class='form-row row'>
            <div class='col-md-12 error form-group hide'>
            <div class='alert-danger alert' style="text-align: center;">
            </div>
            </div>
        </div>
        <div class="form-row row">
            <div class="col-xs-12" style="text-align: center;">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now</button>
            </div>
        </div>
        </form>
      </div>
      <br>
      <br>

    </div>

  </div>
</section>
<!-- End Contact Section -->

</main><!-- End #main -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
$(function() {
  var $form = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form = $(".require-validation"),
    inputSelector = ['input[type=email]', 'input[type=password]', 'input[type=text]', 'input[type=file]', 'textarea'].join(', '),
    $inputs = $form.find('.required').find(inputSelector),
    $errorMessage = $form.find('div.error'),
    valid = true;
    $errorMessage.addClass('hide');
    $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
        var $input = $(el);
        if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
        }
    });
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
          number: $('.card-number').val(),
          cvc: $('.card-cvc').val(),
          exp_month: $('.card-expiry-month').val(),
          exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
  });

  function stripeResponseHandler(status, response) {
      if (response.error) {
          $('.error')
              .removeClass('hide')
              .find('.alert')
              .text(response.error.message);
      } else {
          /* token contains id, last4, and card type */
          var token = response['id'];
          $form.find('input[type=text]').empty();
          $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
          $form.get(0).submit();
      }
  }
});
</script>


@endsection