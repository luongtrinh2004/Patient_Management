<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clinic Home</title>
    <style>
    /* General styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: Arial, sans-serif;
    }

    body {
        background-color: #f4f4f4;
        color: #333;
        line-height: 1.6;
    }

    header {
        background: #4CAF50;
        color: #fff;
        padding: 10px 0;
        text-align: center;
    }

    nav {
        background: #333;
        display: flex;
        justify-content: center;
        padding: 10px 0;
    }

    nav a {
        color: white;
        text-decoration: none;
        margin: 0 15px;
        padding: 10px 15px;
        font-size: 16px;
        border-radius: 4px;
        transition: background 0.3s;
    }

    nav a:hover {
        background: #4CAF50;
    }

    .hero {
        background: url('https://via.placeholder.com/1200x400') no-repeat center center/cover;
        height: 400px;
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
    }

    .hero h1 {
        font-size: 50px;
        margin-bottom: 20px;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.7);
    }

    .hero p {
        font-size: 20px;
        margin-bottom: 20px;
    }

    .container {
        padding: 20px;
        text-align: center;
    }

    .section {
        margin: 20px 0;
    }

    .section h2 {
        font-size: 28px;
        margin-bottom: 10px;
        color: #4CAF50;
    }

    footer {
        background: #333;
        color: white;
        text-align: center;
        padding: 10px 0;
        position: relative;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>
    <header>
        <h1>Welcome to Our Clinic</h1>
    </header>

    <nav>
        <a href="{{ url('/') }}">HOME</a>
        <a href="{{ url('/doctors') }}">DOCTORS</a>
        <a href="{{ url('/about') }}">ABOUT US</a>
        <a href="{{ url('/contact') }}">CONTACT</a>
        <a href="{{ url('/patients') }}">PATIENTS</a>
    </nav>

    <div class="hero">
        <div>
            <h1>Your Health is Our Priority</h1>
            <p>Providing professional and compassionate care to our patients.</p>
        </div>
    </div>

    <div class="container">
        <div class="section">
            <h2>Our Services</h2>
            <p>We offer a variety of medical services, including general checkups, specialized treatments, and
                preventive care.</p>
        </div>

        <div class="section">
            <h2>Meet Our Doctors</h2>
            <p>Our team of experienced doctors is here to provide you with the best medical care.</p>
        </div>

        <div class="section">
            <h2>Contact Us</h2>
            <p>Have questions or need to schedule an appointment? Reach out to us today!</p>
        </div>
    </div>

    <footer>
        <p>&copy; 2025 Our Clinic. All rights reserved.</p>
    </footer>
</body>

</html>