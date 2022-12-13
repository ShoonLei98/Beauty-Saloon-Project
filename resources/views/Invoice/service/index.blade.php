@extends('Layouts.app')
 @section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
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
                            {{-- sale area view start --}}
                            <div class="" style="display: none" id="sale">
                                <form action="" class="form-horizontal" method="">
                                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">
                    
                                    <div class="row form-group mb-3">
                    
                                        <label for="" class="col-sm-1 col-form-label">Date</label>
                                        <div class="col-sm-2">
                                            <input type="date" name="date" id="date" class="form-control">
                                        </div>
                    
                                        <label for="" class="col-sm-1 col-form-label">Tax</label>
                                        <div class="col-sm-2">
                                            <input type="number" name="tax" id="tax" value="0" class="form-control">
                                        </div>
                                    </div>
                    
                                    <div class="row">                        
                                        {{-- for input div --}}
                                        <div class="col-2 border border-1" style="border-radius: 15px">                        
                                            <div class="form-group row mt-3 mb-3">
                                                <label for="" class="col-sm-4 col-form-label">Item</label>
                                                <div class="col-sm-8">
                                                    <select name="item" id="itemSel" class="itemSelect form-control">
                                                        <option value=0>Choose Item</option>
                                                        @foreach ($data as $item)
                                                            <option value="{{ $item->item_id }}">{{ $item->item }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            
                                            <div class="form-group row mb-3">
                                                <label for="" class="col-sm-4 col-form-label">Promotion</label>
                                                <div class="col-sm-8">
                                                    <input type="number" readonly name="promotion" id="promotion" value="0" class="form-control">
                                                </div>
                                            </div>
                    
                                            <div class="form-group row mb-3">
                                                <label for="" class="col-sm-4 col-form-label">Price</label>
                                                <div class="col-sm-8">
                                                    <input type="number" name="price" id="price" value="0" class="form-control">
                                                </div>
                                            </div>
                        
                                            <div class="form-group row mb-3">
                                                <label for="" class="col-sm-5 col-form-label">Quantity</label>
                                                <div class="col-sm-7">
                                                    <input type="number" name="quantity" id="quantity" value="0" class="form-control">
                                                </div>
                                            </div>
                        
                                            <div class="row mb-2" id="divAdd" style="display:block">
                                                <input type="button" value="Add" onclick="addPurchase()" class="btn btn-dark  col-sm-4">
                                            </div>
                        
                                            <div class="row mb-2" id="divEdit" style="display: none">
                                                <span class="col-sm-5" >
                                                   <button type="button" class="btn btn-dark text-center" onclick="edit()">Edit</button>                                    
                                                </span>
                                                <span class="col-sm-7">
                                                    <button type="button" class="btn btn-dark" style="text-align: left">Cancel</button>
                                                </span>
                                            </div>
                                        </div>
                        
                                        {{-- for table area --}}
                                        <div class="col-10 border border-1" style="border-radius: 15px">
                                            <div class="mt-2" id="purchaseTbl">
                                                <table class="table table-hover" id="tblID">
                                                    <thead>
                                                        <tr>
                                                            <th>Date</th>
                                                            <th>Item</th>
                                                            <th id="itemValue"></th>
                                                            <th>Price</th>
                                                            <th>Quantity</th>
                                                            <th>Promotion Discount</th>
                                                            <th>Sub Total</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tblBody">
                        
                                                    </tbody>
                                                    <tfoot id="tblFoot">
                                                        <tr id="trTax">
                                                            <td colspan="6" style="text-align: right">Tax</td>
                                                            <td id="tdTax">0</td>
                                                        </tr>
                                                        <tr id="trTotal">
                                                            <td colspan="6" style="text-align: right">Total</td>
                                                            <td id="total">0</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                        
                                            </div>
                                            <p class="row offset-1 col-12">
                                                <span class="col-5"></span>
                                                <span class="col-3">
                                                    <button type="button" id="btnSave" onclick="save()" class="btn btn-success text-right" style="text-align: right">Save</button>
                                                </span>
                                               </div>
                                            </p>
                                        </div>
                                    </div>
                                </form>
                    
                            </div>
                            {{-- sale area view end --}}

                            {{-- service area view start --}}
                            <div class="row" id="service" style="display: none">
                                <div class="col-sm-8" style="text-align: center">
                                    <form action="" class="form-group row w-50">
                                        <div class="col"><label for="" class="form-label">Customer Name</label></div>
                                        <div class="col">
                                            <input type="text" class="form-control" name="" id="customerName">
                                        </div>
                                        <div class="col">
                                            <button class="btn btn-outline-dark" onclick="saveCustomer()" type="button">Save</button>
                                        </div>
                                    </form> 
                                </div>
                                <div class="col-sm-4" style="text-align: center">
                                    <button class="btn btn-outline-dark" onclick="walkInCustomer()">Walk In Customer</button>
                                </div>
                                <div class="row">
                                    <div class=" col-sm-2">
                                        <div class="" id="message">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="">
                                            @foreach ($service as $item)
                                                <button class="btn btn-sm btn-outline-dark btnService" type="button" id="" value="{{ $item->service_id }}" >{{ $item->service_name  }}</button>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="col-sm-8" id="main">
                                        <div id="mainDiv" style="display: none">
                                            <table id="tbl_id" class="table table-hover">
                                                <thead>
                                                    <tr class="text-center bg-black">
                                                        <th>Service</th>
                                                        <th>Price</th>
                                                        <th>Promotion</th>
                                                        <th>Employee</th>
                                                        <th>By Name</th>
                                                        <th>Percentage</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="serviceBody" class=" bg-gradient-gray">
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- service area view end --}}
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
        $(document).ready(function(e){
            // item select change
            $("#itemSel").change(function(){
                $itemID = $("#itemSel").val();
                // $cardID = $("#cardSel").val();
                $date = $("#date").val();
                $itemName = '', $promotion = '';
                // to get item info 
                $.ajax({
                    type        : 'get',
                    url         : "{{ route('#ajaxSaleDataList') }}",
                    dataType    : 'json',
                    data        : {date : $date, itemID : $itemID},
                    async       : false,
                    success     : function(response){
                            if ($itemID == response.item.item_id) {
                                $itemName = response.item.item;
                                $promotion = response.item.promotion; 
                            } 
                    }
                });
                if($promotion != '')
                {
                    $("#promotion").val($promotion);
                }
                else
                $("#promotion").val(0);
            });

            // service button on click event to add new row
            $(".btnService").on("click", function(){
                $serviceId = '', $serviceName = '';
                $employeeList = '';
                $serviceRow = '';
                $serviceId = $(this).val();

                $.ajax({
                    type    : 'get',
                    url     : "{{ route('#ajaxServiceList') }}",
                    dataType: 'json',
                    async   : false,
                    success : function (response) {
                        for($i = 0; $i < response.service.length; $i++)
                        {
                            if($serviceId == response.service[$i].service_id)
                            {
                                $serviceName = response.service[$i].service_name;
                            }
                        }

                        //for employee list to show in select box
                        $employeeList = `<option value="">Choose Employee</option>`;
                        for($i = 0; $i < response.employee.length; $i++)
                        {
                            $employeeId = response.employee[$i].employee_id;
                            $employeeName = response.employee[$i].employee_name;
                            $employeeList += `<option value="${$employeeId}">${$employeeName}</option>`;
                        }

                    }
                });

                $serviceRow = `
                <tr>
                    <td>
                        <input type="text" name="reset" class="form-control reset" id="txtService" data-default="" value="${$serviceName}">
                    </td>
                    <td>
                        <input type="text" name="reset" class="form-control reset"  id="txtPrice" data-default="">
                    </td>
                    <td>
                        <input type="text" name="reset" class="form-control reset" id="promotion" data-default="" >
                    </td>
                    <td>
                        <select class="form-control reset" name="" id="txtName">${$employeeList}</select>
                    </td>
                    <td>
                        <input type="checkbox" name="reset" id="chkByName" class=" reset" data-default="" >
                    </td>
                    <td>
                        <input type="text" name="reset" class="form-control reset" id="txtPercent" data-default="" >
                    </td>
                </tr>
                `;
                // console.log($serviceRow);
                $("#serviceBody").append($serviceRow);
                    });
        });

        // js for sale area start
        //onclick function for Add button
    var taxStatus = 0;
    function addPurchase()
    {
        var trRow,tdItem,chkbox,chebox1,itemName,counterName,discount,rdbValue,allTotal;

        // get data from html page
        var date = $('#date').val();
        var item = $("#itemSel").val();
        var price = parseInt($("#price").val());
        var quantity = parseInt($("#quantity").val());
        var discount = parseInt($("#promotion").val());
        var tax = parseInt($("#tax").val());

        // to get item name start
        $.ajax({
            type        : 'get',
            url         : "{{ route('#ajaxItemList') }}",
            dataType    : 'json',
            async       : false,
            success     : function(response){
                for (let i = 0; i < response.itemList.length; i++) {
                    if (item == response.itemList[i].item_id) {
                        itemName = response.itemList[i].item;                      
                    }                   
                }
            }
        });
        // to get item name end

        //set data to table row
        trRow = $("<tr>");
        trTotal = $("<tr></tr>");

        tdDate = "<td>"+ date +"</td>";
        $(trRow).append(tdDate);

        tdItem = "<td>"+ itemName +"</td>";
        $(trRow).append(tdItem);

        tdItemValue = "<td>"+ item +"</td>";
        $(trRow).append(tdItemValue);
        
        tdPrice = "<td>"+ price +"</td>";
        $(trRow).append(tdPrice);

        tdQuantity = "<td>"+ quantity +"</td>";
        $(trRow).append(tdQuantity);

        tdDiscount = "<td>"+ discount +"</td>";
        $(trRow).append(tdDiscount);

        subTotal = (price * quantity) - discount;
        tdSubTotal = "<td>"+ subTotal +"</td>";
        $(trRow).append(tdSubTotal);

        tdUD = "<td><button class='btn btn-info btn-sm btn-edit'><small><i class='fa-solid fa-pen-to-square'></i></small></button><button class='btn btn-danger btn-sm btn-delete'><small><i class='fa-sharp fa-solid fa-trash'></i></small></button></td>"
        $(trRow).append(tdUD);
        //set data to table row

        //add tax to footer
        $("#tdTax").text(tax);

        //add total to footer
        let total = $("#total").text();
        allTotal = parseInt(subTotal) + parseInt(total);

        taxStatus ++;
        if(taxStatus == 1)
        {
            allTotal = allTotal + tax;
            
        }
        $("#total").text(allTotal);
                
        //add data row 
        $("#tblBody").append(trRow);
        cleanForm();
    };

    // delete event from table row
    $("body").on("click", ".btn-delete", function(){  
        $(this).parents("tr").remove(); 
        $total = parseInt($("#total").text());
        $subTotal = $(this).parents("tr").find("td:eq(8)").text();
        $deleteTotal = $total - parseInt($subTotal);
        $("#total").text($deleteTotal);
    });  

    //edit event from table row
    $("body").on("click", ".btn-edit", function(e){
        e.preventDefault();  

        // hide and show edit and cancel button when edit row
        $("#divEdit").show();
        $("#divAdd").hide();

        // get data from table row to edit
        $date = $(this).parents("tr").find("td:eq(0)").text();
        $item = $(this).parents("tr").find("td:eq(1)").text();
        $itemValue = $(this).parents("tr").find("td:eq(2)").text();
        $price = $(this).parents("tr").find("td:eq(3)").text();
        $quantity = $(this).parents("tr").find("td:eq(4)").text();
        $discount = $(this).parents("tr").find("td:eq(5)").text();

        $tax = $("#tdTax").text();
        $total = $("#total").text();

        //to get item name and counter name
        $.ajax({
            type        : 'get',
            url         : "{{ route('#ajaxItemList') }}",
            dataType    : 'json',
            async       : false,
            success     : function(response){

                // for item selected value
                for (let i = 0; i < response.itemList.length; i++) {
                    if (item == response.itemList[i].item_id) {
                        itemName = response.itemList[i].item;                      
                    }                   
                }
            }
        });
        // to get item and counter name

        // put data from table to input field to edit
        $("#date").val($date);
        $("#tax").val($tax);
        $("#price").val($price);
        $("#quantity").val($quantity);
        $("#promotion").val($discount);

        //add highlight class name to know which row is selected
        $(this).parents("tr").addClass('highlight');
    });

    // edit function when edit button click
    function edit()
    {
        var trRow,tdItem,chkbox,chebox1,itemName,counterName,allTotal;

        // get data from html page
        var date = $('#date').val();
        var item = $("#itemSel").val();
        var price = parseInt($("#price").val());   
        var quantity = parseInt($("#quantity").val());
        var discount = parseInt($("#promotion").val());
        var tax = $("#tax").val();
        var total = parseInt($("#total").text());

        //to get item name and counter name
        $.ajax({
            type        : 'get',
            url         : "{{ route('#ajaxItemList') }}",
            dataType    : 'json',
            async       : false,
            success     : function(response){

                // for item selected value
                for (let i = 0; i < response.itemList.length; i++) {
                    if (item == response.itemList[i].item_id) {
                        itemName = response.itemList[i].item;                     
                    }                   
                }
            }
        });
        // to get item and counter name

        var table = $("#tblBody");
        table.find('tr').each(function(i){
            if($(this).hasClass('highlight'))
            {
                sub = parseInt($(this).find("td:eq(6)").text());
                allTotal = total - sub;
                $(this).find("td:eq(0)").text(date);
                $(this).find("td:eq(1)").text(itemName);
                $(this).find("td:eq(2)").text(item);
                $(this).find("td:eq(3)").text(price);
                $(this).find("td:eq(4)").text(quantity);
                $(this).find("td:eq(5)").text(discount);

                subTotal = (price * quantity) - discount;
                $(this).find("td:eq(6)").text(subTotal);
            }
        });
        allTotal = subTotal + allTotal;
        $("#tdTax").text(tax);
        $("#total").text(allTotal);

        table.find('tr').each(function(i){
            if($(this).hasClass('highlight'))
            {
                $(this).removeClass('highlight');
            }
        });
        cleanForm();

        // hide and show edit and cancel button after edit button click
        $("#divEdit").hide();
        $("#divAdd").show();
    }

    // clear input field after added to table
    function cleanForm()
    {
        $("#rowID").val("");
        $("#itemSel").val(0);
        $("#price").val(0); 
        $("#quantity").val(0);
        $("#promotion").val(0);
    }

    function save(){
        var $ary = [];
        var date, item, itemValue, price, quantity, discount, tax;
        var table = $("#tblBody");
        $randomNo = Math.floor(Math.random() * 1000000001);
        $voucher_code = 'BS' + $randomNo;
        table.find('tr').each(function(i){

            var $tds = $(this).find('td');
            date = $tds.eq(0).text();
            item = $tds.eq(1).text();
            itemValue = $tds.eq(2).text();
            price = $tds.eq(3).text();
            quantity = $tds.eq(4).text();
            discount = $tds.eq(5).text();
            subTotal = $tds.eq(6).text();
            tax = $("#tdTax").text();
            total = $("#total").text();
            $voucherDetail = {
                'voucher_code' : $voucher_code,
                'date' : date,
                'item' : itemValue,
                'price' : price,
                'quantity' : quantity,
                'promotion' : discount,
                'sub_total' : subTotal,
            };
            $ary.push($voucherDetail);
        });

        $.ajax({
                type        : "post",
                url         : "{{ route('#createSaleInvoice') }}",
                dataType    :"json",
                data        : { data    : $ary,
                                voucherCode : $voucher_code, 
                                date    : date, 
                                tax     : tax, 
                                total   : total},
                success     : function(response){
                    if(response.status == 'success')
                    {
                        console.log(response.status);
                        window.location.href = "http://localhost/Beauty_Saloon_Project/public/invoice";
                    }
                }
            });
    };
    // js for sale area end   
    
    //js for service area start
    function saveCustomer(){
        let btnName = $("<button></button>").attr("class" , "btn btn-secondary");
        btnName.text($("#customerName").val());
        $("#message").append(btnName);
        $("#mainDiv").show();
        $("#tbl_id").find("input[name = 'reset']").each(function(){
            $(this).val("");
            // console.log($(this));
        });
    };

    function walkInCustomer()
    {
        let btnName = $("<button></button>").attr("class" , "btn btn-secondary");
        btnName.text("Default");
        $("#message").append(btnName);
        $("#mainDiv").show();
        $("#tbl_id").find("input[name = 'reset']").each(function(){
            $(this).val("");
            // console.log($(this));
        })
    };

    // function addService()
    // {
    //     $serviceId = '';
    //     // $(".btnService").each(function(index, value){
    //     //     $(this).click(function(){
    //     //         alert("hi");
    //     //     })

    //     //     console.log($(this).val());
    //     // });
    //     $(".btnService").on("click", function(){
    //             var serviceId = $(this).val();
    //             console.log(serviceId);
    //         });
    //     // console.log($serviceId);
    //     // $("#txtService").val($serviceId);
    //     // $serviceVal = $("#serviceId").val();
    //     // console.log($serviceVal);
    //     $serviceRow = '';
    //     $serviceRow = `
    //     <tr>
    //         <td>
    //             <input type="text" name="reset" class="form-control reset" id="txtService" data-default="" value="">
    //         </td>
    //         <td>
    //             <input type="text" name="reset" class="form-control reset"  id="txtPrice" data-default="">
    //         </td>
    //         <td>
    //             <input type="text" name="reset" class="form-control reset" id="promotion" data-default="" >
    //         </td>
    //         <td>
    //             <select class="form-control reset" name="" id="txtName"></select>
    //         </td>
    //         <td>
    //             <input type="checkbox" name="reset" id="chkByName" class=" reset" data-default="" >
    //         </td>
    //         <td>
    //             <input type="text" name="reset" class="form-control reset" id="txtPercent" data-default="" >
    //         </td>
    //     </tr>
    //     `;
    //     // console.log($serviceRow);
    //     $("#serviceBody").append($serviceRow);
    // };
    
    function service(){
        
        $("#service").show();
        $("#sale").hide();
    };
    function sale(){
        $("#service").hide();
        $("#sale").show();
    };


    </script>
 @endsection