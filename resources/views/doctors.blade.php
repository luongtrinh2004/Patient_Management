@extends('layouts.app')

@section('title', 'Our Doctors')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4" style="font-family: 'Poppins', sans-serif; color: #0056b3;">Meet Our Doctors</h2>
    <div class="row">
        @foreach($doctors as $doctor)
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm">
                <img src="{{ asset($doctor->image) }}" class="card-img-top mx-auto d-block" alt="{{ $doctor->name }}"
                    style="width: 75%; height: 250px; object-fit: cover; border-radius: 10px;">



                <div class="card-body text-center">
                    <h5 class="card-title" style="font-family: 'Poppins', sans-serif;">{{ $doctor->name }}</h5>
                    <p class="card-text" style="color: #007bff;">{{ $doctor->specialty }}</p>
                    <p class="card-text">{{ $doctor->bio }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection