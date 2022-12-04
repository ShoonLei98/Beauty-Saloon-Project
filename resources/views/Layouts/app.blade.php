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
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

{{-- for select2 --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<!--ajax-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ajaxtransport-xdomainrequest/1.0.4/jquery.xdomainrequest.min.js" integrity="sha512-AqrEfeiUZBu9nWx7jHZlve8pPY3Mavhhwobv+pVxTSc10vpElmhFNDqe8DopVSvApKGfUrOQO3OshR8avd+pTw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<style>
  .active{background-color: gray;}
</style>

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

</head>
<body class="hold-transition">
  <div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      {{-- <a href="#" class="brand-link">  
        <span class="brand-text font-weight-light">Pizza Order System </span>
      </a> --}}
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="{{ route('#home') }}">Home</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#itemList') }}">Item</a>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#promotionList') }}">Promotion</a>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#inventoryList') }}">Inventory</a>
            </li> 

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#counterList') }}">Counter</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('#cardList') }}">Card</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#employeeList') }}">Employee</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#custoemrList') }}">Customer</a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="{{ route('#serviceList') }}">Service</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('#purchaseList') }}">Purchase</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#usageList') }}">Usage</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#expense1') }}">General Expense</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#saleInvoiceList') }}">SaleInvoice</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('#serviceInvoice') }}">ServiceInvoice</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">Report</a>
            </li>

          </ul>
        </nav>
      </div>
    </aside>
    @yield('content')
    
  </div>
  @yield('jscript')

  <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
<!-- MDB -->


<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>
<script src="{{ asset('dist/js/demo.js') }}"></script>
</body>
</html>