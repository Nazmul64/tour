@extends('front.layout.master')
@section('main_content')

     <div class="page-top" style="background-image: url('uploads/banner.jpg')">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Create Account</h2>
                        <div class="breadcrumb-container">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item active">Create Account</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content pt_70 pb_70">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
                        <div class="login-form">
                            <form action="{{ route('registration_submit') }}"method="post">
                                @csrf

                            <div class="mb-3">
                                <label for="" class="form-label">Name *</label>
                                <input type="text" class="form-control"name="name">
                                 @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Email Address *</label>
                                <input type="text" class="form-control"name="email">
                                 @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Password *</label>
                                <input type="password" class="form-control"name="password">
                                 @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Confirm Password *</label>
                                <input type="password" class="form-control"name="retype_password">
                                 @error('retype_password')
                                        <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary bg-website">
                                    Create Account
                                </button>
                            </div>
                            </form>
                            <div class="mb-3">
                                <a href="{{ route('login') }}" class="primary-color">Existing User? Login Now</a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection
