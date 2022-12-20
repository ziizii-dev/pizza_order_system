@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->
                    <div class="table-data__tool">
                        <div class="table-data__tool-left">
                            <div class="overview-wrap">
                                <h2 class="title-1">Order List</h2>

                            </div>
                        </div>

                    </div>
                    @if (session('deleteSuccess'))
                        <div class=" col-4 offset-8">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-xmark"></i> {{ session('deleteSuccess') }}

                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-3">
                            <h4 class="text-secondary">
                                Search key: <span class="text-primary"> {{ request('key') }}</span>
                            </h4>
                        </div>
                        <div class=" col-3 offset-6">
                            <form class=" " action="{{ route('product#list') }} " method="get">
                                @csrf
                                <div class="d-flex">
                                    <input class="form-control" type="text" name="key" placeholder="Search....."
                                        value="{{ request('key') }} " />
                                    <button class="btn btn-primary text-white" type="submit">
                                        <i class="zmdi zmdi-search"></i>
                                    </button>

                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row my-2 float-right offset-1">
                        <div class="">
                            <span class=" badge text-bg-primary">{{ count($order) }} </span>
                            <i class="fa-solid fa-database m-1"> </i>
                        </div>
                    </div>
                    <form action="{{route('admin#changeStatus')}}" method="GET">
                        @csrf
                        <div class="d-flex">
                            <label for="" class="mt-1 me-4">Order Status</label>
                            <select name="orderStatus" id="orderStatus" class="col-2">
                                <option value="">All</option>
                                <option value="0"@if (request('orderStatus') =='0') selected @endif>Pending</option>
                                <option value="1"@if (request('orderStatus') =='1') selected @endif>Accept</option>
                                <option value="2"@if (request('orderStatus') =='2') selected @endif>Reject</option>
                            </select>
                            <button type="submit" class="btn-sm bg-dark text-white px-2"><i class="fa-solid fa-magnifying-glass me-2"></i>Search</button>
                        </div>
                    </form>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>

                                    <th> User ID</th>
                                    <th> User Name</th>
                                    <th>Order Date</th>
                                    <th>Order Code</t>
                                    <th>Amount</th>
                                    <th> Status</th>

                                </tr>
                            </thead>
                            <tbody id="dataList">
                                @foreach ($order as $o)
                                    <tr class="tr-shadow">
                                       <input type="hidden" class="orderId" value="{{$o->id}} ">
                                        <td class="col-3">{{ $o->user_id }} </td>
                                        <td class="col-3">{{ $o->user_name }} </td>
                                        <td class="col-3">{{ $o->created_at->format('F-j-Y') }} </td>
                                        <td class="col-3">
                                             <a href="{{route('admin#listInfo',$o->order_code)}} ">{{ $o->order_code }}</a>
                                        </td>
                                        <td class="col-3">{{ $o->total_price }} </td>
                                        <td class="col-3">
                                            <select name="status" class="statusChange">

                                                <option value="0" @if ($o->status == 0) selected @endif>
                                                    Pending....</option>
                                                <option value="1" @if ($o->status == 1) selected @endif>
                                                    Accept</option>
                                                <option value="2" @if ($o->status == 2) selected @endif>
                                                    Reject</option>
                                            </select>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class=" mt-3">
                            {{-- {{$order->links()}} --}}

                            {{-- {{$categories->appends(request()->query())->links()}} --}}
                        </div>
                    </div>
                    <!-- END DATA TABLE -->
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection
@section('scriptSource')
    <script>
        $(document).ready(function() {
            $('#orderStatus').change(function() {
                $status = $('#orderStatus').val();
                // console.log($status);
                // $.ajax({
                //     type: 'get',
                //     url: 'http://127.0.0.1:8000/order/ajax/status',
                //     data: {
                //         'status': $status
                //     },
                //     dataType: 'json',
                //     success: function(response) {
                //         $list = " ";
                //         for ($i = 0; $i < response.length; $i++) {
                //             $months = ['January','February','March','April','May','June','July','Auguest','Setemper','October','November','December'];
                //             $dbDate = new Date(response[$i].created_at);
                //             $finalDate = $months[$dbDate.getMonth()]+"-"+$dbDate.getDate()+"-"+ $dbDate.getFullYear();
                //            if(response[$i].status == 0){
                //             $statusMessage =` <select name="status" class="statusChange">
                //                   <option value="0" selected >Pending</option>
                //                   <option value="1">Accept</option>
                //                   <option value="2" >Reject</option>
                //                </select>`;
                //            }else if(response[$i].status == 1){
                //             $statusMessage = ` <select name="status" class="statusChange">
                //                   <option value="0" >Pending</option>
                //                   <option value="1" selected>Accept</option>
                //                   <option value="2" >Reject</option>
                //                </select>`;
                //            }else if(response[$i].status == 2){
                //             $statusMessage = ` <select name="status" class="statusChange">
                //                   <option value="0" >Pending</option>
                //                   <option value="1" >Accept</option>
                //                   <option value="2" selected >Reject</option>
                //                </select>`;
                //            }

                //             $list += `<tr class="tr-shadow">
                //                 <input type="hidden" class="orderId" value="${response[$i].id}">
                //                     <td class="col-3" >${response[$i].user_id} </td>
                //                     <td class="col-3" >${response[$i].user_name} </td>
                //                     <td class="col-3" >${$finalDate} </td>
                //                     <td class="col-3" >${response[$i].order_code} </td>
                //                     <td class="col-3" >${response[$i].total_price}kyats</td>
                //                    <td class="col-3">${$statusMessage} </td>

                //      </tr>`;
                //         }
                //         $('#dataList').html($list);
                //     }

                // })
            })
            //change status
            $('.statusChange').change(function(){
                $currentStatus = $(this).val();
                $parentNode = $(this).parents("tr");
                $orderId = $parentNode.find('.orderId').val();

                $data = {
                    'orderId':$orderId,
                    'status': $currentStatus

                };

                $.ajax({
                    type:'get',
                    url:'http://127.0.0.1:8000/order/ajax/change/status',
                    data:$data,
                    dataType:'json',
                });
                location.reload();
            })

        })
    </script>


@endsection
