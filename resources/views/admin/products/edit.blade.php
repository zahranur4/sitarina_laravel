<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Sitarina</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>

    <link
      rel="shortcut icon"
      href="{{asset('img/favicon.png')}}"
      type="image/x-icon"
    />

    <style>
        /* Custom CSS untuk layout sidebar */
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: row;
        }
        .sidebar {
            width: 250px;
            min-width: 250px;
            background-color: #001f3f; /* Warna biru navy */
            color: white;
            padding: 1rem;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.7);
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            color: white;
            background-color: #003366; /* Warna biru sedikit lebih terang */
            border-radius: 0.5rem;
        }
        .sidebar .nav-link i {
            margin-right: 0.75rem;
            font-size: 1.2rem;
        }
        .sidebar .sidebar-header {
            font-size: 1.5rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2rem;
        }
        .main-content {
            flex-grow: 1;
            padding: 2rem;
            background-color: #f8f9fa; /* Latar belakang abu-abu terang */
        }
    </style>
</head>
<body>
    <div class="sidebar d-flex flex-column">
        <div class="sidebar-header">
            Sitarina's
        </div>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="{{ route('admin.products.index') }}" class="nav-link active">
                    <i class="ri-shopping-bag-3-line"></i>
                    Manajemen Produk
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="ri-user-line"></i>
                    Manajemen User
                </a>
            </li>
        </ul>
        <hr style="border-color: rgba(255,255,255,0.2);">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a href="{{ url('/') }}" class="nav-link">
                        <i class="ri-home-4-line"></i>
                        Kembali ke Web Utama
                    </a>
                </li>
            <li class="nav-item">
                <form action="{{ url('/logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-start w-100">
                        <i class="ri-logout-box-line"></i>
                        Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
        
    </div>

    <main class="main-content">
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>