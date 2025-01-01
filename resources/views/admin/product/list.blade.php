@extends('admin\master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <div class="d-flex justify-content-between">
                            <h1> Product Management </h1>
                            <a href="/admin/product/create" class="btn btn-success"> <i class="nav-icon fas fa-plus "></i> Add Product</a>
                        </div>
                        <div class="pt-5">
                            @if (session('success'))
                                <div class="d-flex justify-content-between alert alert-success" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="close"><span>
                                            &times;</span></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card ">
                            <!-- form start -->
                            <table class="table  table-bordered">
                                <thead>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Category</th>
                                    <th>Brand</th>
                                    <th>Tax %</th>
                                    <th>Quantity</th>
                                    <th>Rate</th>
                                    <th>Discount %</th>
                                    <th>Final Value</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                        @foreach ($masterData as $master)
                                        @foreach ($childData as $child)
                                        @if ($master->id == $child->product_master_id)
                                        <tr>
                                            {{-- <td rowspan="4"> {{ $loop->iteration }} </td> --}}
                                            <td rowspan="4"> {{ $master->id }} </td>

                                            <td rowspan="4"> {{ $master->Product_Name }} </td>
                                            <td rowspan="4"> {{ $master->Product_Category }} </td>
                                            <td rowspan="4">{{ $master->Product_Brand }}</td>
                                            <td rowspan="4"> {{ $master->Tax_Percent }} </td>
                                        

                                    
                                        <td> {{ $child->Quantity_1 }} </td>
                                        <td> {{ $child->Rate_1 }} </td>
                                        <td> {{ $child->Dis_Percent_1 }} </td>
                                        <td> {{ $child->Final_Value_1 }} </td>
                                        <td>
                                            <a class="btn btn-primary" href="/admin/product/view/{{ $master->id }}"> <i class="nav-icon fas fa-eye"></i> View </a>
                                            <a class="btn btn-secondary" href="/admin/product/edit/{{ $master->id }}"> <i class="nav-icon fas fa-edit"></i> Edit </a>
                                            <a class="btn btn-danger" href="/admin/product/delete/{{ $master->id }}"> <i class="nav-icon fas fa-trash"></i> Delete </a>
                                          </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $child->Quantity_2 }} </td>
                                        <td> {{ $child->Rate_2 }} </td>
                                        <td> {{ $child->Dis_Percent_2 }} </td>
                                        <td> {{ $child->Final_Value_2 }} </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $child->Quantity_3 }} </td>
                                        <td> {{ $child->Rate_3 }} </td>
                                        <td> {{ $child->Dis_Percent_3 }} </td>
                                        <td> {{ $child->Final_Value_3 }} </td>
                                    </tr>
                                    <tr>
                                        <td> {{ $child->Quantity_4 }} </td>
                                        <td> {{ $child->Rate_4 }} </td>
                                        <td> {{ $child->Dis_Percent_4 }} </td>
                                        <td> {{ $child->Final_Value_4 }} </td>
                                    </tr>
                                        @endif
                                       
                                            


                                    @endforeach
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                        <!-- /.card -->







                    </div>
                    <!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
