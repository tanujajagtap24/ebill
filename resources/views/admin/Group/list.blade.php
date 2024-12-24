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
                <h1> Group Management </h1>
                <a href="/admin/group/create" class="btn btn-success"> Add Group</a>
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
                  <th>Group Name</th>
                  <th>Action</th>
                </thead>
                <tbody>
                  @foreach ($GroupData as $data)
                  <tr>
                    <td> {{ $loop->iteration }} </td>
                    <td> {{ $data->Group_Name }} </td>
                    
                    <td>
                      <a class="btn btn-primary" href="/admin/group/view/{{ $data->id }}"> View </a>
                      <a class="btn btn-secondary" href="/admin/group/edit/{{ $data->id }}"> Edit </a>
                      <a class="btn btn-danger" href="/admin/group/delete/{{ $data->id }}"> Delete </a>
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