@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
        <div class="row">
            <div class="col-3 offset-7 mb-2">
                @if (session('updateSuccess'))
               <div class="">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-check"></i> {{session('updateSuccess')}}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
            </div>
               @endif
            </div>
        </div>
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                {{-- <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{route('category#list')}} "><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div> --}}
                <div class="col-lg-10 offset-1">
                    <div class="card">

                        <div class="card-body">
                            <div class=" ms-5">
                                {{-- <a href="{{route('product#list')}} ">
                                    <i class="fa-solid fa-arrow-left-long text-black-50"></i>
                                </a> --}}
                                <i class="fa-solid fa-arrow-left-long text-black-50" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                {{-- <h3 class="text-center title-2">Pizza Detail Info</h3> --}}
                            </div>
                            <hr>
                            <div class="row">
                                <div class=" col-3 offset-2">

                                        <img src="{{asset('storage/'.$pizza->image)  }} " alt="John Doe" />

                                </div>
                                <div class="col-7">
                                    <h4 class="my-3 font-italic fs-4 " > {{$pizza->name}} </h4>
                                    <span class="my-3 btn bg-dark text-white" ><i class="fa-solid  fs-5 fa-money-bill-wave me-2"></i>{{$pizza->price}} </span>
                                    <span class="my-3 btn bg-dark text-white" ><i class="fa-solid fs-5 fa-stopwatch me-2"></i> {{$pizza->waiting_time}} </span>
                                    <span class="my-3 btn bg-dark text-white" ><i class="fa-solid fs-5 fa-eye me-2"></i>{{$pizza->view_count}} </span>
                                    <span class="my-3 btn bg-dark text-white" ><i class="fa-solid fa-clone me-2"></i>{{$pizza->category_name}} </span>
                                    <span class="my-3 btn bg-dark text-white" ><i class="fa-solid fs-5 fa-user-clock me-2"></i> {{Auth::user()->created_at->format('j-F-Y')}} </span>

                                     <div class="my-3"><i class="fa-solid fa-file-lines me-2 text-muted"></i> </div>
                                     <div class="">{{$pizza->description}}</div>

                                </div>
                            </div>
                            <div class="row">
                                <a href="{{route('admin#edit')}} ">
                                    <div class="col-4 offset-2 mt-3">
                                        <button class="btn btn-primary text-white"><i class="fa-solid fa-pen-to-square"></i> Edit Prifile</button>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection
