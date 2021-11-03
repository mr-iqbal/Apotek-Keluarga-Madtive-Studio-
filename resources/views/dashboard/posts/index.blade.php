@extends('dashboard.layouts.master')

@section('content')
<div class="card-content">
    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-primary mb-5">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('posts.create') }}" class="btn btn-success mb-3 "><i class="bi bi-plus-circle"></i> Add New Post</a>
        <div class="table-responsive">
            <table class="table table-lg table-bordered border-2 table-light">
                <thead>
                    <tr>  
                        <th>No</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody">
                    @forelse ($posts as $post)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $post->title }}</th>
                        @if ($post->category === null)
                            <th>Belum ada Category</th>
                        @else
                            <th>{{ $post->category->name}}</th>
                        @endif
                        <th>
                            <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-info"><i class="bi bi-info-circle"></i></a>
                            <a href="{{ route('posts.edit', $post->slug) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('posts.destroy', $post->slug) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="" id="success"><i class="bi bi-trash"></i></button>
                            </form>
                        </th>
                    </tr>
                    @empty
                        <th colspan="4" class="text-center text-danger">Belum Ada Posts</th>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection