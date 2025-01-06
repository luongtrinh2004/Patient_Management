@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<div class="container">
    <h1 class="text-center">Contact Us</h1>
    <p class="text-center">We'd love to hear from you! Please use the form below to get in touch.</p>
    <div class="row">
        <div class="col-md-6">
            <form action="/contact" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
            </form>
        </div>
        <div class="col-md-6">
            <h3>Our Address</h3>
            <p>123 Main Street, Hanoi, Vietnam</p>
            <h3>Phone</h3>
            <p>+84 123 456 789</p>
            <h3>Email</h3>
            <p>info@ourclinic.com</p>
        </div>
    </div>
</div>
@endsection