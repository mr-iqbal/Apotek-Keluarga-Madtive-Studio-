@extends('dashboard.layouts.master')


@section('content')
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
    <div class="row match-height">
        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit post</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical"  action="{{ route('posts.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                            @method("PUT")
                            @csrf
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" class="form-control @error('title') is-invalid @enderror"
                                                    name="title" value="{{ old('title', $post->title) }}" autofocus required>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="slug">Slug</label>
                                                <input type="slug" class="form-control @error('slug') is-invalid @enderror"
                                                    name="slug" id="slug" value="{{ old('slug', $post->slug) }}" required readonly>
                                                    @error('slug')
                                                    <div class="invalid-feedback">
                                                        {{ $message }} 
                                                    </div>
                                                    @enderror
                                            </div>
                                        </div>
                                        
                                        <div class="mb-3">
                                            <label for="category" class="form-label">Category</label>
                                            <select class="form-select @error('category') is-invalid @enderror" name="category_id" required>
                                            <option selected>-- Select Category --</option>
                                            @foreach ($categories as $category)   
                                                @if(old('category_id', $post->category_id) == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                                @else
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                            </select>
                                            @error('category')
                                            <div class="invalid-feedback">
                                                {{ $message }} 
                                            </div>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label">Image</label>
                                            <img src="" alt="" class="img-preview img-fluid mb-3 col-sm-7">
                                            <input class="form-control" type="file" id="image" value="{{ $post->image }}" name="oldImage" onchange="previewImage()">
                                        </div>
                                        @if($post->image)
                                            <img src="{{ asset('storage/post-images' . $post->image) }}" alt="" class="img-preview img-fluid mb-3 col-sm-7 d-block">                
                                        @endif

                                        <div class="mb-3">
                                            <label for="body" class="form-label">Body</label>
                                            <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror" value="{{ old('body', $post->body) }}" required>
                                            <trix-editor input="body"></trix-editor>
                                            @error('body')
                                            <div class="invalid-feedback">
                                                {{ $message }} 
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 d-flex justify-content-start">
                                            <button type="submit" class="btn btn-primary me-1 mb-1 px">Update Post</button>
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
