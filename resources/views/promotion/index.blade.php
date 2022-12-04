@extends('Layouts.app')
 @section('content')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            @if (Session::has('createSuccess'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('createSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('updateSuccess'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('updateSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('deleteSuccess'))
                <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                    {{ Session::get('deleteSuccess') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header row">
                           <div class="col-sm-2">
                                <h3 class="card-title mt-3 mr-5">
                                    <a href="{{ route('#addPromotion') }}">
                                        <button class="btn btn-sm btn-outline-dark">Add Promotion</button>
                                    </a>
                                </h3>
                           </div>
                            <div class="col-sm-8">
                                <form action="{{ route('#dateList') }}" class="form-horizontal" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-sm-5">
                                            <div class="form-group row mt-3 mb-2 ">
                                                <label for="" class="col-sm-3 col-form-label">From Date</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control" type="date" name="fromDate" id="fromDate" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <div class="form-group row mt-3 mb-2">
                                                <label for="" class="col-sm-3 col-form-label">To Date</label>
                                                <div class="col-sm-9">
                                                    <input class="form-control"  type="date" name="toDate" id="toDate" >
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-2 mt-3">
                                            <button type="submit" class="btn btn-info text-right" style="text-align: right">Go</button>
                                        </div>
                                        
                                    </div>
                                </form>                                
                            </div>
                            <div class="col-sm-2 mt-3">
                                <select name="activeStatus" id="option" class="itemSelect form-control">
                                    <option value="0">Choose Option</option>
                                    <option value="1">Active</option>
                                    <option value="2">Inactive</option>
                                </select>
                            </div>
                        </div>
                        <div class="card-body table-responsive p-0" id="dataList">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Item</td>
                                        <td>Promotion</td>
                                        <td>From Date</td>
                                        <td>To Date</td>
                                        <td>Type</td>
                                        <td>Discount</td>
                                        <td>Active</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody id="tblBody">
                                    @foreach ($promotion as $item)
                                    <tr>
                                        <td>{{ $item->promo_id }}</td>
                                        <td>
                                            @foreach ($itemData as $data)
                                                @if ($item->item == $data->item_id)
                                                    {{ $data->item }}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{ $item->promo_name }}</td>
                                        <td>{{ $item->from_date }}</td>
                                        <td>{{ $item->to_date }}</td>
                                        <td>
                                            @if ($item->promo_type == 0)
                                                Normal
                                            @elseif ($item->promo_type == 1)
                                                Counter
                                            @elseif ($item->promo_type == 2)
                                                Both
                                            @endif
                                        </td>
                                        <td>{{ $item->discount }}</td>
                                        <td>{{ $item->active_status }}</td>
                                        <td>
                                            <a href="{{ route('#editPromotion', $item->promo_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                            <a href="{{ route('#deletePromotion', $item->promo_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
        $(document).ready(function(){
            $("#option").change(function(){
                $eventOption = $("#option").val();
                // console.log($eventOption);
                $.ajax({
                        type        : "get",
                        url         : "{{ route('#ajaxList') }}",
                        dataType    :"json",
                        data        : {data : $eventOption},
                        success     : function(response){
                            $list = '', $promoType='';
                            for($i = 0; $i<response.data.length; $i++)
                            {
                                if (response.data[$i].promo_type == 0)
                                {
                                    $promoType = "Normal"
                                }
                                else if (response.data[$i].promo_type == 1)
                                {
                                    $promoType = "Counter"
                                }
                                else if (response.data[$i].promo_type == 2)
                                {
                                    $promoType = "Both"
                                }

                                $list += `
                                <tr>
                                        <td>${response.data[$i].promo_id}</td>
                                        <td>${response.data[$i].item_name}</td>
                                        <td>${response.data[$i].promo_name}</td>
                                        <td>${response.data[$i].from_date}</td>
                                        <td>${response.data[$i].to_date}</td>
                                        <td>${$promoType} </td>
                                        <td>${response.data[$i].discount}</td>
                                        <td>${response.data[$i].active_status}</td>
                                        <td>
                                            <a href="{{ route('#editPromotion', $item->promo_id) }}"><button class="btn btn-sm bg-dark text-white"><i class="fas fa-edit"></i></button></a>
                                            <a href="{{ route('#deletePromotion', $item->promo_id) }}"><button class="btn btn-sm bg-danger text-white"><i class="fas fa-trash-alt"></i></button></a>
                                        </td>
                                    </tr>
                                `;
                            }
                            // console.log($list);
                            $("#tblBody").html($list);
                        }
                    });
            });
        });
    </script>
 @endsection