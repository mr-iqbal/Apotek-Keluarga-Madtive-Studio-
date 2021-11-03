@extends('frontend.layouts.master')

@section('content')
    <div class="container"> 
        <div style="width:800px;" class="mx-auto" id="container-article">
            <h1 class="mt-5">{{ $post->title }}</h1>
            <div class="d-flex align-items-center justify-content-start mt-2">
                <span class="fs-6 me-3 text-secondary" id="author"><a href="#">by : {{ $post->author->name }} </a></span>
                <small  class="me-3">| </small>
                <small  class="me-3">{{ $date }}</small>
                <small  class="me-3">|</small>
                <small>{{ $carbon }}</small>
            </div>
            <img src="{{ asset('storage/'. $post->image) }}" alt="" class="mt-4 w-100 rounded img-fluid img-thumbnail">
            <div class="paragraphs mt-3 mb-5 fs-6">
                <p>{!! $post->body !!}</p>
            </div>

            <h6 class="mt-5"><a class="text-danger" href="/article">Kembali</a></h6>
        </div>
    </div>  
@endsection

