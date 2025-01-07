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
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="card shadow-lg " id="billPrint">
              <div class="card-header">
                <h1> <b>Bill</b> </h1>
              </div>
              <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <td> <b> Name: </b> {{$customerData->Customer_Name}} </td>
                  <td class="text-center"><b>INVOICE</b></td>
                </tr>
                <tr>
                  <td><b>Address:</b> {{$customerData->City}} </td> 
                  <td><b>Bill Number:</b> {{$billData->id}} </td>
                </tr>
                <tr>
                  <td><b>Phone Number: </b> {{$customerData->Mobile_Number}} </td>
                  <td><b>Bill Date: </b> {{$billData->bill_date}} </td>
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
                    @foreach ($posChildData as $child)
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
                    <td>{{$billData->total}}</td>
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

       
           

          
           
          
        </div>
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