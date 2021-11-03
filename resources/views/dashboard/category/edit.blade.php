@extends('dashboard.layouts.master')


@section('content')
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
    {{-- <pre> {{ dd($categories) }} </pre> --}}
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Category</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                    <form class="form form-vertical"  action="{{ route('categories.update', $categories->id) }}" method="POST" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div>
                                                <label for="name">Name</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name', $categories->name) }}" autofocus required>
                                                    @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }} 
                                                    </div>
                                                    @enderror
                                            </div>
                                            <div>
                                                <label for="slug">Slug</label>
                                                <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror"
                                                    slug="slug" value="{{ old('slug', $categories->slug) }}" autofocus required>
                                                @error('slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }} 
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 px">Update Category</button>
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
