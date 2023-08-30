@extends('admin-view.layouts.main')
@section('title')
<title>Candidate</title>
@endsection
@section('content')

<!--begin::Row-->
<div class="page-body">
<div class="title-header">
    <h5>Add New Candidate</h5>
</div>

<!-- New Product Add Start -->
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="row">
            <form class="theme-form theme-form-2 mega-form" action="{{url('admin/candidate/store')}}" method="POST" enctype="multipart/form-data">
             @csrf
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-header-2">
                                <h5>Candidate Information</h5>
                            </div>

                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Name</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text"
                                                placeholder="Candidate Name" name = "name" value="{{old('name')}}">
                                             
                                                @if ($errors->has('name'))
                                                    <span class="error">{{ $errors->first('name') }}</span>
                                                @endif    
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label class="form-label-title col-sm-2 mb-0">
                                            Category</label>
                                        <div class="col-sm-10">
                                            <select class="form-control"  name = "category_id" >
                                               
                                               <option value="">Select Category</option>
                                               @if(!empty($category))
                                               @foreach($category as $value)
                                               <option value ="{{$value->id}}">{{$value->name ?? "-"}}</option>
                                               @endforeach
                                               @endif
                                            </select>
                                             
                                                @if ($errors->has('category_id'))
                                                    <span class="error">{{ $errors->first('category_id') }}</span>
                                                @endif    
                                        </div>
                                    </div>

                                </div>
                                <!-- <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-2 mb-0">
                                                Description</label>
                                            <div class="col-sm-10">
                                                <textarea name ="description" class="form-control"  placeholder ="Description">{{old('description')}}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="error">{{ $errors->first('description') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="row">
                                    <div class="mb-4 row align-items-center">
                                        <label
                                            class="form-label-title col-sm-2 mb-0">Image</label>
                                        <div class="col-sm-10">
                                            <input class="form-control form-choose" type="file"
                                                 name ="image">
                                                 @if ($errors->has('image'))
                                                    <span class="error">{{ $errors->first('image') }}</span>
                                                @endif 
                                        </div>
                                    </div>

                                </div>
                            <!-- </form> -->
                        </div>
                    </div>

                    <div class="text-center" >
                        <button class=" btn btn-success" type="submit" >
                            <span>Submit</span>
                        </button>
                    </div>
                    <br>
                </div>
            </form>    
            </div>
        </div>
    </div>
</div>

<style>
.error{
    color:red;
}
</style>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'description' );
</script> 
@endsection

