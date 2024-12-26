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
                <h1> Product Management </h1>
                <a href="/admin/product/create" class="btn btn-success"> Add Product</a>
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
                  <th>Product Name</th>
                  <th>Category</th>
                  <th>Quantity</th>
                  <th>Rate</th>
                  <th>Discount %</th>
                  <th>Tax %</th>
                  <th>Final Value</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($CustomerData as $data)
                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $data->Product_Name }} </td>
                    <td> {{ $data->Product_Category }} </td>   
                    <td> {{ $data->Quantity }} </td>     
                    <td> {{ $data->Rate }} </td> 
                    <td> {{ $data->Dis_Percent }} </td>       
                    <td> {{ $data->Tax_Percent }} </td>  
                    <td> {{ $data->Final_Value }} </td>                
                    <td>
                      <a class="btn btn-primary" href="/admin/product/view/{{ $data->id }}"> View </a>
                      <a class="btn btn-secondary" href="/admin/product/edit/{{ $data->id }}"> Edit </a>
                      <a class="btn btn-danger" href="/admin/product/delete/{{ $data->id }}"> Delete </a>
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