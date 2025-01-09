@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
        <!-- Slide 1 -->
        <div class="carousel-item active">
            <div class="hero" style="background: url('/img/bg1.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
        <!-- Slide 2 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('/img/bg2.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
        <!-- Slide 3 -->
        <div class="carousel-item">
            <div class="hero" style="background: url('/img/bg3.webp') no-repeat center center/cover; height: 500px;">
                <div class="container text-center text-white">

                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
@endsection