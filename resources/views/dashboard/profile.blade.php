@extends('dashboard.layouts.master')


@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="name">Name</label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" autofocus required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }} 
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="username">Username</label>
                    <input type="text" id="username" class="form-control @error('username') is-invalid @enderror"
                        name="username" value="{{ old('username') }}" autofocus required>
                    @error('username')
                    <div class="invalid-feedback">
                        {{ $message }} 
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="text" id="email" class="form-control @error('email') is-invalid @enderror"
                        name="email" value="{{ old('email') }}" autofocus required>
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }} 
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">Password</label>
                    <input type="text" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" value="{{ old('password') }}" autofocus required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }} 
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">WA Phone</label>
                    <input type="text" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" value="{{ old('password') }}" autofocus required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }} 
                    </div>
                    @enderror
                </div>
                <div class="form-group mb-3">
                    <label for="password">WA Phone</label>
                    <input type="text" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" value="{{ old('password') }}" autofocus required>
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }} 
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group mb-3">
                    <label for="name"></label>
                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}" autofocus required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }} 
                    </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>
@endsection