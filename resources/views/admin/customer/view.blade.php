@extends("admin\master")

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="card shadow-lg text-center">
              <div class="card-header">
                <h1> <b>Customer Information</b> </h1>
              </div>
              <div class="card-body">
              <table class="table table-striped">
                <tbody>
                  <tr>
                  <th>Customer Name</th>
                  <td> {{ $viewData->Customer_Name }} </td>
                  </tr>
                  <tr>
                    <th>Mobile</th>
                    <td> {{ $viewData->Mobile_Number }} </td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td> {{ $viewData->Email }} </td>
                  </tr>
                  <tr>
                    <th>City</th>
                    <td> {{ $viewData->City }} </td> 
                  </tr>
                  <tr>
                    <th>Pincode</th>
                    <td> {{ $viewData->Pincode }} </td>       
                  </tr>
                  <tr>
                    <th>Address</th>
                    <td> {{ $viewData->Address }} </td>
                  </tr>
                  <tr>
                    <th>Customer Group</th>
                    <td> {{ $viewData->Group }} </td>  
                  </tr>
                  </tbody>
             </table>
              </div>
              <div class="card-footer">
              <a href="/admin/customer/list" class="btn btn-secondary"> Back</a>
              </div>
             
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