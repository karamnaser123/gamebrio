    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />


    <section class="gradient-custom">
        <div class="container my-5 py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12">


                    <div class="card">
                        <div class="card-body px-4 py-5">
                            <!-- Carousel wrapper -->
                            <div id="carouselDarkVariant" class="carousel slide carousel-dark" data-mdb-ride="carousel">
                                <!-- Indicators -->
                                {{-- <div class="carousel-indicators mb-0">
                                    <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="0" class="active"
                                        aria-current="true" aria-label="Slide 1"></button>
                                    <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="1"
                                        aria-label="Slide 1"></button>
                                    <button data-mdb-target="#carouselDarkVariant" data-mdb-slide-to="2"
                                        aria-label="Slide 1"></button>
                                </div> --}}

                                <!-- Inner -->
                                <div class="carousel-inner pb-5">
                                    <!-- Single item -->
                                    <div class="carousel-item active">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-lg-10 col-xl-8">
                                                <div class="row">
                                                    <div class="col-lg-4 d-flex justify-content-center">
                                                        <img style="width: 120px; height: 120px"
                                                            src="{{ asset('http://bootdey.com/img/Content/avatar/avatar1.png') }}"
                                                            class="rounded-circle shadow-1 mb-4 mb-lg-0"
                                                            alt="woman avatar" width="150" height="150" />
                                                    </div>
                                                    <div
                                                        class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                        <h4 class="mb-4">{{ trans('messages.welcomcomment') }}</h4>
                                                        <p class="mb-0 pb-3">
                                                            {{ trans('messages.commentauto') }}
                                                        </p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    @forelse ($reviews as $review)
                                        <!-- Single item -->
                                        <div class="carousel-item" id="reviews-section">
                                            <div class="row d-flex justify-content-center">
                                                <div class="col-lg-10 col-xl-8">
                                                    <div class="row">
                                                        <div class="col-lg-4 d-flex justify-content-center">
                                                            <img style="width: 120px; height: 120px"
                                                                src="{{ asset('http://bootdey.com/img/Content/avatar/avatar1.png') }}"
                                                                class="rounded-circle shadow-1 mb-4 mb-lg-0"
                                                                alt="woman avatar" width="150" height="150" />
                                                        </div>
                                                        <div
                                                            class="col-9 col-md-9 col-lg-7 col-xl-8 text-center text-lg-start mx-auto mx-lg-0">
                                                            <h6 class="mb-4">Name: {{ $review->Users->name }}</h6>
                                                            <h5 class="mb-0 pb-3">
                                                                Comment: {{ $review->review }}
                                                            </h5>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @empty
                                    @endforelse

                                </div>
                                <!-- Inner -->

                                <!-- Controls -->
                                <button class="carousel-control-prev" type="button"
                                    data-mdb-target="#carouselDarkVariant" data-mdb-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-mdb-target="#carouselDarkVariant" data-mdb-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                            <!-- Carousel wrapper -->
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
