<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <!-- Font Awesome -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
rel="stylesheet"
/>
<!-- Google Fonts -->
<link
href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
rel="stylesheet"
/>
<!-- MDB -->
<link
href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
rel="stylesheet"
/>
</head>
<body>
    <div class="content-wrapper">
        <div class="content">
            <div class="container-fluid w-75 h-100">
                <div class="offset-1  w-75 h-100 mt-5 border-2 border-dark" style="text-align: center">
                    <div class="row row-cols-1 row-cols-md-3 g-4 w-100">

                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <a href="{{ route('#itemList') }}" class="text-black"><h5 class="card-title">Item</h5></a>
                            <p class="card-text">
                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <a href="{{ route('#promotionList') }}" class="text-black"><h5 class="card-title">Promotion</h5></a>
                            <p class="card-text">
                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <a href="{{ route('#inventoryList') }}" class="text-black"><h5 class="card-title">Inventory</h5></a>
                            <p class="card-text">
                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <a href="{{ route('#counterList') }}" class="text-black"><h5 class="card-title">Counter</h5></a>
                            <p class="card-text">
                            </p>
                          </div>
                        </div>
                      </div>

                      <div class="col">
                        <div class="card">
                          <div class="card-body">
                            <a href="{{ route('#cardList') }}" class="text-black"><h5 class="card-title">Card</h5></a>
                            <p class="card-text">
                            </p>
                          </div>
                        </div>
                      </div>

                        <div class="col">
                          <div class="card">
                            {{-- <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top" alt="Hollywood Sign on The Hill"/> --}}
                            <div class="card-body">
                              <a href="{{ route('#employeeList') }}" class="text-black"><h5 class="card-title">Employee</h5></a>
                              <p class="card-text">
                              </p>
                            </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="card">
                            <div class="card-body">
                              <a href="{{ route('#custoemrList') }}" class="text-black"><h5 class="card-title">Customer</h5></a>
                              <p class="card-text">
                              </p>
                            </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="card">
                            <div class="card-body">
                              <a href="{{ route('#serviceList') }}" class="text-black"><h5 class="card-title">Service</h5></a>
                              <p class="card-text"></p>
                            </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="card">
                              <div class="card-body">
                                <a href="{{ route('#purchaseList') }}" class="text-black"><h5 class="card-title">Purchase</h5>
                                </a>
                                <p class="card-text"></p>
                              </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="card">
                            {{-- <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers"/> --}}
                            <div class="card-body">
                              <a href="{{ route('#expense1') }}" class="text-black"><h5 class="card-title">General Expense</h5></a>
                              <p class="card-text">
                              </p>
                            </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="card">
                              {{-- <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers"/> --}}
                              <div class="card-body">
                                <a href="" class="text-black"><h5 class="card-title">Usage</h5></a>                                
                                <p class="card-text">
                                </p>
                              </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="card">
                            {{-- <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers"/> --}}
                                <div class="card-body">
                                  <div class="">
                                    <a href="{{ route('#saleInvoiceList') }}" class="text-black"><h5 class="card-title">Sale Invoice</h5></a>
                                  </div>
                                  <div class="">
                                    <a href="{{ route('#serviceInvoice') }}" class="text-black"><h5 class="card-title">Service Invoice</h5></a>
                                  </div>
                                  <p class="card-text">
                                  </p>
                                </div>
                          </div>
                        </div>

                        <div class="col">
                          <div class="card">
                            {{-- <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/044.webp" class="card-img-top" alt="Skyscrapers"/> --}}
                                <div class="card-body">
                                    <a href="" class="text-black hover"><h5 class="card-title">Report</h5></a>
                                  <p class="card-text">
                                  </p>
                                </div>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
</html>
