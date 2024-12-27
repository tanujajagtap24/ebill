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
            <h1> Create New Product</h1>
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
          <div class="card">
            <!-- form start -->
            <form action="/admin/product/store" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                    <div class="col-lg-6">
                      <label for="">Product Name</label>
                      <input type="text" class="form-control" id="product_name" name="product_name">
                    </div>
                    <div class="col-lg-6">
                      <label for="">HSN Code</label>
                      <input type="text" class="form-control" id="hsn" name="hsn" placeholder="Enter HSN Code">
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="col-lg-3">
                      <div class="d-flex justify-content-between">
                        <label for="">Category</label>
                        <a href="/admin/category/create" class="btn btn-success"> <i class="nav-icon fas fa-plus "></i> </a>
                      </div>
                      <select name="p_cat" id="p_cat" class="form-control">
                        <option value=""> Select Category  </option>
                        @foreach ($catData as $data)
                          <option value="{{ $data->Category_Name }}">  {{ $data->Category_Name }}  </option>
                        @endforeach
                      </select>                    
                    </div>

                    <div class="col-lg-3">
                      <div class="d-flex justify-content-between">
                        <label for="">Brand</label>
                        <a href="/admin/brand/create" class="btn btn-success"> <i class="nav-icon fas fa-plus "></i> </a>
                      </div>
                      <select name="p_brand" id="p_brand" class="form-control">
                        <option value=""> Select Brand  </option>
                        @foreach ($catData as $data)
                          <option value="{{ $data->Category_Name }}">  {{ $data->Category_Name }}  </option>
                        @endforeach
                      </select>                    
                    </div>

                    <div class="col-lg-3">
                      <label for="">Tax %</label>
                      <select name="tax_percent" id="tax_percent" class="form-control" oninput="Final()">
                        <option value=""> Select Tax Percentage  </option>
                        @foreach ($taxData as $data)
                          <option value="{{ $data->Tax_Percentage }}">  {{ $data->Tax_Percentage }}  </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-lg-3">
                      <label for="">Tax Type</label>
                      <select name="tax_type" id="tax_type" class="form-control">
                        <option value=""> Select Tax Type  </option>
                        <option value="Inclusive Tax"> Inclusive Tax </option>
                        <option value="Exclusive Tax"> Exclusive Tax </option>
                      </select>
                    </div>
                  </div>

                <div class="row pt-3">
                  <div class="col-lg-4">
                    <label for=""> Primary Unit </label>
                    <select name="p_unit" id="p_unit" class="form-control" >
                      <option value=""> Select  </option>
                      <option value="Nos"> Nos </option>
                      <option value="Kg"> Kg </option>
                      <option value="Litre"> Litre </option>
                    </select>
                  </div>

                  <div class="col-lg-4">
                    <label for=""> Primary Unit </label>
                    <select name="a_unit" id="a_unit" class="form-control" >
                      <option value=""> Select </option>
                      <option value="Nos"> Nos </option>
                      <option value="Kg"> Kg </option>
                      <option value="Litre"> Litre </option>
                    </select>
                  </div>

                  <div class="col-lg-4">
                    <label for=""> Conversion Factor  </label>
                    <input type="text" name="c_factor" id="c_factor" placeholder="Enter Conversion Factor">
                  </div>

                  <div class="row pt-3">
                    <div class="col-lg-4">
                      <label for="">Barcode</label> 
                      <input type="text" class="form-control" id="barcode" name="barcode">
                    </div>
                    <div class="col-lg-4">
                      <label for="">Rate</label>
                      <input type="text" class="form-control" id="rate" name="rate" oninput="Final()">
                    </div>
                    <div class="col-lg-4">
                      <label for="">Quantity</label> 
                      <input type="text" class="form-control" id="qty" name="qty" oninput="Final()">
                    </div>
                    <div class="col-lg-4">
                      <label for="">Total</label>
                      <input type="text" class="form-control" id="total" name="total" readonly>
                    </div>
                    <div class="col-lg-3">
                      <label for="">Discount %</label>
                      <input type="text" class="form-control" id="dis_percent" name="dis_percent" oninput="Final()">
                    </div>
                    <div class="col-lg-3">
                      <label for="">Discount Value</label>
                      <input type="text" class="form-control" id="dis_value" name="dis_value" readonly>
                    </div>
                    <div class="col-lg-3">
                      <label for="">Final Value</label>
                      <input type="text" class="form-control" id="fin_value" name="fin_value" readonly>
                    </div>
                    <div class="col-lg-3">
                      <label for="">MFG Date</label>
                      <input type="text" class="form-control" id="mfg" name="mfg" readonly>
                    </div>
                    <div class="col-lg-3">
                      <label for="">Expiry Date</label>
                      <input type="text" class="form-control" id="exp" name="exp" readonly>
                    </div>

                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer text-center">
                <table>
                  <tr>
                    <th>Barcode</th>
                    <th>Rate</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Discount %</th>
                    <th>Discount Value</th>
                    <th>Final Value</th>
                    <th>Mfg Date</th>
                    <th>Exp Date</th>
                    <th>Action</th>
                  </tr>
                  <tr>
                    
                    <td> <input type="text" class="form-control" id="barcode" name="barcode"> </td>
                    <td> <input type="text" class="form-control" id="rate" name="rate" oninput="Final()"> </td>
                    <td> <input type="text" class="form-control" id="qty" name="qty" oninput="Final()"> </td>
                    <td> <input type="text" class="form-control" id="total" name="total" readonly> </td>
                    <td> <input type="text" class="form-control" id="dis_percent" name="dis_percent" oninput="Final()"> </td>
                    <td> <input type="text" class="form-control" id="dis_value" name="dis_value" readonly> </td>
                    <td> <input type="text" class="form-control" id="fin_value" name="fin_value" readonly> </td>
                    <td> <input type="date" class="form-control" id="mfg" name="mfg" readonly> </td>
                    <td> <input type="date" class="form-control" id="exp" name="exp" readonly> </td>
                    <td> <a href=""> Button </a> </td>
                  </tr>
                </table>
                <button type="submit" class="btn btn-success"><i class="nav-icon fas fa-save"> </i> Save</button>
                <a href="/admin/product/list" class="btn btn-secondary"><i class="nav-icon fas fa-times "></i> Close</a>
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

<script>
  function Final()
  {
    var rate = parseFloat(document.getElementById('rate').value);
    var quantity = parseFloat(document.getElementById('qty').value);

    // Calculate Total
    var Total = rate * quantity;
    document.getElementById('total').value = Total;

    var percent = parseFloat(document.getElementById('dis_percent').value);

    // Calculate Discount Value
    var discount_value = (percent / 100) * Total;
    document.getElementById('dis_value').value = discount_value;

    // Value After Applying Discount
    var amount = Total - discount_value;

    // Calculate Tax Value
    var tax_per = parseFloat(document.getElementById('tax_percent').value);
    var tax_value = (tax_per / 100) * amount;

    // Calculate Final Amount
    var final = amount + tax_value;
    document.getElementById('fin_value').value = final;
  }
</script>