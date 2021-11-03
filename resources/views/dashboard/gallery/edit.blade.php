@extends('dashboard.layouts.master')


@section('content')
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit your Gallery</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical"  action="{{ route('galleries.update', $gallery->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="mb-3">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                                    name="title" value="{{ old('title'), $galleries->title }}" autofocus required>
                                                @error('title')
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
                                            <div class="mb-3">
                                                <label for="image">Image</label>
                                                <input type="file" id="image" class="form-control @error('image') is-invalid @enderror"
                                                    name="image" value="{{ old('image') }}" autofocus required>
                                                @error('image')
                                                <div class="invalid-feedback">
                                                    {{ $message }} 
                                                </div>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="note">Note</label>
                                                <input type="text" id="note" class="form-control @error('note') is-invalid @enderror"
                                                    name="note" value="{{ old('note') }}" autofocus required>
                                                @error('note')
                                                <div class="invalid-feedback">
                                                    {{ $message }} 
                                                </div>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-12 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 px">Create Image</button>
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