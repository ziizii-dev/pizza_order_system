
@extends('admin.layouts.master')

@section('title','Category List Page')

@section('content')
 <!-- MAIN CONTENT-->
 <div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-3 offset-8">
                    <a href="{{route('product#list')}} "><button class="btn bg-dark text-white my-3">List</button></a>
                </div>
            </div>
            <div class="col-lg-6 offset-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h3 class="text-center title-2">Create Your pizza</h3>
                        </div>
                        <hr>
                        <form action="{{route('product#create')}} " method="post" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="control-label mb-1">Name</label>
                                {{-- <input type="text" name="pizzaName" class="form-control" value="{{old('pizzaName')}} " placeholder="Enter Name"> --}}

                                <input id="cc-pament" placeholder="Enter Name" name="pizzaName" type="text" value="{{old('pizzaName')}} " class="form-control @error('pizzaName') is-invalid

                                @enderror " aria-required="true" aria-invalid="false" >
                                @error('pizzaName')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>

                                @enderror

                            </div>
                            <div class="form-group">
                                <label class="control-label mb-1">Category</label>
                               <select name="pizzaCategory" class="form-control @error('pizzaCategory') is-invalid

                               @enderror" id="">
                                 <option value="">Choose your category</option>
                                 @foreach ($categories as $category)
                                 <option value="{{$category->id}} ">{{$category->name}} </option>

                                 @endforeach
                               </select>
                               @error('pizzaCategory')
                               <div class="invalid-feedback">
                                   {{$message}}
                               </div>

                               @enderror
                            </div>

                            <div class="form-group">
                                <label class="control-label mb-1">Descrioption</label>
                                <textarea name="pizzaDescription" class="form-control @error('pizzaDescription') is-invalid

                                @enderror" cols="30" rows="10" placeholder="Enter Description"> {{old('pizzaDescription')}} </textarea>
                                @error('pizzaDescription')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>

                                @enderror

                            </div>

                            <div class="form-group">
                                <label class="control-label mb-1">Image</label>
                               <input type="file" name="pizzaImage" class="form-control @error('pizzaImage') is-invalid

                               @enderror">
                               @error('pizzaImage')
                               <div class="invalid-feedback">
                                   {{$message}}
                               </div>

                               @enderror

                            </div>

                            <div class="form-group">
                                <label class="control-label mb-1">Waiting Time</label>
                               <input type="number" name="pizzaWaintingTime" value="{{old('pizzaWaintingTime')}} " class="form-control @error('pizzaWaintingTime') is-invalid

                               @enderror" placeholder="Enter Waiting Time">
                               @error('pizzaWaintingTime')
                               <div class="invalid-feedback">
                                   {{$message}}
                               </div>

                               @enderror

                            </div>


                            <div class="form-group">
                                <label class="control-label mb-1">Price</label>
                                {{-- <input type="number"  class="form-control" placeholder="Enter Price"> --}}
                                <input id="cc-pament" name="pizzaPrice" type="number" value="{{old('pizzaPrice')}} " class="form-control @error('pizzaPrice') is-invalid

                                @enderror " aria-required="true" aria-invalid="false" placeholder="Enter Price...">
                                @error('pizzaPrice')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>

                                @enderror

                            </div>


                            <div>
                                <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">


                                    <i class="fa-solid fa-circle-right"></i> Create
                                </button>
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
