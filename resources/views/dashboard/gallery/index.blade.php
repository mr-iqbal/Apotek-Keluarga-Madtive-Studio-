
@extends('dashboard.layouts.master')

@section('content')
<div class="card-content">
    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-primary mb-5">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('galleries.create') }}" class="btn btn-success mb-3 "><i class="bi bi-plus-circle"></i> Add New Image</a>
        <div class="table-responsive">
            <table class="table table-lg table-bordered border-2 table-light">
                <thead>
                    <tr>  
                        <th width="1px">No</th>
                        <th>Title</th>
                        <th>Image</th>
                        <th width="1px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($galleries as $gallery)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $gallery->title }}</th>
                        <th><img width="200" height="100" src="{{ asset('storage/' . $gallery->image ) }}" alt=""></th>
                        <th style="display: flex">
                            <a href="{{ route('galleries.edit', $gallery->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('galleries.destroy', $gallery->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="" id="success"><i class="bi bi-trash"></i></button>
                            </form>
                        </th>
                    </tr>
                    @empty
                        <th colspan="4" class="text-center text-danger">Belum Ada gallery</th>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection