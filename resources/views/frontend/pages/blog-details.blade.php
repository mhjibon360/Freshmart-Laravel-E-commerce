@extends('frontend.layouts.frontend-master')
@section('title', $blog->slug)
@section('main')
    <!-- section -->
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Blog</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $blog->slug }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <section class="my-lg-14 my-8">
        <div class="container">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <!-- text -->
                    <div class="mb-5">
                        <div class="mb-3 text-center"><a href="#!">{{ $blog->category->category_name }}</a></div>
                        <h1 class="fw-bold text-center">{{ $blog->title }}</h1>
                        <div class="d-flex justify-content-center text-muted mt-4">
                            <span class="me-2"><small> {{ $blog->created_at->format('d M Y') }}</small></span>
                            <span>
                                <small>
                                    Read time:
                                    <span class="text-dark fw-bold">12min</span>
                                </small>
                            </span>
                        </div>
                    </div>
                    <!-- img -->
                    <div class="mb-8">
                        <img src="{{ asset($blog->image) }}" alt=""
                            class="img-fluid rounded" />
                    </div>

                    <div>
                    {!! $blog->details !!}
                    </div>
                    <hr class="mt-8 mb-5" />
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <div class="d-flex align-items-center">
                            <img src="{{ isset($blog->user->photo) ? asset($blog->user->photo) : Avatar::create(Auth::user()->name)->toBase64() }}"  alt=""
                                class="rounded-circle avatar-md" />
                            <div class="ms-2 lh-1">
                                <h5 class="mb-0">{{ $blog->user->name }}</h5>
                                <span class="text-primary small">{{ $blog->user->email }}</span>
                            </div>
                        </div>
                        <div>
                            <!-- social -->
                            <span class="ms-2 text-muted">Share</span>
                            <a href="#" class="ms-2 text-muted"><i class="bi bi-facebook fs-6"></i></a>
                            <a href="#" class="ms-2 text-muted"><i class="bi bi-twitter fs-6"></i></a>
                            <a href="#" class="ms-2 text-muted"><i class="bi bi-linkedin fs-6"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
