<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Merchant Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/merchant-style.css') }}">
</head>
<body class="merchant-dashboard">
    <!-- Header -->
    <header class="header">
        <div class="header-content">
            <h1 class="dashboard-title">Merchant Dashboard</h1>
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
                    <li><a href="{{ route('merchant.dashboard') }}" class="sidebar-link">Manage Menus</a></li>
                    <li><a href="{{ route('merchant.dashboard') }}" class="sidebar-link">View Orders</a></li>
                    <li><a href="{{ route('merchant.dashboard') }}" class="sidebar-link">Edit Profile</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <div class="welcome-container">
                <h2>Welcome, {{ auth()->user()->name }}</h2>
                <p>Manage your catering business effectively through this dashboard.</p>
            </div>
        </main>
    </div>
</body>
</html>
