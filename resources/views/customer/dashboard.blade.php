<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/customer-style.css') }}">
</head>
<body class="customer-dashboard">
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <h1 class="dashboard-title">Customer Dashboard</h1>
            <div class="user-actions">
                <span class="user-info">Welcome, {{ auth()->user()->name }}</span>
                <form action="{{ route('logout') }}" method="POST" class="logout-form">
                    @csrf
                    <button type="submit" class="btn btn-logout">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <div class="dashboard-layout">
        <!-- Sidebar -->
        <aside class="sidebar">
            <nav>
                <ul class="sidebar-nav">
                    <li><a href="{{ route('customer.dashboard') }}" class="sidebar-link">Dashboard</a></li>
                    <li><a href="{{ route('customer.search') }}" class="sidebar-link">Search Catering</a></li>
                    <li><a href="{{ route('customer.orders') }}" class="sidebar-link">My Orders</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="welcome-container">
                <h2>Welcome, {{ auth()->user()->name }}</h2>
                <p>Explore and order catering services for your office needs.</p>
            </div>
        </main>
    </div>
</body>
</html>
