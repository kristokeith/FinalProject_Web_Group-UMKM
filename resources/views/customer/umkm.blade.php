@extends('customer.master')
@section('judul', 'UMKM Malang')
@section('isi')

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Subsector</h2>
                <ol>
                    <li><a href="">Subsector</a></li>
                    <li><a href="services">{{ $categories->name }}</a></li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>UMKM REGISTERED</h2>
                <h2>{{ $categories->name }} Subsector</h2>
            </div>
            <form action="{{ route('umkm.shows', $categories->id) }}" class="form-inline" method="GET">
                <input type="search" name="search" class="form-control " placeholder="Search">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-default">
                        <i class="uil uil-search"></i>
                    </button>
                </div>
            </form>

            <div class="row">
                @foreach ($data as $card)
                    <div class="col-lg-3 col-md-4 mb-4 mr-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card" style="width: 170px;">
                            <img src="{{ asset('product/' . $card->gambar) }}" class="card-img-top " alt=""
                                style="width: 100px; height: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->judul }}</h5>
                                <p class="card-text">{{ $categories->name }}</p>
                                <div class="rating">
                                    @if ($card->ratings()->avg('rating') == 0 || $card->ratings()->avg('rating') === '')
                                        <h4 class="average-rating">Average Rating: 0 </h4>
                                    @else
                                        <h4 class="average-rating">Average Rating: {{ number_format($card->ratings()->avg('rating'), 1) }}
                                        </h4>
                                    @endif
                                    <div class="star-rating" style="--rating: {{ $card->ratings()->avg('rating') }};">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $card->ratings()->avg('rating'))
                                                <span class="star-filled">&#9733;</span>
                                            @else
                                                <span class="star-empty">&#9734;</span>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <h4><a href="{{ url('/home/umkm/product', $card->id) }}">VIEW</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>


    </section><!-- End Sevices Section -->
@endsection
