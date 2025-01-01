@extends('admin\master_pos')

@section('content')
    <section class="content">
      <div class="container-fluid">
        <div class="card">
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div>
                <a href="#" class="btn btn-primary"> <i class="nav-icon fas fa-circle"></i> POS1 </a>
                <a href="#" class="btn btn-light"> <i class="nav-icon fas fa-plus"></i> </a>
              </div>
              <div>
                  <a href="#" class="btn btn-danger rounded-pill"> <i class="nav-icon fas fa-circle"></i> Dashboard </a>
                  <a href="#" class="btn btn-primary rounded-pill"> <i class="nav-icon fas fa-circle"></i> POS Bills List </a>
              </div>
            </div>
          </div>
          <div class="card-body bg-light">
            <div class="row mx-1 ">
              <div class="col-9 bg-white  ">
                <div class="card shadow">
                  <form class="d-flex">
                      <input class="form-control me-2" type="search" placeholder="Search Productrs by name or Scan Barcode" aria-label="Search">
                      <div class="btn btn-sm btn-primary"><a href="#" class="btn btn-sm " style="background-color: blue"> <i class="nav-icon fas fa-plus text-white"></i></a> </div>
                  </form>

                    <table class="table table-hover text-center">
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
                        @foreach ($ProductMaster as $master)
                          @foreach ($ProductChild as $child)
                            @if ($master->id == $child->product_master_id)
                              <tr>
                                <td> {{ $loop->iteration }} </td>
                                <td> {{ $master->Product_Name }} </td>
                                <td> {{ $child->Quantity_1 }} </td>
                                <td> {{ $child->Rate_1 }} </td>
                                <td> {{ $child->Dis_Value_1 }} </td>
                                <td> {{ $child->Final_Value_1 }} </td>
                                <td>
                                    <a href="" class="btn"> <i class="fas fa-edit text-primary "></i> </a>
                                    <a href="" class="btn"> <i class="fas fa-trash-alt text-danger "></i> </a>
                                </td>
                              </tr>
                            @endif
                          @endforeach
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
                      @foreach ($customerData as $customer)
                       <option value="">Select</option>
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
                    <div>&#8377;{{ $total }}</div>
                    <div>Remaining Amt: &#8377; 0</div>
                  </div>
                  <label for=""> Bill Date: </label>
                  <input type="text" name="bill_date" id="bill_date" value="{{ now()->format('m/d/Y') }}">
                </div>
                <div class="card p-2 shadow">
                  <label for=""> Bill Details: </label>
                  <div class="d-flex justify-content-between bg-danger align-items-center">
                    <span>Total Amount:</span>
                    <span> <h1>&#8377;{{ $total }}</h1> </span>
                  </div>
                </div>
                <div class="card p-2 shadow">
                  <div class="d-flex justify-content-around align-items-center">
                    <a href="" class="btn btn-primary"> Save Bill </a>
                    <a href="" class="btn btn-Success"> Clear </a>
                  </div>
                </div>
              </div>
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
@endsection

<script>
    // Customer Details Script
    function fillCustomerDetails() {
        const customerDropdown = document.getElementById('cust_id');
        const selectedOption = customerDropdown.options[customerDropdown.selectedIndex];
        document.getElementById('mob_num').innerHTML = selectedOption.getAttribute('data-mobile');
        document.getElementById('city').innerHTML = selectedOption.getAttribute('data-city');
    }

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