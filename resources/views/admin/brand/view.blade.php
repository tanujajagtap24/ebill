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
                <h1> <b>Brand</b> </h1>
              </div>
              <div class="card-body">
              <table class="table table-striped">
                <tr>
                  <td>  <b> {{ $viewData->Brand_Name }} </b> </td>
                </tr>
             </table>
              </div>
              <div class="card-footer">
                <a href="/admin/brand/list" class="btn btn-danger"><i class="nav-icon fas fa-times "></i> Close</a>
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