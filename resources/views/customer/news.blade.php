@extends('customer.master')
@section('judul', 'UMKM Malang')
@section('isi')

    <!-- ======= Breadcrumbs ======= -->
    <br><br><br>
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>UMKM NEWS</h2>
            </div>
            <div class="row">
                @foreach ($news as $card)
                    <div class="col-lg-3 col-md-4 mb-4 mr-4" data-aos="zoom-in" data-aos-delay="100">
                        <div class="card" style="width: 170px;">
                            <img src="{{ asset('newspicture/' . $card->picture) }}" class="card-img-top " alt="blank"
                                style="maxwidth: 100px; maxheight: 100px;">
                            <div class="card-body">
                                <h5 class="card-title">{{ $card->headline }}</h5>
                                <p class="card-text">{{ $card->author }}</p>
                                <p class="card-text">{{ $card->date }}</p>
                                <h4><a href="{{ url('/news/details', $card->id) }}">VIEW</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>



    </section><!-- End Sevices Section -->
@endsection
