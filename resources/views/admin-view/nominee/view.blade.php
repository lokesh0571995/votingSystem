@extends('admin-view.layouts.main')
@section('title')
<title>Nominie</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Nominie Information</h5>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi table-product">
                           
                                <div class ="">
                                        <td>
                                           Niminie Name : {{$nominee->candidate->name ?? "-"}}
                                        </td>
                                        <br> 
                                        <br>
                                        <td>
                                            Category : {{$nominee->category->name ?? "-"}}
                                        </td>
                                        <br> 
                                        <br> 
                                        <td>Image :
                                            @if(!empty($nominee->candidate->image))
                                            <img src="{{env('IMAGE_URL')."candidate"}}/{{$nominee->candidate->image}}" class="img-fluid"
                                                alt="" width="50px" height="50px">
                                            @else
                                            <img src="{{asset('admin_site/assets/images/profile/4.jpg')}}" class="img-fluid"
                                                alt="">
                                            @endif    
                                        </td>
                                        <br> 
                                        <br>
                                        <td>
                                           Voter Name : {{$nominee->user->name ?? "-"}}
                                        </td>
                                        
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