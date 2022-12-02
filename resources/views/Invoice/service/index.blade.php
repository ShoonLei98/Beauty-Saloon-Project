@extends('Layouts.app')
 @section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        </div>
                        <div class="card-header">
                            <div class="row w-50 text-center offset-3 mt-2">
                                <div class="col" style="text-align: right">
                                    <button class="btn btn-sm btn-outline-dark" onclick="sale()" type="button">Create Sale</button>
                                </div>
                                <div class="col" style="text-align: left">
                                    <button class="btn btn-sm btn-outline-dark" onclick="service()" type="button">Create Service</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- sale area --}}
                            <div class="mt-3" id="sale" style="display: none">
                                <div class="content-wrapper">
                                    <section class="content">
                                        <div class="container-fluid mt-5" style="width: 450px">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3 class="card-title mt-2 text-center">
                                                                Add Sale
                                                            </h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="tab-content">
                                                                <form action="" method="POST" class="form-horizontal">
                                                                    @csrf
                                                                    <div class="form-group row mb-3">
                                                                        <label for="" class="col-sm-3 col-form-label">Date</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" class="form-control" placeholder="">
                                                                        </div>
                                                                    </div>
                                
                                                                    <div class="" id="item">
                                                                        <div class="form-group row mb-3">
                                                                            <label for="" class="col-sm-3 col-form-label">Item</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" class="form-control" placeholder="">
                                                                            </div>
                                                                        </div>
                                    
                                                                        <div class="form-group row mb-3">
                                                                            <label for="" class="col-sm-3 col-form-label">Price</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="" id="" class="form-control">
                                                                            </div>
                                                                        </div>
                                    
                                                                        <div class="form-group row mb-3">
                                                                            <label for="" class="col-sm-3 col-form-label">Quantity</label>
                                                                            <div class="col-sm-9">
                                                                                <input type="text" name="" id="" class="form-control">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                
                                                                    <div class="form-group row mb-3">
                                                                        <label for="" class="col-sm-3 col-form-label">Total</label>
                                                                        <div class="col-sm-9">
                                                                            <input type="text" name="" id="" class="form-control">
                                                                        </div>
                                                                    </div>
                                
                                                                    <p class="row offset-1 col-12">
                                                                        <span class="col-3">
                                                                            <a href="{{ route('#custoemrList') }}"><button type="button" class="btn btn-dark">Back</button></a>
                                                                        </span>
                                                                        <span class="col-5"></span>
                                                                        <span class="col-3">
                                                                            <button type="submit" class="btn btn-success text-right" style="text-align: right">Save</button>
                                                                        </span>
                                                                       </div>
                                                                    </p>
                                                                </form>
                                                            </div>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            {{-- sale area --}}


























                            {{-- service area --}}
                            <div class="mt-3" id="service" style="display: none">
                                <div class="content-wrapper">
                                    <section class="content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <form action="" class="form-group row w-50">
                                                                <div class="col"><label for="" class="form-label">Customer Name</label></div>
                                
                                                                <div class="col">
                                                                <input type="text" class="form-control" name="" id="customerName">
                                                                </div>
                                
                                                                <div class="col">
                                                                <button class="btn btn-sm btn-outline-dark" onclick="saveCustomer()" type="button">Save</button>
                                                                </div>
                                                            </form> 
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-2">
                                                                    <div class="" id="message">
                                                                    </div>
                                                                </div>
                                                                <div class="col-3">
                                                                    <div class="col">
                                                                        <button class="btn btn-sm btn-outline-dark" type="button">Shampoo With followMe</button>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-sm btn-outline-dark" type="button">Nail Art</button>
                                                                    </div>
                                                                    <div class="col">
                                                                        <button class="btn btn-sm btn-outline-dark" type="button">Skin Care</button>
                                                                    </div>
                                                                </div>
                                                                <div class="col-7" id="main">
                                                                    <div id="mainDiv" style="display: none">
                                                                        <table id="tbl_id">
                                                                            <tr class="text-center">
                                                                                <th>Employee</th>
                                                                                <th>Service</th>
                                                                                <th>Price</th>
                                                                                <th>By Name</th>
                                                                                <th>Percentage</th>
                                                                                <th>Discount Price</th>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>
                                                                                    <select class="form-control reset" name="" id="txtName">
                                
                                                                                    </select>
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="reset" id="" class="form-control reset" id="txtService" data-default="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="reset" id="" class="form-control reset"  id="txtPrice" data-default="">
                                                                                </td>
                                                                                <td>
                                                                                    <input type="checkbox" name="reset" id="chkByName" class=" reset" data-default="" >
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="reset" id="" class="form-control reset" id="txtPercent" data-default="" >
                                                                                </td>
                                                                                <td>
                                                                                    <input type="text" name="reset" id="" class="form-control reset" id="txtDiscount" data-default="" >
                                                                                </td>
                                                                            </tr>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                            {{-- service area --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
 

{{-- service area --}}
{{-- <div class="" id="service">
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            </div>
                            <div class="card-header">
                                <form action="" class="form-group row w-50">
                                    <div class="col"><label for="" class="form-label">Customer Name</label></div>
    
                                    <div class="col">
                                    <input type="text" class="form-control" name="" id="customerName">
                                    </div>
    
                                    <div class="col">
                                    <button class="btn btn-sm btn-outline-dark" onclick="saveCustomer()" type="button">Save</button>
                                    </div>
                                </form> 
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-2">
                                        <div class="" id="message">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="col">
                                            <button class="btn btn-sm btn-outline-dark" type="button">Shampoo With followMe</button>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-sm btn-outline-dark" type="button">Nail Art</button>
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-sm btn-outline-dark" type="button">Skin Care</button>
                                        </div>
                                    </div>
                                    <div class="col-7" id="main">
                                        <div id="mainDiv" style="display: none">
                                            <table id="table_id">
                                                <tr class="text-center">
                                                    <th>Employee</th>
                                                    <th>Service</th>
                                                    <th>Price</th>
                                                    <th>By Name</th>
                                                    <th>Percentage</th>
                                                    <th>Discount Price</th>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <select class="form-control" name="" id="eName">
    
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" id="" class="form-control" id="txtService">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" id="" class="form-control" id="txtPrice">
                                                    </td>
                                                    <td>
                                                        <input type="checkbox" name="" id="chkByName">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" id="" class="form-control" id="txtPercent">
                                                    </td>
                                                    <td>
                                                        <input type="text" name="" id="" class="form-control" id="txtDiscount">
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div> --}}
{{-- service Area --}}


 @endsection

 @section('jscript')
    <script>
        // event.preventDefault();
            function saveCustomer(){
                let btnName = $("<button></button>").attr("class" , "btn btn-secondary");
                btnName.text($("#customerName").val());
                $("#message").append(btnName);
                $("#mainDiv").show();
                $("#tbl_id").find("input[name = 'reset']").each(function(){
                    $(this).val("");
                    console.log($(this));
                })
            };
            function sale(){
                $("#service").hide();
                $("#sale").show();
            }
            function service(){
                $("#sale").hide();
                $("#service").show();
            };
    </script>
 @endsection