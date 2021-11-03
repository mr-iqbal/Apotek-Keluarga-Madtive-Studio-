@extends('dashboard.layouts.master')

@section('content')
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create your Hero </h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical"  action="/dashboard/hero" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                                    name="title" value="{{ old('title') }}" autofocus required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                                <label for="description">Description</label>
                                                <input type="text" id="description" class="form-control @error('description') is-invalid @enderror"
                                                    name="description" value="{{ old('description') }}" autofocus required>
                                                @error('description')
                                                <div class="invalid-feedback">
                                                    {{ $message }} 
                                                </div>
                                                @enderror
                                        </div>
                                        <div class="form-group mb-3">
                                                <label for="image">Image</label>
                                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror"
                                                    name="image" value="{{ old('image') }}" autofocus required>
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }} 
                                                </div>
                                                @enderror
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 px">Create Post</button>
                                        </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection