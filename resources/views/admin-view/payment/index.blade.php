@extends('admin-view.layouts.main')
@section('title')
<title>Payment List</title>
@endsection
@section('content')
<!-- Container-fluid starts-->
<div class="page-body">
<div class="title-header">
    <h5>All Payment History List</h5>
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
                                        <th>Payment Method</th>
                                        <th>Payment Status</th>
                                        <th>Payment Amount</th>
                                    </tr>
                                </thead>

                                <tbody>
                                @php $i = 1; @endphp
                                @foreach($payments as $value)
                                    <tr>
                                        <td>
                                         {{$value->user->name ?? "-"}}
                                        </td>

                                        <td>
                                         {{$value->payment_method=="stripe" ? "Stripe" : "MTI Moobile"}}
                                        </td>

                                        <td>
                                         
                                            @if(!empty($value->payment_method))
                                             
                                            {{"Paid"}}
                                               
                                            @endif
                                        
                                        </td>

                                        <td>
                                        R {{$value->amount ?? "-"}}
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