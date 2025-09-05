 @php
     $advertisement = App\Models\Ads::where('status', 1)->inRandomOrder()->take(1)->get();
 @endphp
 @foreach ($advertisement as $ads)
     <div class="col">
         <div class="pt-8 px-6 px-xl-8 rounded text-dark"
             style="background: url({{ asset($ads->image) }}) no-repeat; background-size: cover; height: 470px; background-position:top right;">
             <div>
                 <h3 class="fw-bold text-black">{{ $ads->heading }}</h3>
                 <p class="text-black">{{ $ads->discount_title }}</p>
                 <a href="{{ route('shop') }}" class="btn btn-primary">
                     Shop Now
                     <i class="feather-icon icon-arrow-right ms-1"></i>
                 </a>
             </div>
         </div>
     </div>
 @endforeach
