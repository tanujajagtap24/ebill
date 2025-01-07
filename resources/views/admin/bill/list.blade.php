@extends('admin\master')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-12">
                        <h1 class="text-center"> <strong> Bill List Management </strong> </h1>
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
                            <table class="table table-striped">
                                <thead>
                                    <th>#</th>
                                    <th>Bill Date</th>
                                    <th>Customer Name</th>
                                    <th>Mobile</th>
                                    <th>City</th>
                                    <th>Pincode</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;
                                    ?>
                                    @foreach ($billData as $bill)
                                        @foreach ($customerData as $customer)
                                            @if ($bill->customer_id == $customer->id)
                                                <tr>
                                                    <td>{{ $count }}</td>
                                                    <td>{{ $bill->bill_date }}</td>
                                                    <td>{{ $customer->Customer_Name }}</td>
                                                    <td> {{ $customer->Mobile_Number }} </td>
                                                    <td> {{ $customer->City }} </td>
                                                    <td> {{ $customer->Pincode }} </td>
                                                    <td> <a href="/admin/bill/view/{{$bill->id}}"><i
                                                      class="nav-icon fas fa-eye"></i></a>
                                                      
                                                <?php
                                                $count++;
                                                ?>
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
