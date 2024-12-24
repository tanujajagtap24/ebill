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
                        <h1> Edit Category</h1>
                        <a href="/admin/category/list" class="btn btn-success"> Category List</a>
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
                        <form action="/admin/city/update" method="post">
                            @csrf
                            <div class="card-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input type="hidden" name="city_id" id="city_id" class="form-control"
                                                value="{{$editdata->id}}">
                                            <label for="">City Name</label>
                                            <input type="text" class="form-control" id="city_name" name="city_name"
                                                value="{{$editdata->city_Name}}">
                                                <label for="">PinCode</label>
                                            <input type="text" class="form-control" id="pincode" name="pincode"
                                                value="{{$editdata->Pin_Code}}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-success">Update</button>
                                <button type="reset" class="btn btn-primary">Reset</button>
                                <a href="/admin/city/list" class="btn btn-secondary"> Back</a>
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