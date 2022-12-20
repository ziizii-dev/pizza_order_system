@extends('admin.layouts.master')

@section('title', 'Category List Page')

@section('content')
    <!-- MAIN CONTENT-->
    <div class="main-content">
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
                            <div class="card-title">
                                <h3 class="text-center title-2">Account Profile</h3>
                            </div>
                            <hr>
                             <form action="{{route('admin#update',Auth::user()->id)}} " method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-4 offset-1">


                                                @if (Auth::user()->image == null)
                                                @if (Auth::user()->gender == 'male')
                                                <img src="{{asset('image/default_user.png')}} " class="img-thumbnail shadow-sm" >

                                                @else
                                                <img src="{{asset('image/female_default.jpg')}} " class="img-thumbnail shadow-sm" >

                                                @endif


                                            @else
                                                <img src="{{ asset('storage/'.Auth::user()->image) }} " class="img-thumbnail shadow-sm" />
                                            @endif

                                            <div class="mt-3">
                                                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>

                                                @enderror
                                            </div>
                                            <div class="mt-3">
                                              <button class="btn btn-primary form-control text-white" type="submit"><i class="fa-solid fa-rocket me-2"></i>Update</button>
                                            </div>


                                    </div>
                                    <div class=" col-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament" name="name" type="text" value="{{old('name', Auth::user()->name)}} "  class="form-control @error('name') is-invalid

                                            @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Email</label>
                                            <input id="cc-pament" name="email" type="text"  value="{{old('email', Auth::user()->email)}} " class="form-control @error('email') is-invalid

                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin Email ...">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Phone</label>
                                            <input id="cc-pament" name="phone" type="number" value="{{old('phone',Auth::user()->phone)}}"   class="form-control @error('phone') is-invalid

                                            @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Phone...">
                                            @error('phone')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                                            @enderror

                                        </div>
                                        <div class="">
                                            <label class="control-label mb-1">Gender</label>
                                            <div class="">
                                                <select name="gender" class="form-control @error('gender') is-invalid

                                                @enderror">
                                                    <option value="">Select gender</option>
                                                    <option value="male" @if (Auth::user()->gender == 'male') @endif>Male</option>
                                                    <option value="male" @if (Auth::user()->gender == 'female') @endif>Female</option>

                                                </select>
                                                @error('gender')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>

                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label class="control-label mb-1">Address</label>
                                            <div class="">
                                                <textarea name="address" class="form-control @error('address') is-invalid

                                                @enderror" cols="30" rows="10">{{old('address', Auth::user()->address)}}</textarea>
                                            </div>
                                            @error('address')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Role</label>
                                            <input id="cc-pament" name="role" type="text" value="{{old('role', Auth::user()->role)}} "  class="form-control @error('role') is-invalid

                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admn role..." disabled>
                                            @error('role')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                                            @enderror

                                        </div>

                                    </div>
                                </div>
                             </form>




                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTENT-->

@endsection
