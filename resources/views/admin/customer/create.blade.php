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
            <h1> Create New Customer</h1>
            <a href="/admin/customer/list" class="btn btn-success"> Customer List</a>
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
          <div class="card">
            <!-- form start -->
            <form action="/admin/customer/store" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="">Customer Name</label>
                      <input type="text" class="form-control" id="cust_name" name="cust_name">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Customer Group</label>
                      <select name="cust_grp" id="cust_grp" class="form-control">
                        <option value=""> Select Group  </option>
                        @foreach ($groupData as $data)
                          <option value="{{ $data->Group_Name }}">  {{ $data->Group_Name }}  </option>
                        @endforeach
                      </select>                    
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="col-lg-6">
                      <label for="">City</label>
                      <select name="cust_city" id="cust_city" class="form-control">
                        <option value=""> Select City  </option>
                        @foreach ($cityData as $data)
                          <option value="{{ $data->city_Name }}" >  {{ $data->city_Name }}  </option>
                        @endforeach
                      </select>
                    </div>
                    <div class="col-lg-6">
                      <label for="">Pincode</label>
                      <select name="cust_pin" id="cust_pin" class="form-control">
                        <option value=""> Select Pincode  </option>
                        @foreach ($cityData as $data)
                          <option value="{{ $data->Pin_Code }}">  {{ $data->Pin_Code }}  </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="col-lg-6">
                      <label for="">Mobile Number</label>
                      <input type="text" class="form-control" id="mob" name="mob">
                    </div>
                    <div class="col-lg-6">
                      <label for="">Email</label>
                      <input type="email" class="form-control" id="mail" name="mail">
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="col-lg-12">
                      <label for="">Address</label>
                      <textarea class="form-control" name="address" id="address"></textarea>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer text-center">
                <button type="submit" class="btn btn-success">Submit</button>
                <button type="reset" class="btn btn-primary">Reset</button>
                <a href="/admin/customer/list" class="btn btn-secondary"> Back</a>
              </div>
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
