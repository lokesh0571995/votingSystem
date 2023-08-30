@extends('admin-view.layouts.main')
@section('title')
<title>Candidate</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Candidate Information</h5>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi table-product">
                           
                                <div class ="">
                            
                                        <td>Image :
                                            @if(!empty($candidate->image))
                                            <img src="{{env('IMAGE_URL')."candidate"}}/{{$candidate->image}}" class="img-fluid"
                                                alt="" width="50px" height="50px">
                                            @else
                                            <img src="{{asset('admin_site/assets/images/profile/4.jpg')}}" class="img-fluid"
                                                alt="">
                                            @endif    
                                        </td>
                                        <br> 
                                        <br>
                                        <td>
                                            Name : {{$candidate->name ?? "-"}}
                                        </td>
                                        <br> 
                                        <br>
                                        <td>
                                            Category : {{$candidate->category->name ?? "-"}}
                                        </td>
                                        <br> 
                                        <!-- <td>
                                            Description :{!! $candidate->description ?? "-" !!}
                                        </td> -->
                                        <br> 
                                        
                                </div>
                               
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->
</div>
@endsection