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
                            <div class=" ms-5">
                                {{-- <a href="{{route('admin#list')}} ">
                                    <i class="fa-solid fa-arrow-left-long text-black-50"></i>
                                </a> --}}
                                <i class="fa-solid fa-arrow-left-long text-black-50" onclick="history.back()"></i>
                            </div>
                            <div class="card-title">
                                <h3 class="text-center title-2">Change Role</h3>
                            </div>
                            <hr>
                             <form action="{{route('admin#change',$account->id)}} " method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">

                                    <div class="col-4 offset-1">


                                                @if ($account->image == null)
                                                @if ($account->gender == 'male')
                                                <img src="{{asset('image/default_user.png')}} " class="image thumbnail shadow-sm" >

                                                @else
                                                <img src="{{asset('image/female_default.jpg')}} " class="image thumbnail shadow-sm" >

                                                @endif


                                            @else
                                                <img src="{{ asset('storage/'.$account->image) }} " alt="John Doe" />
                                            @endif

                                            <div class="mt-3">
                                                <input type="file"  disabled  name="image" class="form-control @error('image') is-invalid @enderror">
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>

                                                @enderror
                                            </div>
                                            <div class="mt-3">
                                              <button class="btn btn-primary form-control text-white" type="submit"><i class="fa-solid fa-rocket me-2"></i>change</button>
                                            </div>


                                    </div>
                                    <div class="row col-6">
                                        <div class="form-group">
                                            <label class="control-label mb-1">Name</label>
                                            <input id="cc-pament"  disabled name="name" type="text" value="{{old('name', $account->name)}} "  class="form-control @error('name') is-invalid

                                            @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Admin Name...">
                                            @error('name')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                                            @enderror

                                        </div>

                                        <div class="form-group">
                                            <label class="control-label mb-1">Role</label>
                                               <select name="role" class="form-control">
                                                 {{-- <option value="">Select role</option> --}}
                                                 <option value="admin" @if ($account->role == 'admin') selected @endif>Admin</option>
                                                 <option value="user" @if ($account->role == 'user') selected @endif>User</option>
                                               </select>

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Email</label>
                                            <input id="cc-pament"  disabled name="email" type="text"  value="{{old('email', $account->email)}} " class="form-control @error('email') is-invalid

                                            @enderror" aria-required="true" aria-invalid="false" placeholder="Enter Admin Email ...">
                                            @error('email')
                                            <div class="invalid-feedback">
                                                {{$message}}
                                            </div>

                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label mb-1">Phone</label>
                                            <input id="cc-pament" name="phone" type="number" value="{{old('phone',$account->phone)}}"   class="form-control @error('phone') is-invalid

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
                                                <select name="gender" disabled  class="form-control @error('gender') is-invalid

                                                @enderror">
                                                    <option value="">Select gender</option>
                                                    <option value="male" @if ($account->gender == 'male') @endif>Male</option>
                                                    <option value="male" @if ($account->gender == 'female') @endif>Female</option>

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
                                                <textarea name="address" disabled class="form-control @error('address') is-invalid

                                                @enderror" cols="30" rows="10">{{old('address', $account->address)}}</textarea>
                                            </div>
                                            @error('address')
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
