@extends("admin\master")

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <div class="d-flex justify-content-between">
                <h1> Customer Management </h1>
                <a href="/admin/customer/create" class="btn btn-success"> Add Customer</a>
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
             <table class="table table-striped">
                <thead>
                  <th>#</th>
                  <th>Customer Name</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>City</th>
                  <th>Pincode</th>
                  <th>Customer Group</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($CustomerData as $data)
                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $data->Customer_Name }} </td>
                    <td> {{ $data->Mobile_Number }} </td>   
                    <td> {{ $data->Email }} </td>     
                    <td> {{ $data->City }} </td> 
                    <td> {{ $data->Pincode }} </td>       
                    <td> {{ $data->Group }} </td>         
                    <td>
                      <a class="btn btn-primary" href="/admin/customer/view/{{ $data->id }}"> View </a>
                      <a class="btn btn-secondary" href="/admin/customer/edit/{{ $data->id }}"> Edit </a>
                      <a class="btn btn-danger" href="/admin/customer/delete/{{ $data->id }}"> Delete </a>
                    </td>               
                  </tr>
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