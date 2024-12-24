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
                <h1> City Management </h1>
                <a href="/admin/city/create" class="btn btn-success"> Add City</a>
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
                  <th>City Name</th>
                  <th>pincode</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($CityData as $data)
                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $data->city_Name }} </td>
                    <td> {{ $data->Pin_Code }} </td>
                    <td>
                      <a class="btn btn-primary" href="/admin/city/view/{{ $data->id }}"> View </a>
                      <a class="btn btn-secondary" href="/admin/city/edit/{{ $data->id }}"> Edit </a>
                      <a class="btn btn-danger" href="/admin/city/delete/{{ $data->id }}"> Delete </a>
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