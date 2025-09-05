@extends('frontend.layouts.frontend-master')
@section('title', 'all blogs')
@section('main')
    <div class="mt-4">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- breadcrumb -->
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item active"><a href="{{ route('blog') }}">Blog</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- section -->
    <section class="mt-8">
        <div class="container">
            <div class="row">
                <!-- logo -->
                <div class="col-12">
                    <h1 class="fw-bold">FreshCart Blog</h1>
                </div>
            </div>
        </div>
    </section>
    <!-- section -->
    <section class="mt-6 mb-lg-14 mb-8">
        <!-- container -->
        <div class="container">
            @foreach ($allblogs->take(1) as $blog)
                <div class="row d-flex align-items-center mb-8">
                    <div class="col-12 col-md-12 col-lg-8">
                        <a href="{{ route('blog.details', $blog->slug) }}">
                            <!-- img -->
                            <div class="img-zoom">
                                <img src="{{ asset($blog->image) }}" alt="" class="img-fluid w-100" />
                            </div>
                        </a>
                    </div>
                    <!-- text -->
                    <div class="col-12 col-md-12 col-lg-4">
                        <div class="ps-lg-8 mt-8 mt-lg-0">
                            <h2 class="mb-3"><a href="{{ route('blog.details', $blog->slug) }}"
                                    class="text-inherit">{{ $blog->title }}</a></h2>
                            <p>
                                {!! Str::words($blog->details, '100', '') !!}
                            </p>
                            <div class="d-flex justify-content-between text-muted">
                                <span><small>{{ $blog->created_at->format('d M Y') }}</small></span>
                                <span>
                                    <small>
                                        Read time:
                                        <span class="text-dark fw-bold">6min</span>
                                    </small>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <!-- row -->
            <div class="row">
                @foreach ($allblogs->slice(1, 9) as $blog)
                    <div class="col-12 col-md-6 col-lg-4 mb-10">
                        <div class="mb-4">
                            <a href="{{ route('blog.details', $blog->slug) }}">
                                <!-- img -->
                                <div class="img-zoom">
                                    <img src="{{ asset($blog->image) }}" alt="" class="img-fluid w-100" />
                                </div>
                            </a>
                        </div>
                        <!-- text -->
                        <div class="mb-3"><a
                                href="">{{ $blog->category->category_name }}</a>
                        </div>
                        <!-- text -->
                        <div>
                            <h2 class="h5"><a href="{{ route('blog.details',$blog->slug) }}" class="text-inherit">{{ $blog->title }}</a>
                            </h2>
                            <p>I {!! Str::words($blog->details, '100', '') !!}</p>
                            <div class="d-flex justify-content-between text-muted mt-4">
                                <span><small>22 April 2023</small></span>
                                <span>
                                    <small>
                                        Read time:
                                        <span class="text-dark fw-bold">12min</span>
                                    </small>
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="col-12">
                    <nav>
                        <!-- pagination -->
                        <ul class="pagination">
                            <li class="page-item disabled">
                                <a class="page-link mx-1" href="#" aria-label="Previous">
                                    <i class="feather-icon icon-chevron-left"></i>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link mx-1 active" href="#">1</a></li>
                            <li class="page-item"><a class="page-link mx-1" href="#">2</a></li>

                            <li class="page-item"><a class="page-link mx-1" href="#">...</a></li>
                            <li class="page-item"><a class="page-link mx-1" href="#">12</a></li>
                            <li class="page-item">
                                <a class="page-link mx-1" href="#" aria-label="Next">
                                    <i class="feather-icon icon-chevron-right"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
@endsection
