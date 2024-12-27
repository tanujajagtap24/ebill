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
                <h1> Brand Management </h1>
                <a href="/admin/brand/create" class="btn btn-success"> <i class="nav-icon fas fa-plus "></i> Add Brand</a>
            </div>
            <div class="pt-5">
              @if (session("success"))
              <div class="d-flex justify-content-between alert alert-success" role="alert">
                {{ session("success")}}
                <button type="button" class="close" data-dismiss="alert" aria-label="close"><span> &times;</span></button>
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
             <table class="table table-striped">
                <thead>
                  <th>#</th>
                  <th>Brand Name</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($BrandData as $data)
                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $data->Brand_Name }} </td>
                    <td>
                      <a class="btn btn-primary" href="/admin/brand/view/{{ $data->id }}"> <i class="nav-icon fas fa-eye"></i> View </a>
                      <a class="btn btn-secondary" href="/admin/brand/edit/{{ $data->id }}"> <i class="nav-icon fas fa-edit"></i> Edit </a>
                      <a class="btn btn-danger" href="/admin/brand/delete/{{ $data->id }}"> <i class="nav-icon fas fa-trash"></i>  Delete </a>
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