@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="col-md-12">
                    <!-- DATA TABLE -->

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
                            <form class=" " action="{{ route('admin#list') }} " method="get">
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
                            <span class=" badge text-bg-primary">{{ $admin->total() }}</span>
                            <i class="fa-solid fa-database m-1"> </i>
                        </div>
                    </div>
                    {{-- @if (count($categories) != 0) --}}
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th > Name</th>
                                          <th >Email</th>
                                          <th>Gender</th>
                                          <th>Phone</th>
                                          <th>Address</th>
                                           <th ></th>
                            </tr>
                        </thead>
                        <tbody>
                               @foreach ($admin as $a)
                                    <tr class="tr-shadow my-3">
                                        <td class="col-2">
                                            @if ($a->image == null)
                                                @if ($a->gender == 'male')
                                                <img src="{{asset('image/default_user.png')}} " class="image thumbnail shadow-sm" >

                                                @else
                                                <img src="{{asset('image/female_default.jpg')}} " class="image thumbnail shadow-sm" >

                                                @endif
                                            @else
                                            <img src="{{asset('storage/'.$a->image)}} " class="image thumbnail shadow-sm" >
                                            @endif
                                        </td>
                                        <td > {{$a->name}}</td>
                                          <td >{{$a->email}} </td>
                                          <td>{{$a->gender}} </td>
                                          <td>{{$a->phone}} </td>
                                          <td>{{$a->address}} </td>
                                          <td>
                                             @if (Auth::user()->id == $a->id)

                                             @else

                                             <div class="table-data-feature">
                                                <a href="{{route('admin#changeRole',$a->id)}} ">
                                                    <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                        title="Change role">
                                                        <i class="fa-solid fa-person-booth"></i>
                                                    </button>
                                                     </a>
                                                <a href="{{route('admin#delete',$a->id)}} ">
                                               <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                   title="Delete">
                                                 <i class="zmdi zmdi-delete"></i>
                                               </button>
                                                </a>
                                           </div>
                                             @endif
                                           </td>
                                    </tr>
                            @endforeach

                    </tbody>
                    </table>
                    <div class=" mt-3">
                        {{ $admin->links() }}

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
