@extends('admin.admin_master')
@section('admin')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



 <form method="post" action="{{ route('/store/profile') }}" id="myForm" enctype="multipart/form-data" >
    @csrf

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Customer Name </label>
        <div class="form-group col-sm-10">
            <input name="name" class="form-control" type="text"    >
        </div>
    </div>
    <!-- end row -->


    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Customer Mobile </label>
        <div class="form-group col-sm-10">
            <input name="mobile_no" class="form-control" type="text"    >
        </div>
    </div>
    <!-- end row -->


    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Customer ID </label>
        <div class="form-group col-sm-10">
            <input name="id_no" class="form-control" type="text"  >
        </div>
    </div>
    <!-- end row -->


    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Customer Address </label>
        <div class="form-group col-sm-10">
            <input name="address" class="form-control" type="text"  >
        </div>
    </div>
    <!-- end row -->

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">Customer Image </label>
        <div class="form-group col-sm-10">
    <input name="customer_image" class="form-control" type="file"  id="image">
        </div>
    </div>
    <!-- end row -->

    <div class="row mb-3">
        <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
        <div class="col-sm-10">
    <img id="showImage" class="rounded avatar-lg" src="{{  url('upload/no_image.jpg') }}" alt="Card image cap">
        </div>
    </div>
    <!-- end row -->

    <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Customer">
</form>
 
@endsection 
