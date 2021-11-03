@extends('dashboard.layouts.master')

@section('content')
<div class="card-content">
    <div class="card-body">
        @if(Session::has('success'))
            <div class="alert alert-primary mb-5">
                {{ session('success') }}
            </div>
        @endif
        <a href="{{ route('heroes.create') }}" class="btn btn-success mb-3 "><i class="bi bi-plus-circle"></i> Add New Hero</a>
        <div class="table-responsive">
            <table class="table table-lg table-bordered border-2 table-light">
                <thead>
                    <tr>  
                        <th width="1px">No</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th width="1px">Image</th>
                        <th width="1px">Action</th>
                    </tr>
                </thead>
                <tbody">
                    @forelse ($heroes as $hero)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $hero->title }}</td>
                        <td>{{ $hero->description }}</td>
                        <td><img width="100" height="50" src="{{ asset('storage/'. $hero->image) }}" alt=""></td>
                        <td style="display: flex; ">
                            <a href="{{ route('heroes.edit', $hero->id) }}" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('heroes.destroy', $hero->id) }}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button class="btn btn-danger" type="" id="success"><i class="bi bi-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <th colspan="5" class="text-center text-danger">Belum Ada Hero</th>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection