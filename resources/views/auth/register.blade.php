@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Account All</h4>

                                     

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->
                        
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('register') }}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;"><i class="fas fa-plus-circle">  New Account </i></a> <br>  <br>               

                    <h4 class="card-title">Users All Data </h4>
                    

                    <form class="form-horizontal mt-3" method="POST" action="{{ route('register') }}">
                        @csrf
                    
                    <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control" id="name" type="text" name="name" required="" placeholder="Name">
                    </div>
                    </div>
                    
                    <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control" id="username" type="text" name="username" required="" placeholder="UserName">
                    </div>
                    </div>
                    
                    <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control" id="email" type="email" name="email" required="" placeholder="Email">
                    </div>
                    </div>
                    
                    <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control" id="password" type="password" name="password" required="" placeholder="Password">
                    </div>
                    </div>
                    
                    
                    <div class="form-group mb-3 row">
                    <div class="col-12">
                        <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required="" placeholder="Password Confirmation">
                    </div>
                    </div>
                    
                    <div class="form-group mb-3 row">
                    <div class="col-12">
                        <div class="custom-control custom-checkbox">
                            
                        </div>
                    </div>
                    </div>
                    
                    <div class="form-group text-center row mt-3 pt-1">
                    <div class="col-12">
                        <button class="btn btn-info w-100 waves-effect waves-light" type="submit">Register</button>
                    </div>
                    </div>
                    
                    <div class="form-group mt-2 mb-0 row">
                    <div class="col-12 mt-3 text-center">
                        <a href="{{ route('login') }}" class="text-muted">Already have account?</a>
                    </div>
                    </div>
                    </form>
                     
             
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->
        
                     
                        
                    </div> <!-- container-fluid -->
                </div>
 

@endsection

