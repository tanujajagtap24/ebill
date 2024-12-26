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
                <h1> <b>Product Information</b> </h1>
              </div>
              <div class="card-body">
              <table class="table table-striped">
                <tbody>
                  <tr>
                  <th>Product Name</th>
                  <td> {{ $viewData->Product_Name }} </td>
                  </tr>
                  <tr>
                    <th>Category</th>
                    <td> {{ $viewData->Product_Category }} </td>
                  </tr>
                  <tr>
                    <th>Quantity</th>
                    <td> {{ $viewData->Quantity }} </td>
                  </tr>
                  <tr>
                    <th>Rate</th>
                    <td> {{ $viewData->Rate }} </td> 
                  </tr>
                  <tr>
                    <th>Total</th>
                    <td> {{ $viewData->Total }} </td>       
                  </tr>
                  <tr>
                    <th>Discount %</th>
                    <td> {{ $viewData->Dis_Percent }} </td>
                  </tr>
                  <tr>
                    <th>Discount Value</th>
                    <td> {{ $viewData->Dis_Value }} </td>  
                  </tr>
                  <tr>
                    <th>  Tax %</th>
                    <td> {{ $viewData->Tax_Percent }} </td>  
                  </tr>
                  <tr>
                    <th>Final Value</th>
                    <td> {{ $viewData->Final_Value }} </td>  
                  </tr>
                  </tbody>
             </table>
              </div>
              <div class="card-footer">
              <a href="/admin/product/list" class="btn btn-secondary"> Back</a>
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