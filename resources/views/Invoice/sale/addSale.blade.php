@extends('Layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid ml-1 mt-2 text-center" style="width: 100%">
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

                    {{-- <div class="col-sm-2">
                        <input type="button" value="OK" id="btnOK" class="btn btn-dark">
                    </div> --}}

                    <div class="col-sm-2">
                        <span class="">
                            <a href="{{ route('#saleInvoiceList') }}"><button type="button" class="btn btn-dark">Back</button></a>
                        </span>
                    </div>
                </div>

                <div class="row">
                    {{-- <div class="col-12">
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
                    </div> --}}
    
                    {{-- for input div --}}
                    <div class="col-2 border border-1" style="border-radius: 15px">
    
                        {{-- <input type="text" id="rowID" style="display: none"> --}}
    
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

                        {{-- <div class="form-group row mb-3">
                            <label for="" class="col-sm-4 col-form-label">Card</label>
                            <div class="col-sm-8">
                                <select name="card" id="cardSel" class="itemSelect form-control">
                                    <option value=0>Choose Card</option>
                                    @foreach ($card as $item)
                                        <option value="{{ $item->card_id }}">{{ $item->card_number }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="" class="col-sm-5 col-form-label"> Card Discount</label>
                            <div class="col-sm-7">
                                <input type="number" readonly name="discount" id="discount" class="form-control">
                            </div>
                        </div>  --}}
    
                        <div class="form-group row mb-3">
                            <label for="" class="col-sm-5 col-form-label">Quantity</label>
                            <div class="col-sm-7">
                                <input type="number" name="quantity" id="quantity" value="0" class="form-control">
                            </div>
                        </div>
    
                        {{-- <div class="form-group mb-1">
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
                                        <input type="number" name="cash" id="cash" value="0" class="form-control">
                                    </div>
                                    <div class="mt-2">
                                        <input type="number" readonly name="percent" value="0" id="percent" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div> --}} 
    
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
                                        {{-- <th>Card</th> --}}
                                        <th>Promotion Discount</th>
                                        {{-- <th>Card Discount</th> --}}
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
    </section>
</div>
@endsection

@section('jscript')
<script>
$(document).ready(function(e){
     // edible changes for discount radio button
    //  $("input[name='rdbDiscount']").on("click", function(){
    //         var value = $("input[name='rdbDiscount']:checked").val();
    //         if(value == 'cash')
    //         {
    //             $("#cash").prop('readOnly', false);
    //             $("#percent").prop('readOnly', true);
    //             $("#percent").val("0");
    //         }
    //         else if(value == 'percent')
    //         {
    //             $("#percent").prop('readOnly', false);
    //             $("#cash").prop('readOnly', true);
    //             $("#cash").val("0");
    //         }
    //     });

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
});

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

        // add discount value in table
        // var value = $("input[name='rdbDiscount']:checked").val();
        // if(value == 'cash')
        // {
        //     discount = parseInt($("#cash").val());
        //     subTotal = (price * quantity) - discount;
        //     rdbValue = 1;

        //     tdDiscount = "<td>"+ discount +"</td>";
        //     $(trRow).append(tdDiscount);
        //     tdRdb = "<td>"+ rdbValue +"</td>";
        //     $(trRow).append(tdRdb);
        // }
        // else
        // {
        //     discount = parseInt($("#percent").val());
        //     percentDiscount = (discount / 100) * (price * quantity);
        //     subTotal = (price * quantity) - percentDiscount;
        //     rdbValue = 0;

        //     tdDiscount = "<td>"+ discount +"</td>";
        //     $(trRow).append(tdDiscount);
        //     tdRdb = "<td>"+ rdbValue +"</td>";
        //     $(trRow).append(tdRdb);
        // }


        subTotal = (price * quantity) - discount;
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

        //put discount in input box
        
        // $discountValue = $(this).parents("tr").find("td:eq(6)").text();
        // if($discountValue == 1)
        // {
        //     $("#radioCash").prop('checked', true);
        //     $("#cash").val($discount);
        //     $("#cash").prop('readOnly', false);
        //     $("#percent").prop('readOnly', true);
        // }
        // else{
            
        //     $("#radioPercent").prop('checked', true);
        //     $("#percent").val($discount);
        //     $("#percent").prop('readOnly', false);
        //     $("#cash").prop('readOnly', true);
        // }

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

                // add discount value in table
                // var value = $("input[name='rdbDiscount']:checked").val();
                // if(value == 'cash')
                // {
                //     discount = parseInt($("#cash").val());
                //     subTotal = (price * quantity) - discount;
                //     rdbValue = 1;
                //     $(this).find("td:eq(5)").text(discount);
                //     $(this).find("td:eq(6)").text(rdbValue);
                // }
                // else
                // {
                //     percent = parseInt($("#percent").val());
                //     discount = (percent / 100) * (price * quantity);
                //     subTotal = (price * quantity) - discount;
                //     rdbValue = 0;

                //     $(this).find("td:eq(5)").text(percent);
                //     $(this).find("td:eq(6)").text(rdbValue);

                // }

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
</script>
@endsection