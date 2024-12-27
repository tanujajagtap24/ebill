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
                        @foreach ($brandData as $data)
                          <option value="{{ $data->Brand_Name }}">  {{ $data->Brand_Name }}  </option>
                        @endforeach
                      </select>                    
                    </div>

                    <div class="col-lg-3">
                      <label for="">Tax %</label>
                      <select name="tax_percent" id="tax_percent" class="form-control" oninput="Final_1(), Final_2(), final_3(), final_4()">
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
                    <label for=""> Alternate Unit </label>
                    <select name="a_unit" id="a_unit" class="form-control" >
                      <option value=""> Select </option>
                      <option value="Nos"> Nos </option>
                      <option value="Kg"> Kg </option>
                      <option value="Litre"> Litre </option>
                    </select>
                  </div>

                  <div class="col-lg-4">
                    <label for=""> Conversion Factor  </label>
                    <input type="text" name="c_factor" class="form-control" id="c_factor" placeholder="Enter Conversion Factor">
                  </div>
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer text-center">
                <table id="dynamicTable">
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
                  </tr>
                  <tbody>
                  <tr>
                    <td> <input type="text" class="form-control" id="barcode_1" name="barcode_1"> </td>
                    <td> <input type="text" class="form-control" id="rate_1" name="rate_1" oninput="Final_1()"> </td>
                    <td> <input type="text" class="form-control" id="qty_1" name="qty_1" oninput="Final_1()"> </td>
                    <td> <input type="text" class="form-control" id="total_1" name="total_1" readonly> </td>
                    <td> <input type="text" class="form-control" id="dis_percent_1" name="dis_percent_1" oninput="Final_1()"> </td>
                    <td> <input type="text" class="form-control" id="dis_value_1" name="dis_value_1" readonly> </td>
                    <td> <input type="text" class="form-control" id="fin_value_1" name="fin_value_1" readonly> </td>
                    <td> <input type="date" class="form-control" id="mfg_1" name="mfg_1"> </td>
                    <td> <input type="date" class="form-control" id="exp_1" name="exp_1"> </td>
                  </tr>
                  <tr>
                    <td> <input type="text" class="form-control" id="barcode_2" name="barcode_2"> </td>
                    <td> <input type="text" class="form-control" id="rate_2" name="rate_2" oninput="Final_2()"> </td>
                    <td> <input type="text" class="form-control" id="qty_2" name="qty_2" oninput="Final_2()"> </td>
                    <td> <input type="text" class="form-control" id="total_2" name="total_2" readonly> </td>
                    <td> <input type="text" class="form-control" id="dis_percent_2" name="dis_percent_2" oninput="Final_2()"> </td>
                    <td> <input type="text" class="form-control" id="dis_value_2" name="dis_value_2" readonly> </td>
                    <td> <input type="text" class="form-control" id="fin_value_2" name="fin_value_2" readonly> </td>
                    <td> <input type="date" class="form-control" id="mfg_2" name="mfg_2"> </td>
                    <td> <input type="date" class="form-control" id="exp_2" name="exp_2"> </td>
                  </tr>
                  <tr>
                    <td> <input type="text" class="form-control" id="barcode_3" name="barcode_3"> </td>
                    <td> <input type="text" class="form-control" id="rate_3" name="rate_3" oninput="Final_3()"> </td>
                    <td> <input type="text" class="form-control" id="qty_3" name="qty_3" oninput="Final_3()"> </td>
                    <td> <input type="text" class="form-control" id="total_3" name="total_3" readonly> </td>
                    <td> <input type="text" class="form-control" id="dis_percent_3" name="dis_percent_3" oninput="Final_3()"> </td>
                    <td> <input type="text" class="form-control" id="dis_value_3" name="dis_value_3" readonly> </td>
                    <td> <input type="text" class="form-control" id="fin_value_3" name="fin_value_3" readonly> </td>
                    <td> <input type="date" class="form-control" id="mfg_3" name="mfg_3"> </td>
                    <td> <input type="date" class="form-control" id="exp_3" name="exp_3"> </td>
                  </tr>
                  <tr>
                    <td> <input type="text" class="form-control" id="barcode_4" name="barcode_4"> </td>
                    <td> <input type="text" class="form-control" id="rate_4" name="rate_4" oninput="Final_4()"> </td>
                    <td> <input type="text" class="form-control" id="qty_4" name="qty_4" oninput="Final_4()"> </td>
                    <td> <input type="text" class="form-control" id="total_4" name="total_4" readonly> </td>
                    <td> <input type="text" class="form-control" id="dis_percent_4" name="dis_percent_4" oninput="Final_4()"> </td>
                    <td> <input type="text" class="form-control" id="dis_value_4" name="dis_value_4" readonly> </td>
                    <td> <input type="text" class="form-control" id="fin_value_4" name="fin_value_4" readonly> </td>
                    <td> <input type="date" class="form-control" id="mfg_4" name="mfg_4"> </td>
                    <td> <input type="date" class="form-control" id="exp_4" name="exp_4"> </td>
                  </tr>
                  
                  </tbody>
                </table>
                <div class="float-right pt-4">
                  <button type="submit" class="btn btn-success" ><i class="nav-icon fas fa-save"> </i> Save</button>
                  <a href="/admin/product/list" class="btn btn-danger"><i class="nav-icon fas fa-times "></i> Close</a>
                </div>
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
  function Final_1()
  {
    var Rate_1 = parseFloat(document.getElementById('rate_1').value);
    var quantity_1 = parseFloat(document.getElementById('qty_1').value);

    // Calculate Total
    var Total_1 = Rate_1 * quantity_1;
    document.getElementById('total_1').value = Total_1;

    var percent_1 = parseFloat(document.getElementById('dis_percent_1').value);

    // Calculate Discount Value
    var discount_value_1 = (percent_1 / 100) * Total_1;
    document.getElementById('dis_value_1').value = discount_value_1;

    // Value After Applying Discount
    var amount_1 = Total_1 - discount_value_1;

    // Calculate Tax Value
    var tax_per = parseFloat(document.getElementById('tax_percent').value);
    var tax_value_1 = (tax_per / 100) * amount_1;

    // Calculate Final Amount
    var final_1 = amount_1 + tax_value_1;
    document.getElementById('fin_value_1').value = final_1;
  }

  function Final_2()
  {
    var Rate_2 = parseFloat(document.getElementById('rate_2').value);
    var quantity_2 = parseFloat(document.getElementById('qty_2').value);

    // Calculate Total
    var Total_2 = Rate_2 * quantity_2;
    document.getElementById('total_2').value = Total_2;

    var percent_2 = parseFloat(document.getElementById('dis_percent_2').value);

    // Calculate Discount Value
    var discount_value_2 = (percent_2 / 100) * Total_2;
    document.getElementById('dis_value_2').value = discount_value_2;

    // Value After Applying Discount
    var amount_2 = Total_2 - discount_value_2;

    // Calculate Tax Value
    var tax_per = parseFloat(document.getElementById('tax_percent').value);
    var tax_value_2 = (tax_per / 100) * amount_2;

    // Calculate Final Amount
    var final_2 = amount_2 + tax_value_2;
    document.getElementById('fin_value_2').value = final_2;
  }

  function Final_3()
  {
    var Rate_3 = parseFloat(document.getElementById('rate_3').value);
    var quantity_3 = parseFloat(document.getElementById('qty_3').value);

    // Calculate Total
    var Total_3 = Rate_3 * quantity_3;
    document.getElementById('total_3').value = Total_3;

    var percent_3 = parseFloat(document.getElementById('dis_percent_3').value);

    // Calculate Discount Value
    var discount_value_3 = (percent_3 / 100) * Total_3;
    document.getElementById('dis_value_3').value = discount_value_3;

    // Value After Applying Discount
    var amount_3 = Total_3 - discount_value_3;

    // Calculate Tax Value
    var tax_per = parseFloat(document.getElementById('tax_percent').value);
    var tax_value_3 = (tax_per / 100) * amount_3;

    // Calculate Final Amount
    var final_3 = amount_3 + tax_value_3;
    document.getElementById('fin_value_3').value = final_3;
  }

  function Final_4()
  {
    var Rate_4 = parseFloat(document.getElementById('rate_4').value);
    var quantity_4 = parseFloat(document.getElementById('qty_4').value);

    // Calculate Total
    var Total_4 = Rate_4 * quantity_4;
    document.getElementById('total_4').value = Total_4;

    var percent_4 = parseFloat(document.getElementById('dis_percent_4').value);

    // Calculate Discount Value
    var discount_value_4 = (percent_4 / 100) * Total_4;
    document.getElementById('dis_value_4').value = discount_value_4;

    // Value After Applying Discount
    var amount_4 = Total_4 - discount_value_4;

    // Calculate Tax Value
    var tax_per = parseFloat(document.getElementById('tax_percent').value);
    var tax_value_4 = (tax_per / 100) * amount_4;

    // Calculate Final Amount
    var final_4 = amount_4 + tax_value_4;
    document.getElementById('fin_value_4').value = final_4;
  }

  


</script>