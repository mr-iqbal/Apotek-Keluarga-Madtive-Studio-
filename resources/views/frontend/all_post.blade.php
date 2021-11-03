@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            {{-- @if($request->category)) --}}
                {{-- <h2 class="">Kategori : {{ $request->category }}</h2> --}}
            {{-- @else --}}
                <h2 class="">Semua Artikel</h2>
            {{-- @endif --}}
            <div class="col-8">
                    {{-- Looping semua posts  --}}
                    @forelse ($posts as $post)   
                    <div class="d-flex position-relative mt-3 mb-4">
                        <img src="{{ asset('storage/'. $post->image ) }}" class="flex-shrink-0 me-3 img-fluid" alt="..." width="300">
                        <div>   
                            {{-- @if (empty($post->category)) --}}
                                {{-- <span class="mb-2"><a href="">by : {{ $post->author ->username }}</a>  --}}
                            {{-- @else  --}}
                            <span class="mb-2"><a href="/article/{{ $post->slug }}">by : {{ $post->author->username ?? $post->author }}</a> in <a href="" style="cursor: pointer;">{{ $post->name }}</a></span>
                            {{-- @endif --}}
                            
                            {{-- <span class="mb-2"><a href="">by : {{ $post->author->username }}</a>  --}}

                            <h4 class="mt-2 text-dark">{{ $post->title }}</h4>
                            <p class="mt-0">{{ $post->excerpt }}</p>
                            <a href="/article/{{ $post->slug }}" class="stretched-link">Read More</a>
                        </div>
                    </div>
                    <hr class="mb-3">
                    @empty
                    <div class="d-flex position-relative mt-3 mb-4">
                        <h2>Tidak Ada Posts</h2>
                    </div>
                    @endforelse
                    {{-- Looping semua posts  --}}
                </div>
                @include('frontend.layouts.categories')
            </div>
            <div class="d-flex justify-content-start">
                @if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator )
                    {{$posts->links()}}
                @endif
            </div>          
    </div>
@endsection