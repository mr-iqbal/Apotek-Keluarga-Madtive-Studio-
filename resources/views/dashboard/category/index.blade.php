@extends('dashboard.layouts.master')

@section('content')
<div class="card-content">
    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-primary mb-5">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('categories.create') }}" class="btn btn-success mb-3 "><i class="bi bi-plus-circle"></i> Add New Category</a>
        <div class="table-responsive">
            <table class="table table-lg table-bordered border-2 table-light">
                <thead>
                    <tr>  
                        <th>No</th>
                        <th>Name</th>
                        <th>Created</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody">
                    @forelse ($categories as $i => $category)
                    <tr>
                        <th>{{ $loop->iteration }}</th>
                        <th>{{ $category->name }}</th>
                        <th>{{ $diffTime[$i] }}</th>
                        <th>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="" id="success"><i class="bi bi-trash"></i></button>
                            </form>
                        </th>
                    </tr>
                    @empty
                        <th colspan="4" class="text-center text-danger">Belum Ada Category</th>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection