@extends('admin\master_pos')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div>
                <a href="#" class="btn btn-primary"> <i class="nav-icon fas fa-circle"></i> POS1 </a>
              </div>
              <div>
                  <a href="/" class="btn btn-danger rounded-pill"> <i class="nav-icon fas fa-circle"></i> Dashboard </a>
                  <a href="/admin/bill/list" class="btn btn-primary rounded-pill"> <i class="nav-icon fas fa-circle"></i> POS Bills List </a>
              </div>
            </div>
          </div>
          <div class="card-body bg-light">
            <div class="row mx-1 ">

              <div class="col-9 bg-white  ">
                <div class="card shadow">
                  <form action="/admin/cart/store" method="POST">
                    @csrf
                    <div class="d-flex justify-content-between">
                  <select name="product_select" id="product_select" class="form-control"  required>
                    <option value="">Select</option> 
                    @foreach ($ProductMaster as $master)
                      @foreach ($ProductChild as $child)
                        @if ($master->id == $child->product_master_id)
                      <option value="{{ $master->id }}" data-productName="{{ $master->Product_Name }}" data-rate="{{ $child->Rate_1 }}" data-qty="{{ $child->Quantity_1 }}" data-sale="{{ $child->Dis_Value_1 }}" data-final="{{ $child->Final_Value_1 }}" > {{ $master->Product_Name }} </option>
                      @endif


                      @endforeach 
                    @endforeach
                  </select>
                      
                  <button type="submit" class="btn-primary"><i class="nav-icon fas fa-plus"></i></button>
                </div>
                  </form>

                  <form action="/admin/pos/store" method="POST">
                    @csrf
                    <table class="table table-hover text-center" id="added_products_table">
                      <thead style="background-color: rgb(189, 217, 248)">
                        <tr>
                          <th>No.</th>
                          <th>Item Name </th>
                          <th>Qty</th>
                          <th>MRP</th>
                          <th>Sale Price</th>
                          <th>Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($cartData as $data)
                        <td> <input type="hidden" class="text-center" name="p_id" id="p_id" value="{{ $data->Product_id }}"> </td>
                            <tr>
                              <td> {{ $loop->iteration }} </td>
                              {{-- <td> {{ $data->id }} </td> --}}
                              <td> <span id="name">{{ $data->Product_Name }} </span> </td>
                              <td> <input type="number" class="text-center" name="qty" id="qty" min="1" value="{{ $data->Quantiy }}" onchange="Price()"> </td>
                              {{-- <td> <input type="number" name="qty" id="qty" value="{{ $data->Quantiy }}" min="1" data-id ="{{ $data->id }}" class="quantity-input"> </td> --}}
                              <td> {{ $data->MRP }} </td>
                              {{-- <td> <span id="sale"> {{ $data->Sale_Price }} </span></td> --}}
                              {{-- <td> <input type="" name="sale" id="sale" value="{{ $data->Sale_Price }}"> </td> --}}
                              <td> {{ $data->Sale_Price }} </td>
                              {{-- <td> <span id="total"> {{ $data->Total }} </span></td> --}}
                              {{-- <td> <input type="" name="total" id="total" value="{{ $data->Total }}" > </td> --}}
                              <td> {{ $data->Total }} </td>
                              {{-- <td> {{ $data->Total }} </td> --}}

                              <td> <a href="/admin/cart/delete/{{ $data->id }}" class="btn"> <i class="fas fa-trash-alt text-danger "></i> </a> </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
              </div>
              <div class="col-3 bg-white  ">
                <div class="card p-2 shadow">
                  <div class="d-flex justify-content-between">
                    <label for="">Customer Details</label>
                    <a href="/admin/customer/create" class="btn btn-primary"> <i class="nav-icon fas fa-plus"></i></a>
                  </div>
                  <div class="">
                    <select name="cust_id" id="cust_id" class="form-control" onchange="fillCustomerDetails()" required>
                      <option value="">Select Customer</option>
                      @foreach ($customerData as $customer)
                        <option value="{{ $customer->id }}" data-mobile="{{ $customer->Mobile_Number }}" data-city="{{ $customer->City }}"> {{ $customer->Customer_Name }} </option>
                      @endforeach
                    </select>
                    <div >
                      <label>Mobile Number :</label> <span id="mob_num"></span> <br>
                      <label>Address :</label> <span id="city"></span> <br>
                      {{-- <label>Mobile Number:</label> <input type="text" name="mob_num" id="mob_num" readonly class="form-control"> --}}
                      {{-- <label> Address : </label><input type="text" name="city" id="city" readonly class="form-control"> --}}
                    </div>
                  </div>
                  <div class="">
                    <label for="">Payment Term</label>
                    <select name="pay_term" id="pay_term" class="form-control">
                      <option value="Cash">Cash</option>
                      <option value="Online">Online</option>
                    </select>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div>&#8377;</div>
                    <div>Remaining Amt: &#8377; 0</div>
                  </div>
                  <label for=""> Bill Date: </label>
                  <input type="text" name="bill_date" id="bill_date" value="{{ now()->format('d/m/Y') }}">
                </div>
                <div class="card p-2 shadow">
                  <label for=""> Bill Details: </label>
                  <div class="d-flex justify-content-between bg-danger align-items-center ">
                    <span>Total Amount:</span>
                    <h1>
                      <input type="text" class="" style="width:200px; height:50px" name="total_amt" id="total_amt" value="{{$total}}">

                    </h1>
                    {{-- <p id="total_amt"> 0 </p> --}}
                  </div>
                </div>
                <div class="card p-2 shadow">
                  <div class="d-flex justify-content-around align-items-center">
                    <button type="submit" class="btn btn-primary">Save Bill</button>
                    <button type="Reset" class="btn btn-Success"> Clear</button>
                  </div>
                </div>
              </div>

            </form>
            </div>

          </div>
          <div class="card-footer fixed-bottom text-center">
              <div class="row">
                  <div class="col-lg-1 bg-primary">
                      <a href="" class="btn btn-dark text-dark">History</a>
                  </div>
                  <div class="col-lg-3 bg-danger">
                      Last Bill : 5 | Amt : 89 |<img src="{{ asset('admin/assets/img/whatspp.png') }}"
                          class="img-circle " style="height: 30; width:30;" alt="User Image">

                  </div>
                  <div class="col-lg-2 bg-info ">
                      Total Quantiy : 11
                  </div>
                  <div class="col-lg-2 bg-warning">
                      Total MRP : 500.00
                  </div>
                  <div class="col-lg-2 bg-primary">
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
@endsection

