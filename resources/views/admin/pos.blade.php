@extends("admin\master")

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="/admin/product/list" class="btn btn-primary"> <i class="nav-icon fas fa-circle"></i> POS1 </a>
                        <a href="/admin/product/list" class="btn btn-light"> <i class="nav-icon fas fa-plus"></i>  </a>
                    </div>
                    <div>
                        <a href="/admin/product/list" class="btn btn-danger rounded-pill"> <i class="nav-icon fas fa-circle"></i> Dashboard </a>
                        <a href="/admin/product/list" class="btn btn-primary rounded-pill"> <i class="nav-icon fas fa-circle"></i> POS Bills List </a>
                    </div>
                  </div>
            </div>
            <div class="card-footer text-center">
                <div class="row">
                    <div class="col-lg-1 bg-primary">
                        <a href="" class="btn btn-dark text-dark">History</a>
                    </div>
                    <div class="col-lg-3 bg-danger">
                        Last Bill : 5 | Amt : 89 |<img src="{{asset('admin/assets/img/whatspp.png')}}" class="img-circle " style="height: 30; width:30;" alt="User Image">

                    </div>
                    <div class="col-lg-2 bg-info ">
                        Total Quantiy : 11
                    </div>
                    <div class="col-lg-2 bg-primary">
                        Total MRP : 500.00
                    </div>
                    <div class="col-lg-2 bg-warning">
                        Total Dis : -545.00

                    </div>
                    <div class="col-lg-2 bg-Success">
                        Total Bill : 1045
                    </div>

                </div>
            </div>
        </div>
    </div>
  </section>
</div>
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