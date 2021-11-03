@extends('frontend.layouts.master')

@section('content')
    <div class="container-fluidr bg-gradient mb-5" id="hero">
        <div class="container h-auto">
            <div class="row">
                <div class="col align-self-center">
                    <h1 class="text-primary fs-1 mb-3 hero-title">Apotek Keluarga</h1>
                    <p class="text-secondary mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ex sit molestias et id! Dolore corporis illo nostrum dolores? Exercitationem, tenetur reprehenderit. Non sed ipsam quis dolor nulla exercitationem maiores eaque!</p>
                    <button class="btn btn-primary px-5 py-2 fw-bolder">Get Started</button>
                </div>
                <div class="col align-self-center">
                    <img src="{{ asset('assets/images/illustration.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="container mt-3">
        <h3 class="fs-3">Popular Posts</h3>
    </div>
    {{-- Blog Posts --}}
    <section class="popular" style="min-height: 700px">
        <div class="container">
            <div class="row">
                    <div class="col-sm-8">
                        <div class="d-flex position-relative mt-3 mb-4">
                            <img src="{{ asset('assets/images/samples/architecture1.jpg') }}" class="flex-shrink-0 me-3 img-fluid" alt="..." width="200">
                            <div>
                                <span class="mb-2"><a href="">Fikri Ilhamsyah</a> in <a href="" style="cursor: pointer;">Healthy Food</a></span>
                                <h4 class="mt-2">Custom component with stretched link</h4>
                                <p class="mt-0">This is some placeholder content for the custom component. </p>
                                <a href="#" class="stretched-link">Read More</a>
                            </div>
                        </div>
                        <hr class="mb-5">
                        <div class="d-flex position-relative mt-3 mb-4">
                            <img src="{{ asset('assets/images/samples/banana.jpg') }}" class="flex-shrink-0 me-3 img-fluid" alt="..." width="200">
                            <div>
                                <span class="mb-2">Fikri Ilhamsyah in Healthy Food</span>
                                <h4 class="mt-2">Custom component with stretched link</h4>
                                <p class="mt-0">This is some placeholder content for the custom component. </p>
                                <a href="#" class="stretched-link">Read More</a>
                            </div>
                        </div>
                        <hr class="mb-5">
                        <div class="d-flex position-relative mt-3 mb-4">
                            <img src="{{ asset('assets/images/samples/building.jpg') }}" class="flex-shrink-0 me-3 img-fluid" alt="..." width="200">
                            <div>
                                <span class="mb-2">Fikri Ilhamsyah in Healthy Food</span>
                                <h4 class="mt-2">Custom component with stretched link</h4>
                                <p class="mt-0">This is some placeholder content for the custom component. </p>
                                <a href="#" class="stretched-link">Read More</a>
                            </div>
                        </div>
                        <hr class="mb-5">
                        <div class="d-flex position-relative mt-3 mb-4">
                            <img src="{{ asset('assets/images/samples/error-403.png') }}" class="flex-shrink-0 me-3 img-fluid" alt="..." width="200">
                            <div>
                                <span class="mb-2">Fikri Ilhamsyah in Healthy Food</span>
                                <h4 class="mt-2">Custom component with stretched link</h4>
                                <p class="mt-0">This is some placeholder content for the custom component. </p>
                                <a href="#" class="stretched-link">Read More</a>
                            </div>
                        </div>
                        <hr class="mb-5">
                        <div class="d-flex position-relative mt-3 mb-4">
                            <img src="{{ asset('assets/images/samples/motorcycle.jpg') }}" class="flex-shrink-0 me-3 img-fluid" alt="..." width="200">
                            <div>
                                <span class="mb-2">Fikri Ilhamsyah in Healthy Food</span>
                                <h4 class="mt-2">Custom component with stretched link</h4>
                                <p class="mt-0">This is some placeholder content for the custom component. </p>
                                <a href="#" class="stretched-link">Read More</a>
                            </div>
                        </div>
                        <hr class="mb-5">
                    </div>
            </div>   
        </div>
    </section>
    <section>
        <h1 class="text-center mb-5 mt-5">Gallery</h1>
        <div class="container mb-5">
            <div class="row mb-4">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/martha-dominguez-de-gouveia-nMyM7fxpokE-unsplash.jpg') }}" class="img-thumbnail img-fluid" alt="" height="300" width="400">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/martha-dominguez-de-gouveia-nMyM7fxpokE-unsplash.jpg') }}" class="img-thumbnail img-fluid" alt="" height="300" width="400">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/martha-dominguez-de-gouveia-nMyM7fxpokE-unsplash.jpg') }}" class="img-thumbnail img-fluid" alt="" height="300" width="400">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/martha-dominguez-de-gouveia-nMyM7fxpokE-unsplash.jpg') }}" class="img-thumbnail img-fluid" alt="" height="300" width="400">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/martha-dominguez-de-gouveia-nMyM7fxpokE-unsplash.jpg') }}" class="img-thumbnail img-fluid" alt="" height="300" width="400">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/martha-dominguez-de-gouveia-nMyM7fxpokE-unsplash.jpg') }}" class="img-thumbnail img-fluid" alt="" height="300" width="400">
                </div>
            </div>
        </div>
    </section>
    {{-- Blog Posts --}}
@endsection

