@extends('dashboard.layouts.master')


@section('content')
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create your new category</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical"  action="/dashboard/categories" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror"
                                                    name="name" value="{{ old('name') }}" autofocus required>
                                                @error('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }} 
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="slug">Slug</label>
                                                <input type="text" id="slug" class="form-control @error('slug') is-invalid @enderror"
                                                    name="slug" value="{{ old('slug') }}" autofocus required>
                                                @error('slug')
                                                <div class="invalid-feedback">
                                                    {{ $message }} 
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 px">Create Category</button>
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


<script>
    
</script>
@endsection