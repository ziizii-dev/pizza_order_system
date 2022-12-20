@extends('user.layouts.master')
@section('content')
    <div class="row">
        <div class="col-6 offset-3">
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">

                        <div class=" offset-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title">
                                        <h3 class="text-center title-2">Contact Us</h3>
                                    </div>

                                    {{-- <input id="title"
                                    type="text"
                                    name="title"
                                    class="@error('title') is-invalid @enderror">

                                @error('title')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror --}}
                                    <hr>
                                    <form action=" {{ route('user#userContactMessage') }}" method="post">
                                        @csrf

                                        <div class="form-group">
                                            <label>Username</label>
                                            <input class="form-control @error('contactName') is-invalid @enderror "
                                                type="text" name="contactName" placeholder="Username" value="{{old('contactName')}} ">
                                            @error('contactName')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input class=" form-control @error('contactEmail') is-invalid @enderror" type="text" name="contactEmail" value="{{old('contactEmail')}} "
                                                placeholder="Enter your email..">
                                                @error('contactEmail')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                        </div>
                                        <div class="form-group">
                                            <label>Message</label>
                                            <textarea name="contactMessage"  class="form-control  @error('contactMessage') is-invalid @enderror" id="" cols="30" rows="10"
                                                placeholder=" Enter your message"> {{old('contactMessage')}}</textarea>
                                                @error('contactMessage')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <button class=" btn btn-dark form-control" type="submit"><i
                                                class="fa-solid fa-paper-plane me-2"></i>Send Message</button>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
