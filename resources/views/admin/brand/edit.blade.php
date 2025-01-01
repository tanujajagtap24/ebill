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
                        <h1> Edit Brand</h1>
                        <a href="/admin/brand/list" class="btn btn-success"> Brand List</a>
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
                <div class="col-3"></div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card shadow ">
                        <!-- form start -->
                        <form action="/admin/brand/update" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="hidden" name="brand_id" id="brand_id" class="form-control"
                                                value="{{$editData->id}}">
                                            <label for="">Brand Name</label>
                                            <input type="text" class="form-control" id="brand_name" name="brand_name"
                                                value="{{$editData->Brand_Name}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-save"> </i> Save</button>
                                <a href="/admin/brand/list" class="btn btn-danger"><i class="nav-icon fas fa-times "></i> Close</a>
                            </div>
                    </div>
                </div>
                <!-- /.card-body -->
                </form>
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