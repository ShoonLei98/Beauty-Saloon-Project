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
                                <form action="{{ route('#updatePromotion') }}" class="form-horizontal" method="POST">
                                    @csrf
                                    <input type="text" name="promoID" id="" style="display: none" value="{{ $promotion->promo_id }}">
                                    <div class="form-group row mt-1 mb-2">
                                        <label for="" class="col-sm-4 col-form-label">Promotion Name</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="name" id="" value="{{ old('name', $promotion->promo_name) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3 mb-2">
                                        <label for="" class="col-sm-4 col-form-label">Item</label>
                                        <div class="col-sm-8">
                                            <select name="item" id="itemSel" class="itemSelect form-control">
                                                <option value="{{ $promotion->item }}">{{ $promotion->item_name }}</option>
                                                @foreach ($data as $item)
                                                    @if ($item->item_id != $promotion->item)
                                                        <option value="{{ $item->item_id }}">{{ $item->item }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3 mb-2">
                                        <label for="" class="col-sm-4 col-form-label">From Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="date" name="fromDate" id="fromDate" value="{{ old('fromDate', $promotion->from_date) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mt-3 mb-2">
                                        <label for="" class="col-sm-4 col-form-label">To Date</label>
                                        <div class="col-sm-8">
                                            <input class="form-control"  type="date" name="toDate" id="toDate" value="{{ old('toDate', $promotion->to_date) }}">
                                        </div>
                                    </div>

                                    <div class="form-group row mb-2">
                                        {{-- <label for="" class="col-sm-3 col-form-label">Sale Available</label> --}}
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Normal</label>
                                            @if ($promotion->promo_type == 0)
                                                <input type="radio" checked name="rdbPromotion" id="normalPro" value="0">
                                            @else
                                                <input type="radio" name="rdbPromotion" id="normalPro" value="0">
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Counter</label>
                                            @if ($promotion->promo_type == 1)
                                                <input type="radio" checked name="rdbPromotion" id="counterPro" value="1">  
                                            @else
                                                <input type="radio" name="rdbPromotion" id="counterPro" value="1">                                               
                                            @endif
                                        </div>
                                        <div class="col-sm-4">
                                            <label for="" class="col-form-label">Both</label>
                                            @if ($promotion->promo_type == 2)
                                                <input type="radio" checked name="rdbPromotion" id="both" value="2">
                                            @else
                                                <input type="radio" name="rdbPromotion" id="both" value="2">
                                            @endif
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
                                                    @if ($promotion->discount_value == 1)
                                                        <input type="number" name="cash" id="cash" class="form-control" value="{{ old('cash', $promotion->discount) }}">
                                                    @else
                                                        <input type="number" name="cash" id="cash" class="form-control" value="">
                                                    @endif
                                                </div>
                                                <div class="mt-2">
                                                    @if ($promotion->discount_value == 0)
                                                        <input type="number" readonly name="percent" id="percent" class="form-control" value="{{ old('cash', $promotion->discount) }}">
                                                    @else
                                                        <input type="number" readonly name="percent" id="percent" class="form-control" value="">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="" id="discountAmt" style="display: none">
                                        <div class="form-group row mt-3 mb-2">
                                            <label for="" class="col-sm-4 col-form-label">From Counter</label>
                                            <div class="col-sm-8">
                                                @if ($promotion->promo_type == 2)
                                                    <input class="form-control" type="number" name="counterDiscount" id="fromCounter" value="{{ old('counterDiscount', $promotion->counter_discount) }}">
                                                @else
                                                    <input class="form-control" type="number" name="counterDiscount" id="fromCounter" value="">
                                                @endif

                                            </div>
                                        </div>
    
                                        <div class="form-group row mt-3 mb-2">
                                            <label for="" class="col-sm-4 col-form-label">From Shop</label>
                                            <div class="col-sm-8">
                                                @if ($promotion->promo_type == 2)
                                                    <input class="form-control"  type="number" name="shopDiscount" id="fromShop" value="{{ old('shop_discount', $promotion->shop_discount) }}">
                                                    @else
                                                    <input class="form-control" type="number" name="shopDiscount" id="fromShop" value="">
                                                @endif
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

        if($("#both").is(':checked'))
        {
            $("#discountAmt").show();
        }
    });
</script>
@endsection