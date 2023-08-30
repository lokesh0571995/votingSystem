@extends('admin-view.layouts.main')
@section('title')
<title>Candidate</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Candidate List</h5>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div>
                        <div class="table-responsive table-desi table-product">
                            <table id="example" class="table table-1d all-package" id="example">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                       
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($candidateList as $value)
                                    <tr>

                                    
                                        <td>
                                           {{$value->name ?? "-"}}
                                        </td>

                                        <td>
                                           {{$value->category->name ?? "-"}}
                                        </td>

                                        <td>
                                            @if(!empty($value->image))
                                            <img src="{{env('IMAGE_URL')."candidate"}}/{{$value->image}}" class="img-fluid"
                                                alt="" width="10%">
                                            @else
                                            <img src="{{asset('admin_site/assets/images/profile/4.jpg')}}" class="img-fluid"
                                                alt="">
                                            @endif    
                                        </td>


                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="{{url('admin/candidate/view')}}/{{base64_encode($value->id)}}">
                                                        <span class="lnr lnr-eye"></span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{url('admin/candidate/edit')}}/{{base64_encode($value->id)}}">
                                                        <span class="lnr lnr-pencil"></span>
                                                    </a>
                                                </li>

                                                <li>
                                                    <a href="{{url('admin/candidate/delete')}}/{{base64_encode($value->id)}}">
                                                        <i class="far fa-trash-alt theme-color"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                </tbody>
                                @php($i++)
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


</div>

<script>

    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

@endsection