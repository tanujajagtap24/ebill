@extends("admin\master")

@section('content')

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-4"></div>
          <div class="col-lg-4"  id="billPrint">
            <center>
              साई मार्ट <br> वनदेवशेरी, शिंगनापुर रोड, फलटण. <br> Mob No:9284700921 <br> GST NO. 27AKKPR6504L1ZN
              <hr style="height:2px;border-width:0;color:black;background-color:black">
            </center>
            <div style="display:flex; justify-content:space-between"> <b>Bill No. {{$viewbill->id}} </b>  <b>{{$viewbill->bill_date}}</b>   </div>
              <b>Bill To: {{$viewCustomer->Customer_Name}} </b>  
              {{-- <hr style="border-top: 1px dashed black; height:2px;border-width:2px;"> --}}
              {{-- <div style="display: flex; justify-content:space-between">
                <div> # </div>
                <div> Product Name </div>
                <div> Qty </div>
                <div> MRP </div>
                <div> Rate </div>
                <div> Total </div>
              </div>
              <hr style="border-top: 1px dashed black; height:2px;border-width:2px;">
              <div style="display: flex; justify-content:space-between">
                @foreach ($viewPosChild as $child)
                <div> {{$loop->iteration}} </div> <br>
                <div> Product Name </div>
                <div> Qty </div>
                <div> MRP </div>
                <div> Rate </div>
                <div> Total </div> 
                @endforeach
                <br>
              </div> --}}

              <table style="width: 100%">
                <tr style="border-top: 2px dashed black;" >
                  <th>#</th>
                  <th>Product Name</th>
                  <th>Qty</th>
                  <th>MRP</th>
                  <th>Rate</th>
                  <th>Total</th>
                </tr>
                <tbody style="border-top: 2px dashed black;">
                    @foreach ($viewPosChild as $child)
                        <tr >
                          <td> {{$loop->iteration}} </td>
                          {{-- <td> {{$child->pos_master_id}} </td> --}}
                          <td> {{$child->Product_Name}} </td>
                          <td> {{$child->Quantity}} </td>
                          <td> {{$child->MRP}} </td>
                          <td> {{$child->Sale_Price}} </td>
                          <td> {{$child->Total}} </td>
                        </tr>
                    @endforeach

                    <tr style="border-top: 2px dashed black; border-bottom:2px solid black" >
                      <td colspan="3"> <center> Total Qty: {{$viewPosMaster->Quantity}}</center> </td>
                      <th colspan="3">  Total Bill: {{$viewPosMaster->Total}}  </th>
                    </tr>
                </tbody>
              </table>

              <div class="footer">
                <div class="btn btn-secondary" onclick="printingBill()"> Print</div>
                <a href="/admin/bill/list" class="btn btn-secondary"> Back</a>
                </div>
          </div>
          {{-- <div class="col-lg-6">
            <div class="card shadow-lg " id="billPrint">
              <div class="card-header ">
                साई मार्ट वनदेवशेरी, शिंगनापुर रोड, फलटण.
                <h1> <b>Bill</b> </h1>
              </div>
              <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <td> <b> Name: </b> {{$viewCustomer->Customer_Name}} </td>
                  <td class="text-center"><b>INVOICE</b></td>
                </tr>
                <tr>
                  <td><b>Address:</b> {{$viewCustomer->City}} </td> 
                  <td><b>Bill Number:</b> {{$viewbill->id}} </td>
                </tr>
                <tr>
                  <td><b>Phone Number: </b> {{$viewCustomer->Mobile_Number}} </td>
                  <td><b>Bill Date: </b> {{$viewbill->bill_date}} </td>
                </tr>
              </table>
              <br>

              <table class="table table-bordered">
                <tr>
                  <th>Sr. No.</th>
                  <th>Product Name</th>
                  <th>Quantity</th>
                  <th>Rate</th>
                  <th>Amount</th>
                </tr>
                <tbody>
                    @foreach ($viewPosChild as $child)
                        <tr>
                          <td> {{$child->pos_master_id}} </td>
                          <td> {{$child->Product_Name}} </td>
                          <td> {{$child->Quantity}} </td>
                          <td> {{$child->Sale_Price}} </td>
                          <td> {{$child->Total}} </td>
                        </tr>
                            
                    @endforeach
                  <tr>
                    <th colspan="3"></th>
                    <th>Total: </th>
                    <td>{{$viewbill->total}}</td>
                  </tr>

                </tbody>
                
              </table>
              </div>
              <div class="card-footer">
              <div class="btn btn-secondary" onclick="printingBill()"> Print</div>
              <a href="/admin/product/list" class="btn btn-secondary"> Back</a>
              </div>
             
            </div>
            <!-- /.card -->
        </div> --}}
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <script>
    function printingBill(){
      var printableArea = document.getElementById("billPrint").innerHTML;
      document.body.innerHTML = printableArea;
      window.print();
      window.location.reload();
    }
  </script>
  <!-- /.content-wrapper -->
@endsection