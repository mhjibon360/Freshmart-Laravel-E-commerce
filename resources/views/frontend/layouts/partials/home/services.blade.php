 <section class="my-lg-14 my-8">
        <div class="container">
            <div class="row">
                @foreach ($allservices as $servie)
                <div class="col-md-6 col-lg-3">
                    <div class="mb-8 mb-xl-0">
                        <div class="mb-6"><img src="{{ asset($servie->icon) }}"
                                alt="" /></div>
                        <h3 class="h5 mb-3">{{ $servie->heading }}</h3>
                        <p>{{ $servie->details }}</p>
                    </div>
                </div>

              @endforeach
            </div>
        </div>
    </section>
