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
          <div class="card">
            <!-- form start -->
            <form action="/admin/product/update" method="post">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <div class="row">
                  <input type="hidden" class="form-control" id="product_id" name="product_id" value="{{$masterData->id}}">
                  <input type="hidden" class="form-control" id="product_master_id" name="product_master_id" value="{{$childData->product_master_id}}">
                    <div class="col-lg-6">
                      <label for="">Product Name</label>
                      <input type="text" class="form-control" id="product_name" name="product_name" value="{{$masterData->Product_Name}}">
                    </div>
                    <div class="col-lg-6">
                      <label for="">HSN Code</label>
                      <input type="text" class="form-control" id="hsn" name="hsn" placeholder="Enter HSN Code"  value="{{$masterData->HSN_Code}}">
                    </div>
                  </div>
                  <div class="row pt-3">
                    <div class="col-lg-3">
                      <div class="d-flex justify-content-between">
                        <label for="">Category</label>
                        <a href="/admin/category/create" class="btn btn-success"> <i class="nav-icon fas fa-plus "></i> </a>
                      </div>
                      <select name="p_cat" id="p_cat" class="form-control">
                        <option value="{{$masterData->Product_Category}}">{{$masterData->Product_Category}} </option>
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
                        <option value="{{$masterData->Product_Brand}}">  {{$masterData->Product_Brand}}   </option>
                        @foreach ($brandData as $data)
                          <option value="{{ $data->Brand_Name }}">  {{ $data->Brand_Name }}  </option>
                        @endforeach
                      </select>                    
                    </div>

                    <div class="col-lg-3">
                      <label for="">Tax %</label>
                      <select name="tax_percent" id="tax_percent" class="form-control" oninput="Final()">
                        <option value="{{$masterData->Tax_Percent}}">   {{$masterData->Tax_Percent}} </option>
                        @foreach ($taxData as $data)
                          <option value="{{ $data->Tax_Percentage }}">  {{ $data->Tax_Percentage }}  </option>
                        @endforeach
                      </select>
                    </div>

                    <div class="col-lg-3">
                      <label for="">Tax Type</label>
                      <select name="tax_type" id="tax_type" class="form-control">
                        <option value="{{$masterData->Tax_Type}}">{{$masterData->Tax_Type}} </option>
                        <option value="Inclusive Tax"> Inclusive Tax </option>
                        <option value="Exclusive Tax"> Exclusive Tax </option>
                      </select>
                    </div>
                  </div>

                <div class="row pt-3">
                  <div class="col-lg-4">
                    <label for=""> Primary Unit </label>
                    <select name="p_unit" id="p_unit" class="form-control" >
                      <option value="{{$masterData->Primary_Unit}}"> {{$masterData->Primary_Unit}}  </option>
                      <option value="Nos"> Nos </option>
                      <option value="Kg"> Kg </option>
                      <option value="Litre"> Litre </option>
                    </select>
                  </div>

                  <div class="col-lg-4">
                    <label for=""> Alternate Unit </label>
                    <select name="a_unit" id="a_unit" class="form-control" >
                      <option value="{{$masterData->Alternate_Unit}}">{{$masterData->Alternate_Unit}}</option>
                      <option value="Nos"> Nos </option>
                      <option value="Kg"> Kg </option>
                      <option value="Litre"> Litre </option>
                    </select>
                  </div>

                  <div class="col-lg-4">
                    <label for=""> Conversion Factor  </label>
                    <input type="text" name="c_factor" class="form-control" id="c_factor" placeholder="Enter Conversion Factor" value="{{$masterData->Conversion_Factor}}">
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
                    <td> <input type="text" class="form-control" id="barcode_1" name="barcode_1" value="{{$childData->Barcode_1}}"> </td>
                    <td> <input type="text" class="form-control" id="rate_1" name="rate_1" oninput="Final_1()" value="{{$childData->Rate_1}}"> </td>
                    <td> <input type="text" class="form-control" id="qty_1" name="qty_1" oninput="Final_1()" value="{{$childData->Quantity_1}}"> </td>
                    <td> <input type="text" class="form-control" id="total_1" name="total_1" readonly value="{{$childData->Total_1}}"> </td>
                    <td> <input type="text" class="form-control" id="dis_percent_1" name="dis_percent_1" oninput="Final_1()" value="{{$childData->Dis_Percent_1}}"> </td>
                    <td> <input type="text" class="form-control" id="dis_value_1" name="dis_value_1" readonly value="{{$childData->Dis_Value_1}}"> </td>
                    <td> <input type="text" class="form-control" id="fin_value_1" name="fin_value_1" readonly value="{{$childData->Final_Value_1}}"> </td>
                    <td> <input type="date" class="form-control" id="mfg_1" name="mfg_1" value="{{$childData->Mfg_Date_1}}"> </td>
                    <td> <input type="date" class="form-control" id="exp_1" name="exp_1" value="{{$childData->Exp_Date_1}}"> </td>
                  </tr>
                  <tr>
                    <td> <input type="text" class="form-control" id="barcode_2" name="barcode_2" value="{{$childData->Barcode_2}}"> </td>
                    <td> <input type="text" class="form-control" id="rate_2" name="rate_2" oninput="Final_2()" value="{{$childData->Rate_2}}"> </td>
                    <td> <input type="text" class="form-control" id="qty_2" name="qty_2" oninput="Final_2()" value="{{$childData->Quantity_2}}"> </td>
                    <td> <input type="text" class="form-control" id="total_2" name="total_2" readonly value="{{$childData->Total_2}}"> </td>
                    <td> <input type="text" class="form-control" id="dis_percent_2" name="dis_percent_2" oninput="Final_2()" value="{{$childData->Dis_Percent_2}}"> </td>
                    <td> <input type="text" class="form-control" id="dis_value_2" name="dis_value_2" readonly value="{{$childData->Dis_Value_2}}"> </td>
                    <td> <input type="text" class="form-control" id="fin_value_2" name="fin_value_2" readonly value="{{$childData->Final_Value_2}}"> </td>
                    <td> <input type="date" class="form-control" id="mfg_2" name="mfg_2" value="{{$childData->Mfg_Date_2}}"> </td>
                    <td> <input type="date" class="form-control" id="exp_2" name="exp_2" value="{{$childData->Exp_Date_2}}"> </td>
                  </tr>
                  <tr>
                    <td> <input type="text" class="form-control" id="barcode_3" name="barcode_3" value="{{$childData->Barcode_3}}"> </td>
                    <td> <input type="text" class="form-control" id="rate_3" name="rate_3" oninput="Final_3()" value="{{$childData->Rate_3}}"> </td>
                    <td> <input type="text" class="form-control" id="qty_3" name="qty_3" oninput="Final_3()" value="{{$childData->Quantity_3}}"> </td>
                    <td> <input type="text" class="form-control" id="total_3" name="total_3" readonly value="{{$childData->Total_3}}"> </td>
                    <td> <input type="text" class="form-control" id="dis_percent_3" name="dis_percent_3" oninput="Final_3()" value="{{$childData->Dis_Percent_3}}"> </td>
                    <td> <input type="text" class="form-control" id="dis_value_3" name="dis_value_3" readonly value="{{$childData->Dis_Value_3}}"> </td>
                    <td> <input type="text" class="form-control" id="fin_value_3" name="fin_value_3" readonly value="{{$childData->Final_Value_3}}"> </td>
                    <td> <input type="date" class="form-control" id="mfg_3" name="mfg_3" value="{{$childData->Mfg_Date_3}}"> </td>
                    <td> <input type="date" class="form-control" id="exp_3" name="exp_3" value="{{$childData->Exp_Date_3}}"> </td>
                  </tr>
                  <tr>
                    <td> <input type="text" class="form-control" id="barcode_4" name="barcode_4" value="{{$childData->Barcode_4}}"> </td>
                    <td> <input type="text" class="form-control" id="rate_4" name="rate_4" oninput="Final_4()" value="{{$childData->Rate_4}}"> </td>
                    <td> <input type="text" class="form-control" id="qty_4" name="qty_4" oninput="Final_4()" value="{{$childData->Quantity_4}}"> </td>
                    <td> <input type="text" class="form-control" id="total_4" name="total_4" readonly value="{{$childData->Total_4}}"> </td>
                    <td> <input type="text" class="form-control" id="dis_percent_4" name="dis_percent_4" oninput="Final_4()" value="{{$childData->Dis_Percent_4}}"> </td>
                    <td> <input type="text" class="form-control" id="dis_value_4" name="dis_value_4" readonly value="{{$childData->Dis_Value_4}}"> </td>
                    <td> <input type="text" class="form-control" id="fin_value_4" name="fin_value_4" readonly value="{{$childData->Final_Value_4}}"> </td>
                    <td> <input type="date" class="form-control" id="mfg_4" name="mfg_4" value="{{$childData->Mfg_Date_4}}"> </td>
                    <td> <input type="date" class="form-control" id="exp_4" name="exp_4" value="{{$childData->Exp_Date_4}}"> </td>
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