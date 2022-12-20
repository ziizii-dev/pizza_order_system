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
                                <h2 class="title-1">Category List</h2>

                            </div>
                        </div>
                        <div class="table-data__tool-right">
                            <a href="{{ route('category#createPage') }} ">
                                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>add category
                                </button>
                            </a>
                            <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                                CSV download
                            </button>
                        </div>
                    </div>
                    {{-- @if (session('categorySuccess'))
               <div class=" col-4 offset-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i> {{session('categorySuccess')}}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
               @endif --}}

                    @if (session('categoryDelete'))
                        <div class=" col-4 offset-8">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-xmark"></i> {{ session('categoryDelete') }}

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
                            <form class=" " action="{{ route('category#list') }} " method="get">
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
                            <span class=" badge text-bg-primary">{{ $categories->total() }}</span>
                            <i class="fa-solid fa-database m-1"> </i>
                        </div>
                    </div>
                    @if (count($categories) != 0)
                        <div class="table-responsive table-responsive-data2">
                            <table class="table table-data2 text-center">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th ">Category Name</th>
                                <th >Created Date</th>
                                <th ></th>
                            </tr>
                        </thead>
                        <tbody>
                               @foreach ($categories as $category)
                                    <tr class="tr-shadow my-3">
                                        <td>{{ $category->id }} </td>
                                        <td class="col-6">{{ $category->name }} </td>
                                        <td>{{ $category->created_at->format('j-F-Y') }} </td>
                                        <td>
                                            <div class="table-data-feature">
                                                {{-- <button class="item" data-toggle="tooltip" data-placement="top" title="view">
                                        <i class="fa-solid fa-eye"></i>
                                    </button> --}}
                                                <a href="{{ route('category#edit',$category->id)}} ">
                                                    <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                        title="Edit">
                                                        <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                </a>
                                                <a href="{{ route('category#delete', $category->id) }} ">
                                                    <button class="item me-1" data-toggle="tooltip" data-placement="top"
                                                        title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                    @endforeach

                    </tbody>
                    </table>
                    <div class=" mt-3">
                        {{ $categories->links() }}

                        {{-- {{$categories->appends(request()->query())->links()}} --}}
                    </div>
                </div>
            @else
                <h3 class="text-secondary text-center mt-5">There is no categories here! </h3>

                @endif

                <!-- END DATA TABLE -->
            </div>
        </div>
    </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection
