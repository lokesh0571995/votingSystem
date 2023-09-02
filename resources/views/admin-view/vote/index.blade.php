@extends('admin-view.layouts.main')
@section('title')
<title>Vote List</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>All Voter Nominie Vote History</h5>
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
                                        <th>Voter Name</th>
                                        <th>Nominie Name</th>
                                        <th>Nomine Category</th>
                                        <th>Vote Count</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($voteList as $value)
                                    <tr>
                                        <td>
                                         {{$value->user->name ?? "-"}}
                                        </td>

                                        <td>
                                         {{$value->candidate->name ?? "-"}}
                                        </td>

                                        <td>
                                         {{$value->candidate->category->name ?? "-"}}
                                        </td>


                                        <td>
                                         1
                                        </td>
                                        <!-- <td>
                                            <ul>
                                                <li>
                                                    <a href="{{url('admin/voter/view')}}/{{base64_encode($value->id)}}">
                                                        <span class="lnr lnr-eye"></span>
                                                    </a>
                                                </li>
                                                
                                                <li>
                                                    <a href="{{url('admin/vote/delete')}}/{{base64_encode($value->id)}}">
                                                        <i class="far fa-trash-alt theme-color"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td> -->
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