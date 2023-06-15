@extends('customer.master')
@section('judul', 'UMKM Malang')
@section('isi')

    <br><br><br><br><br><br>
    <div class="container">
        <h2>News Detail</h2>
        <div class="product">
            <img src="{{ asset('newspicture/' . $product->picture) }}"
                style="display: block; margin: 0 auto; max-width: 500px; max-height: 400px;" alt="...">


            {{-- <div id="carouselExampleCaptions" class="carousel slide">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            
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
        </div> --}}
            {{-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button> --}}
        </div>
        <div style="text-align: center;">
            <h1>{{ $product->headline }}</h1>
        </div>
        <div style="text-align: center;">
            <h6 style="color: grey">By: {{ $product->author }}</h6>
        </div>
        <p style="font-size: 15pt; font-family: Sans-serif">{{ $product->content }}</p>
        <p style="font-size: 8pt;color:grey; font-family: Arial">Date: {{ $product->date }}</p>
    @endsection
