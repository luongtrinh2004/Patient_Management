@extends('layouts.app')

@section('title', 'About Us')

@section('content')
<div class="container">
    <h1 class="text-center">About Us</h1>
    <p class="text-center">Our clinic is dedicated to providing high-quality healthcare services to the community.</p>
    <div class="row">
        <div class="col-md-6">
            <img src="https://via.placeholder.com/400x300" alt="About Image" class="img-fluid">
        </div>
        <div class="col-md-6">
            <h2>Our Mission</h2>
            <p>We aim to deliver compassionate, professional, and personalized care to every patient.</p>
            <h2>Our Vision</h2>
            <p>To become the leading healthcare provider in the region through innovation and excellence.</p>
        </div>
    </div>
</div>
@endsection