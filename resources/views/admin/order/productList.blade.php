@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12"
                    <div class="table-responsive table-responsive-data2">
                        <a href="{{route('admin#orderList')}} " class="text-decoration-none text-dark"><i class="fa-solid fa-arrow-left me-2"></i> back</a>
                         <div class="col-5">
                            <div class="card mt-4">
                                <div class="card">
                                <div class="card-body">
                                    <h3><i class="fa-regular fa-clipboard me-2"></i>Order Info
                                    </h3>
                                    <small class="text-warning">include delivery charges<i class="fa-solid fa-triangle-exclamation ms-2"></i></small>
                                </div>

                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col"><i class="fa-solid fa-user me-2"></i>Customer Name</div>
                                        <div class="col text-primary">{{strtoupper($orderList[0]->user_name)}}</div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><i class="fa-solid fa-barcode me-2"></i> Order Code</div>
                                        <div class="col text-primary">{{$orderList[0]->order_code}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><i class="fa-solid fa-calendar-days me-2"></i>Order Date</div>
                                        <div class="col text-primary">{{$orderList[0]->created_at->format('F-j-Y')}} </div>
                                    </div>
                                    <div class="row">
                                        <div class="col"><i class="fa-solid fa-money-bill-wave me-2"></i> Price</div>
                                        <div class="col text-primary">{{$order->total_price}} kyats </div>
                                    </div>
                                </div>
                            </div>
                         </div>
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                     <th></th>
                                    <th> User ID</th>
                                    <th> User Name</th>
                                    <th>Product Image</th>
                                    <th>Product Name</th>
                                    <th>Order Date</th>
                                    <th> Qty</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody id="dataList">
                                  @foreach ($orderList as $o )
                                  <tr>
                                    <td> </td>
                                     <td>{{$o->user_id}} </td>
                                     <td>{{$o->user_name}} </td>
                                     <td class="col-2"> <img src="{{asset('storage/'.$o->product_image)}} "> </td>
                                     <td>{{$o->product_name}} </td>
                                     <td>{{$o->created_at->format('F-j-Y')}} </td>
                                     <td>{{$o->qty}} </td>
                                     <td>{{$o->total}} kyats </td>
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

