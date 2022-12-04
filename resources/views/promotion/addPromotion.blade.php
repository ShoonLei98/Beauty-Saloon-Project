@extends('Layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid mt-5" style="width: 450px">
            <div class="row">
                <div class="col-12">
                    <div class="card mt-3">
                        <div class="card-header text-center">
                            <h3 class="card-title mt-2 text-center">
                                Add Promotion
                            </h3>
                        </div>
                        <div class="card-body">
                            <div class="tab-content">
                                <form action="{{ route('#insertPromotion') }}" class="form-horizontal" method="POST">
                                    @csrf

                                    <div class="form-group row mt-1 mb-2">
                                        <label for="" class="col-sm-4 col-form-label">Promotion Name</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="name" id="">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3 mb-2">
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

                                    <div class="form-group row mt-3 mb-2">
                                        <label for="" class="col-sm-4 col-form-label">From Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="date" name="fromDate" id="fromDate">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3 mb-2">
                                        <label for="" class="col-sm-4 col-form-label">To Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control"  type="date" name="toDate" id="toDate">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        {{-- <label for="" class="col-sm-3 col-form-label">Sale Available</label> --}}
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Normal</label>
                                            <input type="radio" checked name="rdbPromotion" id="normalPro" value="0">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Counter</label>
                                            <input type="radio" name="rdbPromotion" id="counterPro" value="1">
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Both</label>
                                            <input type="radio" name="rdbPromotion" id="both" value="2">
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
                                    </div>

                                    <div class="" id="discountAmt" style="display: none">
                                        <div class="form-group row mt-3 mb-2">
                                            <label for="" class="col-sm-4 col-form-label">From Counter</label>
                                            <div class="col-sm-8">
                                                <input class="form-control" type="number" name="counterDiscount" id="fromCounter">
                                            </div>
                                        </div>
    
                                        <div class="form-group row mt-3 mb-2">
                                            <label for="" class="col-sm-4 col-form-label">From Shop</label>
                                            <div class="col-sm-8">
                                                <input class="form-control"  type="number" name="shopDiscount" id="fromShop">
                                            </div>
                                        </div>
                                    </div>

                                    <p class="row offset-1 col-12">
                                        <span class="col-3">
                                            <a href="{{ route('#promotionList') }}"><button type="button" class="btn btn-dark">Back</button></a>
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
@endsection

@section('jscript')
<script>
    $(document).ready(function(e){
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
                if($("#both").is(":checked"))
                {
                    // alert("hi");
                    $("#percent").prop('readOnly', true);
                    $("#cash").prop('readOnly', false);
                    $("#cash").val("");
                }
                else
                {

                    $("#percent").prop('readOnly', false);
                    $("#cash").prop('readOnly', true);
                    $("#cash").val("");
                }
            }
        });

        $("#both").on("click", function(){
                $("#cash").prop('readOnly', false);
                $("#percent").prop('readOnly', true);
                $("#percent").val("");

                $("#discountAmt").show();
        });

        $("#normalPro").on("click", function(){
            $("#discountAmt").hide();

        });

        $("#counterPro").on("click", function(){
            $("#discountAmt").hide();

        });
    });
</script>
@endsection