<script>
    // Customer Details Script
    function fillCustomerDetails() 
    {
        const customerDropdown = document.getElementById('cust_id');
        const selectedOption = customerDropdown.options[customerDropdown.selectedIndex];
        document.getElementById('mob_num').innerHTML = selectedOption.getAttribute('data-mobile');
        document.getElementById('city').innerHTML = selectedOption.getAttribute('data-city');
    }

    // Total 
    function Price()
    {
      var Quantity = parseInt(document.getElementById('qty').value);
      var Sale = parseInt(document.getElementById('sale').innerHTML);

      var Total = Quantity * Sale;
      document.getElementById('total').innerHTML = Total;

    }

      // Product Details Script
      // function AddProductToTable()
      // {
      // const productDropdown = document.getElementById('product_select');
      // const selectedOption = productDropdown.options[productDropdown.selectedIndex];
      // document.getElementById('product_name').innerHTML = selectedOption.getAttribute('data-productName');
      // document.getElementById('rate').innerHTML = selectedOption.getAttribute('data-rate');
      // document.getElementById('qty').innerHTML = selectedOption.getAttribute('data-qty');
      // document.getElementById('sale').innerHTML = selectedOption.getAttribute('data-sale');
      // document.getElementById('final').innerHTML = selectedOption.getAttribute('data-final');
      // }

    // START current Date Script
    // Get the current date
    const currentDate = new Date();

    // Format the date
    const options = {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    const formattedDate = currentDate.toLocaleDateString('en-US', options);

    // Display the date in the HTML
    document.getElementById('current-date').innerText = formattedDate;
    // END current Date Script


    // START Qunatity Buttons Script
    var x = 0;

    document.getElementById('output-area').innerHTML = x;

    function button1() {
        document.getElementById('output-area').innerHTML = ++x;
    }

    function button2() {
        document.getElementById('output-area').innerHTML = --x;
    }
    // END Qunatity Buttons Script


    // Total Amount
</script>




{{-- <tr>
                        <td>1</td>
                        <td>बारिक खडीसाखर १ किग्रॅ</td>
                        <td>
                          <div style="background-color: rgb(189, 217, 248); width:70px">
                            <button class="button" onclick="decrease()">-</button>
                            <span class="value" id="value">0</span>
                            <button class="button" onclick="increase()">+</button>
                          </div>
                        </td>                          <td> &#8377;100</td>
                        <td> <input type="text" name="" id="" style="width: 70px"> </td>
                        <td> &#8377;445</td>
                        <td>
                          <a href="" class="btn"> <i class="fas fa-edit text-primary "></i> </a>
                          <a href="" class="btn"> <i class="fas fa-trash-alt text-danger "></i> </a></td>
                      </tr>
                      <tr>
                        <td>2</td>
                        <td>Sak</td>
                        <td>
                          <div style="background-color: rgb(189, 217, 248); width:70px">
                            <button class="button" onclick="decrease()">-</button>
                            <span class="value" id="value">0</span>
                            <button class="button" onclick="increase()">+</button>
                          </div>
                        </td>
                        <td> &#8377;0</td>
                        <td> <input type="text" name="" id="" style="width: 70px"> </td>
                        <td> &#8377;600</td>
                        <td>
                          <a href="" class="btn"> <i class="fas fa-edit text-primary "></i> </a>
                          <a href="" class="btn"> <i class="fas fa-trash-alt text-danger "></i> </a></td>
                      </tr> --}}