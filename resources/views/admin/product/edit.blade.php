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
                        <h1> Edit Product</h1>
                        <a href="/admin/product/list" class="btn btn-success"> Product List</a>
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
            <form action="/admin/product/update" method="post">
              @csrf
              <div class="card-body">
                  <div class="form-group">
                    <input type="hidden" name="product_id" id="product_id" class="form-control"
                  value="{{$editData->id}}">
                    <div class="row">
                      <div class="col-lg-8">
                        <label for="">Product Name</label>
                        <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $editData->Product_Name }}">
                      </div>
                      <div class="col-lg-4">
                        <label for="">Category</label>
                        <select name="product_cat" id="product_cat" class="form-control">
                          <option value="{{ $editData->Product_Category }}"> {{ $editData->Product_Category }}  </option>
                          @foreach ($catData as $data)
                            <option value="{{ $data->Category_Name }}">  {{ $data->Category_Name }}  </option>
                          @endforeach
                        </select>                    
                      </div>
                    </div>
                    <div class="row pt-3">
                      <div class="col-lg-4">
                        <label for="">Quantity</label>
                        <input type="text" class="form-control" id="qty" name="qty" value="{{ $editData->Quantity }}">
                      </div>
                      <div class="col-lg-4">
                        <label for="">Rate</label>
                        <input type="text" class="form-control" id="rate" name="rate" value="{{ $editData->Rate }}">
                      </div>
                      <div class="col-lg-4">
                        <label for="">Total</label>
                        <input type="text" class="form-control" id="total" name="total" value="{{ $editData->Total }}">
                      </div>
                    </div>
                    <div class="row pt-3">
                      <div class="col-lg-3">
                        <label for="">Discount %</label>
                        <input type="text" class="form-control" id="dis_percent" name="dis_percent" value="{{$editData->Dis_Percent}}">
                      </div>
                      <div class="col-lg-3">
                        <label for="">Discount Value</label>
                        <input type="text" class="form-control" id="dis_value" name="dis_value" value="{{ $editData->Dis_Value }}">
                      </div>
                      <div class="col-lg-3">
                        <label for="">Tax %</label>
                        <select name="tax_percent" id="tax_percent" class="form-control">
                          <option value="{{ $editData->Tax_Percent }}"> {{ $editData->Tax_Percent }} </option>
                          @foreach ($taxData as $data)
                            <option value="{{ $data->Tax_Percentage }}">  {{ $data->Tax_Percentage }}  </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-lg-3">
                        <label for="">Final Value</label>
                        <input type="text" class="form-control" id="fin_value" name="fin_value" value="{{ $editData->Final_Value }}">
                      </div>
                    </div>
                  </div>
              </div>
              <!-- /.card-body -->



                    <div class="card-footer text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                        <button type="reset" class="btn btn-primary">Reset</button>
                        <a href="/admin/product/list" class="btn btn-secondary"> Back</a>
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