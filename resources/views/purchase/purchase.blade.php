@extends('Layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid ml-1 mt-2 text-center" style="width: 100%">
           
            {{-- <div class="row" style="width: 1300px">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title mt-2 text-center">
                                Purchase
                            </h3>
                        </div>
                        <div class="card-body">
                                                       
                        </div>
                    </div>
                </div>
            </div> --}}
            <div class="tab-content ml-2">
                <form action="" class="form-horizontal" method="">
                    {{-- @csrf --}}
                    <input type="hidden" name="_token" id="csrf" value="{{Session::token()}}">

                    <div class="row form-group mb-3">
                        <label for="" class="col-sm-1 col-form-label">Voucher</label>
                        <div class="col-sm-2">
                            <input type="text" name="voucherID" id="vID" class="form-control">
                        </div>

                        <label for="" class="col-sm-1 col-form-label">Date</label>
                        <div class="col-sm-2">
                            <input type="date" name="date" id="date" class="form-control">
                        </div>

                        <label for="" class="col-sm-1 col-form-label">Tax</label>
                        <div class="col-sm-2">
                            <input type="number" name="tax" id="tax" value="0" class="form-control">
                        </div>

                        {{-- <div class="col-sm-2">
                            <input type="button" value="OK" id="btnOK" class="btn btn-dark">
                        </div> --}}

                        <div class="col-sm-2">
                            <span class="">
                                <a href="{{ route('#purchaseList') }}"><button type="button" class="btn btn-dark">Back</button></a>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        {{-- for input div --}}
                        <div class="col-2 border border-1" style="border-radius: 15px">

                            <input type="text" id="rowID" style="display: none">

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
                                <label for="" class="col-sm-4 col-form-label">Price</label>
                                <div class="col-sm-8">
                                    <input type="number" name="price" id="price" value="0" class="form-control">
                                </div>
                            </div>

                            
                            <div class="form-group row mb-3">
                                <label for="" class="col-sm-4 col-form-label">Counter</label>
                                <div class="col-sm-8 mt-2" style="text-align: left">
                                    <input type="checkbox" name="counter" id="chkCounter">
                                </div>
                            </div>

                            {{-- <div class="form-group row mb-3" id="counter" style="display: none">
                                <label for="" class="col-sm-5 col-form-label">Counter Name</label>
                                <div class="col-sm-7">
                                    <input type="text" name="counterName" id="counterName" class="form-control" placeholder="">
                                </div>
                            </div> --}}

                            <div class="form-group row mb-3" id="counter" style="display: none">
                                <label for="" class="col-sm-4 col-form-label">Counter Name</label>
                                <div class="col-sm-8">
                                    <select name="counterName" id="counterSel" class="counterSelect form-control">
                                        <option value=0>Choose Counter</option>
                                        @foreach ($counter as $item)
                                            <option value="{{ $item->counter_id }}">{{ $item->counter_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row mb-5">
                                <label for="" class="col-sm-5 col-form-label">Quantity</label>
                                <div class="col-sm-7">
                                    <input type="number" name="quantity" id="quantity" value="0" class="form-control">
                                </div>
                            </div>

                            <div class="form-group mb-1">
                                <div class="row">
                                    <div class="col-sm-4" id="rdbGroup">
                                        <div class="">
                                            <label for="">
                                                <input type="radio" checked name="rdbDiscount" id="radioCash" value="cash"> 
                                                <i class="fa-solid fa-money-bill-1"></i>
                                            </label>
                                        </div>
                                        <div class="mt-4">
                                            <label for="" class="">
                                                <input type="radio" name="rdbDiscount" id="radioPercent" value="percent"> 
                                                <i class="fa-solid fa-percent"></i>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="">
                                            <input type="number" name="cash" id="cash" class="form-control">
                                        </div>
                                        <div class="mt-2">
                                            <input type="number" readonly name="percent" id="percent" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="row">
                                    <div class="col-sm-4">
                                        <label for="">
                                            <input type="radio" checked name="rdbDiscount" id="radioDiscount" value="cash"> 
                                            <i class="fa-solid fa-money-bill-1"></i>
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number" name="cash" id="cash" class="form-control">
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-sm-4">
                                        <label for="" class="">
                                            <input type="radio" name="rdbDiscount" id="radioDiscount" value="percent"> 
                                            <i class="fa-solid fa-percent"></i>
                                        </label>
                                    </div>
                                    <div class="col-sm-8">
                                        <input type="number" name="percent" id="discount" class="form-control">
                                    </div>
                                </div> --}}
                            </div>
                            <div class="form-group row mb-3">
                                {{-- <label for="" class="col-sm-5 col-form-label">Discount</label> --}}
                                {{-- <div class="col-sm-7">
                                    <input type="number" name="discount" id="discount" class="form-control">
                                </div> --}}
                            </div>

                            {{-- <div class="form-group row mb-3">
                                <label for="" class="col-sm-5 col-form-label">Tax</label>
                                <div class="col-sm-7">
                                    <input type="number" name="tax" id="tax" class="form-control">
                                </div>
                            </div> --}}


                            <div class="row mb-2" id="divAdd" style="display:block">
                                {{-- <span class="col-sm-4">
                                    <a href="{{ route('#purchaseList') }}"><button type="button" class="btn btn-dark">Back</button></a>
                                </span> --}}
                                <input type="button" value="Add" onclick="addPurchase()" class="btn btn-dark  col-sm-4">
                            </div>

                            <div class="row mb-2" id="divEdit" style="display: none">
                                <span class="col-sm-5" >
                                   <button type="button" class="btn btn-dark text-center" onclick="edit()">Edit</button>                                    
                                </span>
                                {{-- <input type="button" value="Add" onclick="addPurchase()" class="btn btn-dark  col-sm-4"> --}}
                                <span class="col-sm-7">
                                    <button type="button" class="btn btn-dark" onclick="cancel()" style="text-align: left">Cancel</button>
                                </span>
                            </div>
                        </div>

                        {{-- <div class="col-1"></div> --}}

                        {{-- for table area --}}
                        <div class="col-10 border border-1" style="border-radius: 15px">
                            <div class="mt-2" id="purchaseTbl">
                                <table class="table table-hover" id="tblID">
                                    <thead>
                                        <tr>
                                            <th>Voucher</th>
                                            <th>Date</th>
                                            <th>Item</th>
                                            <th id="itemValue"></th>
                                            <th>Price</th>
                                            <th>Counter</th>
                                            <th >Counter Name</th>
                                            <th id="counterValue"></th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th></th>
                                            <th>Sub Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody id="tblBody">

                                    </tbody>
                                    <tfoot id="tblFoot">
                                        <tr id="trTax">
                                            <td colspan="11" style="text-align: right">Tax</td>
                                            <td id="tdTax">0</td>
                                        </tr>
                                        <tr id="trTotal">
                                            <td colspan="11" style="text-align: right">Total</td>
                                            <td id="total">0</td>
                                        </tr>
                                    </tfoot>
                                </table>

                            </div>
                            <p class="row offset-1 col-12">
                                {{-- <span class="col-3">
                                    <a href="{{ route('#purchaseList') }}"><button type="button" class="btn btn-dark">Back</button></a>
                                </span> --}}
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
        </div>
    </section>
</div>
@endsection

@section('jscript')
<script>
    // var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $(document).ready(function(e){
        //check the checkbox to show and hide counter name field
        $("input[type='checkbox']").on("click", function(){
            if($('#chkCounter').is(':checked'))
            {
                $("#counter").show();
                $('#chkCounter').val(1);
            }
            else{
                $("#counter").hide();
                $("#counterSel").val(0);
            }
        });

        // edible changes for discount radio button
        $("input[name='rdbDiscount']").on("click", function(){
            var value = $("input[name='rdbDiscount']:checked").val();
            if(value == 'cash')
            {
                $("#cash").prop('readOnly', false);
                $("#percent").prop('readOnly', true);
                $("#percent").val("");
            }
            else if(value == 'percent')
            {
                $("#percent").prop('readOnly', false);
                $("#cash").prop('readOnly', true);
                $("#cash").val("");
            }
        });

        // select 2 for item
        // $('.itemSelect').select2();
    });

    //onclick function for Add button
    var taxStatus = 0;
    function addPurchase()
    {
        //   $('td:nth-child(4),th:nth-child(4)').hide();
        //   $('td:nth-child(4)').hide();
        // $('#tblID th:nth-child('+ 3 +')').hide();
        var trRow,tdItem,chkbox,chebox1,itemName,counterName,discount,rdbValue,subTotal,allTotal;

        // get data from html page
        var voucher = $("#vID").val();
        var date = $('#date').val();
        var item = $("#itemSel").val();
        var price = parseInt($("#price").val());   
        var counter = $("#counterSel").val();
        var quantity = parseInt($("#quantity").val());

       
        var tax = parseInt($("#tax").val());

        // to get item name and counter name
        $.ajax({
            type        : 'get',
            url         : "{{ route('#ajaxPurchaseDataList') }}",
            dataType    : 'json',
            async       : false,
            success     : function(response){
                // for item selected value
                for (let i = 0; i < response.item.length; i++) 
                {
                    if (item == response.item[i].item_id) 
                    {
                        itemName = response.item[i].item;                      
                    }                   
                }

                // for coutner name selected value
                for (let r = 0; r < response.counter.length; r++) 
                {
                    if (counter == response.counter[r].counter_id) 
                    {
                        counterName = response.counter[r].counter_name;
                    }                    
                }
                // alert(counterName);
            }
        });
        // to get item and counter name

        //set data to table row
        trRow = $("<tr>");
        trTotal = $("<tr></tr>");

        tdVoucher = "<td>"+ voucher +"</td>";
        $(trRow).append(tdVoucher);

        tdDate = "<td>"+ date +"</td>";
        $(trRow).append(tdDate);

        tdItem = "<td>"+ itemName +"</td>";
        $(trRow).append(tdItem);

        tdItemValue = "<td>"+ item +"</td>";;
        // $(tdItemValue).text(item);
        // $(tdItemValue).hide();
        $(trRow).append(tdItemValue);
        
        tdPrice = "<td>"+ price +"</td>";
        $(trRow).append(tdPrice);

        if($('#chkCounter').is(':checked'))
        {
            chkBox = $('<input />', { type: 'checkbox'});
            $(chkBox).attr('checked', true);
            tdChk = $("<td>");
            $(tdChk).append(chkBox);
            $(trRow).append(tdChk);
        }
        if(!($('#chkCounter').is(':checked')))
        {
            chkBox1 = $('<input />', { type: 'checkbox'});
            tdChk1 = $("<td>");
            $(tdChk1).append(chkBox1);
            $(trRow).append(tdChk1);
        }
        
        tdCounterName = "<td>"+ counterName +"</td>";
        $(trRow).append(tdCounterName);
        tdCounterValue = "<td>"+ counter +"</td>";
        $(trRow).append(tdCounterValue);

        tdQuantity = "<td>"+ quantity +"</td>";
        $(trRow).append(tdQuantity);

         // add discount value in table
         var value = $("input[name='rdbDiscount']:checked").val();
        if(value == 'cash')
        {
            discount = parseInt($("#cash").val());
            subTotal = (price * quantity) - discount;
            rdbValue = 1;

            tdDiscount = "<td>"+ discount +"</td>";
            $(trRow).append(tdDiscount);
            tdRdb = "<td>"+ rdbValue +"</td>";
            $(trRow).append(tdRdb);
        }
        else
        {
            discount = parseInt($("#percent").val());
            percentDiscount = (discount / 100) * (price * quantity);
            subTotal = (price * quantity) - percentDiscount;
            rdbValue = 0;

            tdDiscount = "<td>"+ discount +"</td>";
            $(trRow).append(tdDiscount);
            tdRdb = "<td>"+ rdbValue +"</td>";
            $(trRow).append(tdRdb);
        }
        
        // subTotal = (price * quantity) - discount;
        tdSubTotal = "<td>"+ subTotal +"</td>";
        $(trRow).append(tdSubTotal);

        tdUD = "<td><button class='btn btn-info btn-sm btn-edit'>Edit</button><button class='btn btn-danger btn-sm btn-delete'>Delete</button></td>"
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
        $subTotal = $(this).parents("tr").find("td:eq(10)").text();
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
        $voucher = $(this).parents("tr").find("td:eq(0)").text();
        $date = $(this).parents("tr").find("td:eq(1)").text();
        $item = $(this).parents("tr").find("td:eq(2)").text();
        $itemValue = $(this).parents("tr").find("td:eq(3)").text();
        $price = $(this).parents("tr").find("td:eq(4)").text();
        $counter = $(this).parents("tr").find("td:eq(5)").text();
        $counterName = $(this).parents("tr").find("td:eq(6)").text();
        $counterValue = $(this).parents("tr").find("td:eq(7)").text();
        $quantity = $(this).parents("tr").find("td:eq(8)").text();
        $discount = $(this).parents("tr").find("td:eq(9)").text();

        //put discount in input box
        
        $discountValue = $(this).parents("tr").find("td:eq(10)").text();
        if($discountValue == 1)
        {
            $("#radioCash").prop('checked', true);
            $("#cash").val($discount);
            $("#cash").prop('readOnly', false);
            $("#percent").prop('readOnly', true);
        }
        else{
            
            $("#radioPercent").prop('checked', true);
            $("#percent").val($discount);
            $("#percent").prop('readOnly', false);
            $("#cash").prop('readOnly', true);
        }

        $tax = $("#tdTax").text();
        $total = $("#total").text();

        //to get item name and counter name
        $.ajax({
            type        : 'get',
            url         : "{{ route('#ajaxPurchaseDataList') }}",
            dataType    : 'json',
            async       : false,
            success     : function(response){

                // for item selected value
                for (let i = 0; i < response.item.length; i++) {
                    if (item == response.item[i].item_id) {
                        itemName = response.item[i].item;                      
                    }                   
                }

                // for coutner name selected value
                for (let r = 0; r < response.counter.length; r++) {
                    if (counterValue == response.counter[r].counter_id) {
                        counterName = response.counter[r].counter_name;
                    }                    
                }
            }
        });
        // to get item and counter name

        // put data from table to input field to edit
        $("#vID").val($voucher);
        $("#date").val($date);
        $("#tax").val($tax);
        $("#price").val($price);
        $("#quantity").val($quantity);
        // $("#discount").val($discount);

        //add highlight class name to know which row is selected
        $(this).parents("tr").addClass('highlight');
    });

    // edit function when edit button click
    function edit()
    {
        var trRow,tdItem,chkbox,chebox1,itemName,counterName,discount,rdbValue,subTotal,allTotal;
        var table = $("#tblBody");
        // get data from html page
        var voucher = $("#vID").val();
        var date = $('#date').val();
        var item = $("#itemSel").val();
        var price = parseInt($("#price").val());   
        var counterValue = $("#counterSel").val();
        var quantity = parseInt($("#quantity").val());
        var discount = parseInt($("#discount").val());

         
        var tax = $("#tax").val();
        var total = parseInt($("#total").text());

        //to get item name and counter name
        $.ajax({
            type        : 'get',
            url         : "{{ route('#ajaxPurchaseDataList') }}",
            dataType    : 'json',
            async       : false,
            success     : function(response){

                // for item selected value
                for (let i = 0; i < response.item.length; i++) {
                    if (item == response.item[i].item_id) {
                        itemName = response.item[i].item;                     
                    }                   
                }

                // for coutner name selected value
                for (let r = 0; r < response.counter.length; r++) {
                    if (counterValue == response.counter[r].counter_id) {
                        counterName = response.counter[r].counter_name;
                    }                    
                }
            }
        });
        // to get item and counter name

        
        table.find('tr').each(function(i){
            if($(this).hasClass('highlight'))
            {
                sub = parseInt($(this).find("td:eq(11)").text());
                allTotal = total - sub;
                $(this).find("td:eq(0)").text(voucher);
                $(this).find("td:eq(1)").text(date);
                $(this).find("td:eq(2)").text(itemName);
                $(this).find("td:eq(3)").text(item);
                $(this).find("td:eq(4)").text(price);
                // $(this).find("td:eq(5)").text(counterName);

                if($('#chkCounter').is(':checked'))
                {
                    chkBox = $('<input />', { type: 'checkbox'});
                    $(chkBox).attr('checked', true);
                    $(this).find("td:eq(5)").html(chkBox);
                }
                if(!($('#chkCounter').is(':checked')))
                {
                    chkBox1 = $('<input />', { type: 'checkbox'});
                    $(this).find("td:eq(5)").html(chkBox1);
                }
                $(this).find("td:eq(6)").text(counterName);
                $(this).find("td:eq(7)").text(counterValue);
                $(this).find("td:eq(8)").text(quantity);

                // add discount value in table
                var value = $("input[name='rdbDiscount']:checked").val();
                if(value == 'cash')
                {
                    discount = parseInt($("#cash").val());
                    subTotal = (price * quantity) - discount;
                    rdbValue = 1;
                    $(this).find("td:eq(9)").text(discount);
                    $(this).find("td:eq(10)").text(rdbValue);

                }
                else
                {
                    percent = parseInt($("#percent").val());
                    discount = (percent / 100) * (price * quantity);
                    subTotal = (price * quantity) - discount;
                    rdbValue = 0;

                    $(this).find("td:eq(9)").text(percent);
                    $(this).find("td:eq(10)").text(rdbValue);

                }

                $(this).find("td:eq(11)").text(subTotal);

            }
        });
        allTotal = subTotal + allTotal;
        $("#tdTax").text(tax);
        $("#total").text(allTotal);

        table.find('tr').each(function(i){
            if($(this).hasClass('highlight'))
            {
                $(this).parents("tr").removeClass('highlight');
            }
        });
        cleanForm();

        // hide and show edit and cancel button after edit button click
        $("#divEdit").hide();
        $("#divAdd").show();
    }

    //cancel button click when edit
    function cancel()
    {
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
        $("#chkCounter").prop("checked" , false);
        $("#counterSel").val(0);
        $("#quantity").val(0);
        $("#cash").val(0);
        $("#cash").prop('readOnly' , false);
        $("#cash").prop('checked', true);
        $("#percent").val(0);
        $("#percent").prop('readOnly', true);
    }

    function save(){
        var $ary = [];
        var voucher, date, item, itemValue, price, counter, counterName, quantity, discount, tax;
        var table = $("#tblBody");
        table.find('tr').each(function(i){

            var $tds = $(this).find('td');
            voucher = $tds.eq(0).text();
            date = $tds.eq(1).text();
            item = $tds.eq(2).text();
            itemValue = $tds.eq(3).text();
            price = $tds.eq(4).text();
            cValue = $tds.eq(5).html();


            if($(cValue).is(':checked'))
            {
                counter = 1;

            }
            if(!($(cValue).is(':checked')))
            {
                counter = 0;
            }
            counterName = $tds.eq(6).text();
            counterValue = $tds.eq(7).text();
            quantity = $tds.eq(8).text();
            discount = $tds.eq(9).text();
            $discountValue = $tds.eq(10).text();
            subTotal = $tds.eq(11).text();
            tax = $("#tdTax").text();
            total = $("#total").text();

            $purchase = {
                'voucher' : voucher,
                'date' : date,
                // 'item' : item,
                'item' : itemValue,
                // 'itemValue' : itemValue,
                'price' : price,
                'counter' : counter,
                // 'counter' : counterName,
                'counter_name' : counterValue,
                // 'counterValue' : counterValue,
                'quantity' : quantity,
                'discount' : discount,
                'cash_percent' : $discountValue,
                'sub_total' : subTotal,
                //'subTotal' : subTotal,
                'tax' : tax,
                'total' : total,
                'remove_status' : 1
            };
            $ary.push($purchase);
        });

        $.ajax({
                type        : "get",
                url         : "{{ route('#createPurchase') }}",
                dataType    :"json",
                data        : {data : $ary},
                success     : function(response){
                    if(response.status == 'success')
                    {
                        console.log(response.status);
                        window.location.href = "http://localhost/Beauty_Saloon_Project/public/purchase";
                    }
                }
            });
    };
</script>
@endsection