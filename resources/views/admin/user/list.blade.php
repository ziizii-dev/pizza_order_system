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
                                <h2 class="title-1">user List</h2>

                            </div>
                        </div>

                    </div>
                    <div class="table-responsive table-responsive-data2">
                        <h4> Total- {{$users ->total()}} </h4>
                        <table class="table table-data2 text-center">
                            <thead>
                                <tr>

                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Gender</t>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Role</th>
                                    <th></th>

                                </tr>
                            </thead>
                            <tbody >
                               @foreach ($users as $user)
                               <tr>
                                <td class="col-1">
                                    @if ($user->image == null)
                                    @if ($user->gender == 'male')
                                    <img src="{{asset('image/default_user.png')}} " class="image thumbnail shadow-sm" >
                                    @else
                                    <img src="{{asset('image/female_default.jpg')}} " class="image thumbnail shadow-sm" >
                                    @endif
                                    @else
                                        <img src="{{asset('storage/'.$user->image)  }} " alt="John Doe" />
                                    @endif
                                </td>
                                <input type="hidden" id="userId" value="{{$user->id}} " >
                                <td>{{$user->name}} </td>
                                <td>{{$user->email}} </td>
                                <td>{{$user->gender}} </td>
                                <td>{{$user->phone}} </td>
                                <td>{{$user->address}}</td>
                                <td>
                                    <select class="changeStatus">
                                        <option value="user" @if ($user->role == 'user') selected @endif >user</option>
                                        <option value="admin" @if ($user->role == 'admin') selected @endif >admin</option>
                                    </select>
                                </td>
                                <td>
                                    <a href="{{route('admin#deleteUserList', $user->id)}}">
                                        <button class="item me-1" data-toggle="tooltip" data-placement="top" title="Delete User">
                                            <i class="fa-solid fa-trash" name="deleteBtn"></i>
                                          </button>
                                    </a>
                                </td>
                               </tr>

                               @endforeach

                            </tbody>
                        </table>
                        <div class=" mt-3">
                            {{$users->links()}}

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
     $(document).ready(function(){
       $('.changeStatus').change(function(){
        $currentStatus = $(this).val();
      $parentNode = $(this).parents('tr');
      $userId = $parentNode.find('#userId').val();
              $data = { 'userId':$userId, 'role':$currentStatus},
              $.ajax({
                type:'get',
                url:'http://127.0.0.1:8000/user/change/role',
                data: $data,
                dataType:'json',
              })
              location.reload();


       })
     });
</script>

@endsection

