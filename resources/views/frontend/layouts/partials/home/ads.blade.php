 <section>
     <div class="container">
         <div class="row">
             @foreach ($ads as $item)
                 <div class="col-12 col-md-6 mb-3 mb-lg-0">
                     <div>
                         <div class="py-10 px-8 rounded"
                             style="background: url({{ asset($item->image) }}) no-repeat; background-size: cover; background-position: center">
                             <div>
                                 <h3 class="fw-bold mb-1">{{ $item->heading }}</h3>
                                 <p class="mb-4">
                                    {{ $item->discount_title }}
                                 </p>
                                 <a href="{{ route('shop') }}" class="btn btn-dark">Shop Now</a>
                             </div>
                         </div>
                     </div>
                 </div>
             @endforeach

         </div>
     </div>
 </section>
