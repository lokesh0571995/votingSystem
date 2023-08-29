@extends('admin-view.layouts.main')
@section('title')
<title>Voter</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Voter Information</h5>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi table-product">
                           
                                <div class ="">
                                        <br> 
                                        <td>
                                            Name : {{$voter->name ?? "-"}}
                                        </td>
                                        <br> 
                                        <td>
                                            Email :{{ $voter->email ?? "-"}}
                                        </td>
                                        <br> 
                                        <td>
                                            User Type :{{$voter->user_type ?? "-"}}
                                        </td>
                                        
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