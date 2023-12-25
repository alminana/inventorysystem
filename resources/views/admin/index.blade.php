@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Dashboard</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);"></a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

</div>
</div>
</div>
<!-- end page title -->

<div class="row">
<div class="col-xl-4 col-md-4">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <h4 class="card-title mb-4">Daily Sales</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; ">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Amount</th>
                            </tr>
                        </thead><!-- end thead -->
                        <tbody>
                            @foreach($allData as $key => $item)
                          
                                <td style="color">  </td> 
                                <td style="color"></td> 
                              
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table> <!-- end table -->
                </div>            
            </div>
        </div>                                            
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-4 col-md-4">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <h4 class="card-title mb-4">Pending Invoice</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; ">
                        <thead class="table-light">
                            <tr>
                                <th>Date</th>
                                <th>Invoice No.</th>
                            </tr>
                        </thead><!-- end thead -->
                        <tbody>
                            @foreach($allData as $key => $item)
                          
                                <td style="color">  </td> 
                                <td style="color"></td> 
                              
                            @endforeach
                        </tbody><!-- end tbody -->
                    </table> <!-- end table -->
                </div>            
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-4 col-md-4">
    <div class="card">
        <div class="card-body">
            <div class="d-flex">
                <div class="flex-grow-1">
                    <h4 class="card-title mb-4">Pending Purchase</h4>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; ">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead><!-- end thead -->
                            <tbody>
                                @foreach($allData as $key => $item)
                              
                                    <td style="color">  </td> 
                                    <td style="color"></td> 
                                  
                                @endforeach
                            </tbody><!-- end tbody -->
                        </table> <!-- end table -->
                    </div>            
                </div>
            </div>                                              
        </div><!-- end cardbody -->
    </div><!-- end card -->
    </div><!-- end col -->


<div class="row">
 

<div class="row">
    <div class="col-xl-12 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="dropdown float-end">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
         
        </div>

        <h4 class="card-title mb-4">Stock Status</h4>

        <div class="table-responsive">
            <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                <thead class="table-light">
                    <tr>
                        <th>Brand</th>
                        <th>Generic Name</th>
                        <th>Unit</th>
                        <th>Selling Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>
                </thead><!-- end thead -->
                <tbody>
                    @foreach($allData as $key => $item)
                    @php
                        $buying_total = App\Models\Purchase::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('buying_qty');
                        $selling_total = App\Models\InvoiceDetail::where('category_id',$item->category_id)->where('product_id',$item->id)->where('status','1')->sum('selling_qty');
                        $color = "";
                        if ($selling_total >= 0 ) {
									$color = "color:black;background-color:red;";
								}
                        @endphp
                        <td style="color"> {{ $item['category']['name'] }} </td> 
                        <td style="color"> {{ $item->name }} </td> 
                        <td style="color"> {{ $item['unit']['name'] }} </td> 
                        <td style="color"> <span> {{ $selling_total  }}</span> </td> 
                        <td style="color"> <span> {{ $item->quantity }}</span> </td> 
                        <td> 
                            <a href="{{ route('purchase.add') }}" class="btn btn-info sm" title="Add Stocks">  <i class="fas fa-plus"></i> </a>
                        </td> 
                        
                    @endforeach
                </tbody><!-- end tbody -->
            </table> <!-- end table -->
        </div>
    </div><!-- end card -->
</div>
<!-- end card -->
</div>
<!-- end col -->
 


</div>
<!-- end row -->
</div>

</div>

@endsection