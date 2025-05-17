@extends('front.layout.master')

@section('main_content')
    <div class="page-top" style="background-image: url('{{ asset('uploads/banner.jpg') }}')">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Dashboard</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-content user-panel pt_70 pb_70">
        <div class="container-fluid">
            <div class="row">
                @include('user.sidebar')
                <div class="col-lg-9 col-md-12">
                    <form action="{{ route('profile_submit') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="col-md-12 mb-3">
                                <label>Existing Photo</label>
                             <div class="form-group">
                                @php
                                    $user = Auth::guard()->user();
                                    $photo = $user && $user->photo ? asset('uploads/' . $user->photo) : asset('uploads/user-photo.jpg');
                                @endphp

                                <img src="{{ $photo }}" alt="User Photo" class="user-photo">
                            </div>

                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Change Photo</label>
                                <input type="file" name="photo" class="form-control">
                                @error('photo')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Full Name *</label>
                                <input type="text" name="name" class="form-control" value="{{ Auth::guard('web')->user()->name}}">
                                @error('full_name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email Address *</label>
                                <input type="email" name="email" class="form-control" value="{{ Auth::guard('web')->user()->email}}">
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone *</label>
                                <input type="text" name="phone" class="form-control" value="{{ Auth::guard('web')->user()->phone}}">
                                @error('phone')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Country *</label>
                                <input type="text" name="country" class="form-control" value="{{ Auth::guard('web')->user()->country}}">
                                @error('country')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Address *</label>
                                <input type="text" name="address" class="form-control" value="{{ Auth::guard('web')->user()->address}}">
                                @error('address')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>State *</label>
                                <input type="text" name="state" class="form-control" value="{{ Auth::guard('web')->user()->state}}">
                                @error('state')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>City *</label>
                                <input type="text" name="city" class="form-control" value="{{ Auth::guard('web')->user()->city}}">
                                @error('city')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Zip Code *</label>
                                <input type="text" name="zip" class="form-control" value="{{ Auth::guard('web')->user()->zip}}">
                                @error('zip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Retype Password</label>
                                <input type="password" name="retype_password" class="form-control">
                                @error('retype_password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="col-md-12 mt-2">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
