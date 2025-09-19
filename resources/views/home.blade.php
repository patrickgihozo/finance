<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Finance - Welcome</title>
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: #e3f2fd;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        .finance-bg {
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            z-index: 0;
            pointer-events: none;
        }
        .finance-bg img {
            position: absolute;
            opacity: 0.18;
            filter: blur(10px);
            width: 350px;
        }
        .finance-bg img.img1 { top: 8%; left: 3%; }
        .finance-bg img.img2 { top: 60%; left: 75%; }
        .finance-bg img.img3 { top: 35%; left: 40%; }
        .top-bar {
            position: absolute;
            top: 0; left: 0; width: 100vw;
            z-index: 2;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 3rem 0.5rem 3rem;
        }
        .brand {
            font-size: 2rem;
            font-weight: bold;
            color: #0d6efd;
            letter-spacing: 2px;
            text-shadow: 0 2px 8px #fff;
        }
        .btn-group {
            gap: 1rem;
        }
        .main-content {
            position: relative;
            z-index: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .intro-text {
            color: #0d6efd;
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
            text-shadow: 0 2px 8px #fff;
        }
        .desc-text {
            color: #212529;
            font-size: 1.25rem;
            margin-bottom: 2rem;
            text-align: center;
            text-shadow: 0 1px 6px #fff;
        }
        .offers-list {
            font-size: 1.1rem;
            color: #212529;
            margin-bottom: 2rem;
            text-align: left;
            background: rgba(255,255,255,0.7);
            border-radius: 10px;
            padding: 1rem 2rem;
            box-shadow: 0 2px 8px #e3f2fd;
            display: inline-block;
        }
        @media (max-width: 600px) {
            .top-bar { padding: 1rem; flex-direction: column; gap: 1rem; }
            .offers-list { padding: 1rem; }
        }
    </style>
</head>
<body>
    <div class="finance-bg">
        <img src="https://images.unsplash.com/photo-1515165562835-cf7747d3f7b1?auto=format&fit=crop&w=400&q=80" class="img1" alt="Finance">
        <img src="https://images.unsplash.com/photo-1506744038136-46273834b3fb?auto=format&fit=crop&w=400&q=80" class="img2" alt="Finance">
        <img src="https://images.unsplash.com/photo-1465101046530-73398c7f28ca?auto=format&fit=crop&w=400&q=80" class="img3" alt="Finance">
    </div>
    <div class="top-bar">
        <div class="brand">My Finance</div>
        <div class="btn-group d-flex">
            <a href="{{ route('login') }}" class="btn btn-primary px-4">Sign In</a>
            <a href="{{ route('register') }}" class="btn btn-outline-primary px-4">Sign Up</a>
        </div>
    </div>
    <div class="main-content">
        <div class="intro-text">Welcome!</div>
        <div class="desc-text">
            We help you manage your money better.<br>
            Here’s what we offer:
        </div>
        <div class="offers-list">
            <ul class="mb-0">
                <li>We track your incomes and expenses</li>
                <li>We provide detailed transaction history</li>
                <li>We give you a clear overview of how you use your money</li>
            </ul>
        </div>
    </div>
    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>