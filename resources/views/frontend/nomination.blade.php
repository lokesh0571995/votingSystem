@extends('frontend.main')
@section('title')
<title>Nomination</title>
@endsection
@section('content')
<section id="hero" class="d-flex align-items-center" style="height:10vh;">


</section><!-- End Hero -->
<main id="main">

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Nomination</h2>
      <p>Nomination Candidate</p>
    </div>

    <div class="row">
               
      <div class="col-lg-7 mt-5  d-flex align-items-stretch">
        
        <form action="{{url('candidate/add')}}" method="post" role="form" class="php-email-form">
            @csrf
          <div class="row">
            
            <div class="form-group col-md-6">  
              <label for="name">Category</label>
              <select  class="form-control" name="category_id" id="category" onchange="show_item(this.value)">
                <option value ="">Select Category</option>
                @if(!empty($category1))
                
                <option value ="{{$category1->id}}">{{$category1->name}}</option>
               
                @endif

                @if ($errors->has('category_id'))
                <span class="error">{{ $errors->first('category_id') }}</span>
                @endif 
              </select>  
             
            </div>
            
            
            <div class="form-group col-md-6">
              <label for="name">Nominee Name</label>
              <select  class="form-control" name="candidate_id" id="name" >
                <option value ="">Select Nominie</option>
                @if(!empty($candidate1))
                @foreach($candidate1 as $value)
                  <option value ="{{$value->id}}">{{$value->name}}</option>
                @endforeach
                @endif

                @if ($errors->has('candidate_id'))
                <span class="error">{{ $errors->first('candidate_id') }}</span>
                @endif 
              </select>  
             
            </div>  
              
            
          </div>
    
          <div class="text-center"><button type="submit">Submit</button></div>
        </form>
      </div>
      <br>
      <br>
      <div class="col-lg-7 mt-5  d-flex align-items-stretch">
        <form action="{{url('candidate/add')}}" method="post" role="form" class="php-email-form">
            @csrf
          <div class="row">
            
            <div class="form-group col-md-6">  
              <label for="name">Category</label>
              <select  class="form-control" name="category_id" id="category" onchange="show_item(this.value)">
                <option value ="">Select Category</option>
                @if(!empty($category2))
               
                <option value ="{{$category2->id}}">{{$category2->name}}</option>
               
                @endif

                @if ($errors->has('category_id'))
                <span class="error">{{ $errors->first('category_id') }}</span>
                @endif 
              </select>  
             
            </div>
            
            
            <div class="form-group col-md-6">
              <label for="name">Nominee Name</label>
              <select  class="form-control" name="candidate_id" id="name" >
                <option value ="">Select Nominie</option>
                @if(!empty($candidate2))
                @foreach($candidate2 as $value)
                  <option value ="{{$value->id}}">{{$value->name}}</option>
                @endforeach
                @endif

                @if ($errors->has('candidate_id'))
                <span class="error">{{ $errors->first('candidate_id') }}</span>
                @endif 
              </select>  
             
            </div>  
              
            
          </div>
    
          <div class="text-center"><button type="submit">Submit</button></div>
        </form>
      </div>

      <br>
      <br>
      <div class="col-lg-7 mt-5 d-flex align-items-stretch">
        <form action="{{url('candidate/add')}}" method="post" role="form" class="php-email-form">
            @csrf
          <div class="row">
            
            <div class="form-group col-md-6">  
              <label for="name">Category</label>
              <select  class="form-control" name="category_id" id="category" onchange="show_item(this.value)">
                <option value ="">Select Category</option>
                @if(!empty($category3))
               
                <option value ="{{$category3->id}}">{{$category3->name}}</option>
               
                @endif

                @if ($errors->has('category_id'))
                <span class="error">{{ $errors->first('category_id') }}</span>
                @endif 
              </select>  
             
            </div>
            
            
            <div class="form-group col-md-6">
              <label for="name">Nominee Name</label>
              <select  class="form-control" name="candidate_id" id="name" >
                <option value ="">Select Nominie</option>
                @if(!empty($candidate3))
                @foreach($candidate3 as $value)
                  <option value ="{{$value->id}}">{{$value->name}}</option>
                @endforeach
                @endif

                @if ($errors->has('candidate_id'))
                <span class="error">{{ $errors->first('candidate_id') }}</span>
                @endif 
              </select>  
             
            </div>  
              
            
          </div>
    
          <div class="text-center"><button type="submit">Submit</button></div>
        </form>
      </div>

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