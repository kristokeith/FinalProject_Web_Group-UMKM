@extends('customer.master')
@section('judul', 'UMKM Malang')
@section('isi')
    <br><br><br><br><br><br>
    <div class="container">
        <h2>Product Detail</h2>
        <div class="product">
            <div id="carouselExampleCaptions" class="carousel slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
                        aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
                        aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="{{ asset('product/' . $product->gambar) }}" class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Some representative placeholder content for the first slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Second slide label</h5>
                            <p>Some representative placeholder content for the second slide.</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="..." class="d-block w-100" alt="...">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Third slide label</h5>
                            <p>Some representative placeholder content for the third slide.</p>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <h3>{{ $product->judul }}</h3>
            <p>{{ $product->deskripsi }}</p>
            <div class="rating">
                <h4 class="average-rating">Average Rating: {{ number_format($product->ratings()->avg('rating'), 1) }}</h4>
                <div class="star-rating" style="--rating: {{ $product->ratings()->avg('rating') }};">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $product->ratings()->avg('rating'))
                            <span class="star-filled">&#9733;</span>
                        @else
                            <span class="star-empty">&#9734;</span>
                        @endif
                    @endfor
                </div>
            </div>
        </div>
        <h3>Reviews:</h3>

        <div class="product-details">
            <!-- Konten lain dari halaman detail produk -->

            <div class="review-container">
                @if ($product->ratings()->count() > 0)
                    <div class="review-list scrollable-container">
                        @foreach ($product->ratings()->where('halaman_id', $product->id)->orderBy('created_at', 'desc')->get() as $rating)
                            <div class="review-item">
                                <div class="rating-user">
                                    <span class="username">{{ $rating->user->name }}</span>
                                    <span style="color: lightgray;font-size: 10pt;"
                                        class="">~{{ $rating->created_at }}~</span>
                                    <div class="rating-stars">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $rating->rating)
                                                <span class="star-filled">&#9733;</span>
                                            @else
                                                <span class="star-empty">&#9734;</span>
                                            @endif
                                        @endfor
                                    </div>
                                </div>
                                <p>{{ $rating->review }}</p>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p>No reviews yet.</p>
                @endif
            </div>
        </div>


        <div class="review-form">
            <h3>Leave a Review</h3>
            <form id="ratingForm" action="{{ route('product.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="form-group">
                    <label for="rating">Rating:</label><br>
                    <div class="stars">
                        <input type="radio" name="rating" id="star5" value="5" />
                        <label for="star5"></label>
                        <input type="radio" name="rating" id="star4" value="4" />
                        <label for="star4"></label>
                        <input type="radio" name="rating" id="star3" value="3" />
                        <label for="star3"></label>
                        <input type="radio" name="rating" id="star2" value="2" />
                        <label for="star2"></label>
                        <input type="radio" name="rating" id="star1" value="1" />
                        <label for="star1"></label>
                    </div>
                    <div class="form-group">
                        <label for="review">Review:</label>
                        <textarea name="review" id="review" rows="4" cols="50"></textarea>
                    </div>
                    <button type="submit">Submit Review</button>
            </form>
            @if ($users)
                <a href="{{ url('messages/' . $users->id . '/' . $product->user_id) }}">chat</a>
            @endif
        </div>
    </div>
@endsection
