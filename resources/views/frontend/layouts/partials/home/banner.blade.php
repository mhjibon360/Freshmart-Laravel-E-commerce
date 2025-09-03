 <section class="mt-8">
     <div class="container">
         <div class="hero-slider">
             @foreach ($allsliders as $slider)
                 <div
                     style="background: url({{ asset($slider->image) }}) no-repeat; background-size: cover; border-radius: 0.5rem; background-position: center">
                     <div class="ps-lg-12 py-lg-16 col-xxl-5 col-md-7 py-14 px-8 text-xs-center">
                         <span class="badge text-bg-warning">{{ $slider->title }}</span>

                         <h2 class="text-dark display-5 fw-bold mt-4">{{ $slider->heading }}</h2>
                         <p class="lead">{{ $slider->details }}</p>
                         <a href="{{ route('shop') }}" class="btn btn-dark mt-3">
                             Shop Now
                             <i class="feather-icon icon-arrow-right ms-1"></i>
                         </a>
                     </div>
                 </div>
             @endforeach

         </div>
     </div>
 </section>
