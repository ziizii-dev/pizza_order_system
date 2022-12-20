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
                                <h2 class="title-1">Contact List</h2>
                            </div>
                        </div>

                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <h4> Total- {{$contacts ->total()}} </h4>
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Date</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody >

                               @foreach ($contacts as $contact )
                               <tr>
                                 {{-- <input type="text" id="userId" value="{{$contact->id}} " > --}}

                                       <td>{{$contact->id}}</td>
                                       <td>{{$contact->name}} </td>
                                       <td>{{$contact->email}}</td>
                                       <td>{{$contact->message}} </td>
                                       <td>{{$contact->created_at->format('F-j-Y')}} </td>
                                       <td class=""><a href="{{route('admin#userDelete',$contact->id)}} ">
                                        <button class="item me-1" data-toggle="tooltip" data-placement="top" title="Delete Contact">
                                            <i class="fa-solid fa-trash" name="deleteBtn"></i>
                                          </button>
                                       </a></td>

                               </tr>
                               @endforeach

                            </tbody>
                        </table>
                        <div class=" mt-3">
                            {{$contacts->links()}}

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
{{-- @section('scriptSource')
<script>
     $(document).ready(function(){
       $('.changeStatus').change(function(){
    //     $currentStatus = $(this).val();
    //   $parentNode = $(this).parents('tr');
    //   $userId = $parentNode.find('#userId').val();
    //           $data = { 'userId':$userId, 'role':$currentStatus},
    //           $.ajax({
    //             type:'get',
    //             url:'http://127.0.0.1:8000/user/change/role',
    //             data: $data,
    //             dataType:'json',
    //           })
    //           location.reload();


       })
     });
</script>

@endsection
 --}}
