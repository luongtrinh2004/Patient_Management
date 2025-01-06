@extends('layouts.app')

@section('title', 'Doctors')

@section('content')
<div class="container">
    <h1 class="text-center">Our Doctors</h1>
    <p class="text-center">Meet our experienced and compassionate medical professionals.</p>
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Doctor 1">
                <div class="card-body">
                    <h5 class="card-title">Dr. Nguyen Van A</h5>
                    <p class="card-text">Specialist in Cardiology</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Doctor 2">
                <div class="card-body">
                    <h5 class="card-title">Dr. Tran Thi B</h5>
                    <p class="card-text">Specialist in Pediatrics</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="Doctor 3">
                <div class="card-body">
                    <h5 class="card-title">Dr. Le Van C</h5>
                    <p class="card-text">Specialist in Neurology</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection