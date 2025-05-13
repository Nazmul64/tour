@extends('admin.layout.master')

@section('main_content')

@include('admin.layout.nav')
@include('admin.layout.sidebar')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Edit Profile</h1>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('admin_profile_submit') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <!-- Profile Photo -->
                                    <div class="col-md-3 text-center">
                                        <img src="{{ asset('uploads/' . (Auth::guard('admin')->user()->photo ?? 'default.png')) }}"
                                             alt="Profile Photo"
                                             class="img-thumbnail mb-2"
                                             style="max-width: 100%;">
                                        <input type="file" name="photo" class="form-control mt-2">
                                    </div>

                                    <!-- Profile Info -->
                                    <div class="col-md-9">
                                        <div class="mb-3">
                                            <label class="form-label">Name *</label>
                                            <input type="text" class="form-control" name="name"
                                                   value="{{ old('name', Auth::guard('admin')->user()->name) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Email *</label>
                                            <input type="email" class="form-control" name="email"
                                                   value="{{ old('email', Auth::guard('admin')->user()->email) }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="password" id="password">
                                                <button class="btn btn-outline-secondary" type="button"
                                                        onclick="togglePassword('password', this)">👁️</button>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <label class="form-label">Retype Password</label>
                                            <div class="input-group">
                                                <input type="password" class="form-control" name="confirm_password" id="confirm_password">
                                                <button class="btn btn-outline-secondary" type="button"
                                                        onclick="togglePassword('confirm_password', this)">👁️</button>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div> <!-- card-body -->
                    </div> <!-- card -->
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    function togglePassword(id, el) {
        const input = document.getElementById(id);
        const isPassword = input.type === "password";
        input.type = isPassword ? "text" : "password";
        el.textContent = isPassword ? "🙈" : "👁️";
    }
</script>

@endsection
