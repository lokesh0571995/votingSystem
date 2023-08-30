@extends('admin-view.layouts.main')
@section('title')
<title>Rejected Nominee</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>Rejected Nominee List</h5>
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
                                        <th>Nominie Name</th>
                                        <th>Voter Name</th>
                                        <th>Category</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($nomineeList as $value)
                                    <tr>

                                    
                                        <td>
                                           {{$value->candidate->name ?? "-"}}
                                        </td>

                                        <td>
                                           {{$value->user->name ?? "-"}}
                                        </td>

                                        <td>
                                           {{$value->category->name ?? "-"}}
                                        </td>
                                        <td>
                                           @if($value->status==0)
                                                
                                                <div >
                                                <a href="javascript:;"  class="btn btn-danger">Rejected</a>
                                                </div>
                                            @endif
                                        </td>
                                        <td>
                                            <ul>
                                              
                                                <li>
                                                    <a href="{{url('admin/nominie/view')}}/{{base64_encode($value->id)}}">
                                                        <span class="lnr lnr-eye"></span>
                                                    </a>
                                                </li>

                                                <!-- <li>
                                                    <a href="{{url('admin/nominie/delete')}}/{{base64_encode($value->id)}}">
                                                        <i class="far fa-trash-alt theme-color"></i>
                                                    </a>
                                                </li> -->
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