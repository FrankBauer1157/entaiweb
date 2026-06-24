<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') | Entai Kenya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <style>
        :root {
            --primary: #1B6B3A;
            --secondary: #E8F5E9;
            --accent: #2E7D32;
            --dark: #1A3C1A;
            --cream: #F1F8F2;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            overflow-x: hidden;
        }
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px;
            background-color: var(--dark);
            z-index: 1000;
            transition: transform 0.3s ease;
            overflow-y: auto;
        }
        .sidebar.collapsed {
            transform: translateX(-250px);
        }
        .sidebar-brand {
            padding: 20px 16px;
            border-bottom: 1px solid rgba(245, 222, 179, 0.15);
            text-align: center;
        }
        .sidebar-brand h4 {
            color: var(--secondary);
            font-weight: 700;
            margin: 0;
            letter-spacing: 1px;
        }
        .sidebar-brand small {
            color: var(--accent);
        }
        .sidebar-nav {
            padding: 12px 0;
        }
        .sidebar-nav .nav-link {
            color: rgba(245, 222, 179, 0.75);
            padding: 12px 20px;
            font-size: 15px;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            margin: 2px 0;
        }
        .sidebar-nav .nav-link:hover {
            color: var(--secondary);
            background: rgba(218, 165, 32, 0.1);
            border-left-color: var(--accent);
        }
        .sidebar-nav .nav-link.active {
            color: var(--accent);
            background: rgba(218, 165, 32, 0.15);
            border-left-color: var(--accent);
            font-weight: 600;
        }
        .sidebar-nav .nav-link i {
            width: 22px;
            text-align: center;
            margin-right: 8px;
        }
        .sidebar-footer {
            position: sticky;
            top: 100vh;
            padding: 12px 20px;
            border-top: 1px solid rgba(245, 222, 179, 0.15);
        }
        .sidebar-footer .nav-link {
            color: rgba(245, 222, 179, 0.6);
        }
        .sidebar-footer .nav-link:hover {
            color: #dc3545;
        }
        .topbar {
            position: fixed;
            top: 0;
            left: 250px;
            right: 0;
            height: 60px;
            background: #fff;
            border-bottom: 1px solid #e9ecef;
            display: flex;
            align-items: center;
            padding: 0 20px;
            z-index: 999;
            transition: left 0.3s ease;
        }
        .sidebar.collapsed ~ .topbar {
            left: 0;
        }
        .topbar .toggle-sidebar {
            background: none;
            border: none;
            font-size: 20px;
            color: var(--dark);
            cursor: pointer;
            padding: 4px 8px;
        }
        .topbar .page-title {
            font-size: 18px;
            font-weight: 600;
            color: var(--dark);
            margin-left: 12px;
        }
        .topbar .user-dropdown .dropdown-toggle {
            color: var(--dark);
            text-decoration: none;
            font-weight: 500;
        }
        .main-content {
            margin-left: 250px;
            margin-top: 60px;
            padding: 24px;
            min-height: calc(100vh - 60px);
            transition: margin-left 0.3s ease;
        }
        .sidebar.collapsed ~ .main-content {
            margin-left: 0;
        }
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-250px);
            }
            .sidebar.mobile-open {
                transform: translateX(0);
            }
            .topbar {
                left: 0;
            }
            .main-content {
                margin-left: 0;
            }
        }
        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
        }
        .btn-primary-custom:hover {
            background-color: #145228;
            border-color: #145228;
            color: #fff;
        }
        .btn-accent {
            background-color: var(--accent);
            border-color: var(--accent);
            color: #212529;
        }
        .btn-accent:hover {
            background-color: #1B5E20;
            border-color: #1B5E20;
            color: #fff;
        }
        .text-primary-custom { color: var(--primary) !important; }
        .bg-primary-custom { background-color: var(--primary) !important; }
        .text-accent { color: var(--accent) !important; }
        .bg-dark-custom { background-color: var(--dark) !important; }
        .bg-cream { background-color: var(--cream) !important; }
        .border-accent { border-color: var(--accent) !important; }
    </style>
    @stack('styles')
</head>
<body>
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <h4>Entai Kenya</h4>
            <small>Admin Panel</small>
        </div>
        <ul class="nav flex-column sidebar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.packages.*') ? 'active' : '' }}" href="{{ route('admin.packages.index') }}">
                    <i class="fas fa-box"></i> Packages
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.inquiries.*') ? 'active' : '' }}" href="{{ route('admin.inquiries.index') }}">
                    <i class="fas fa-envelope"></i> Inquiries
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}" href="{{ route('admin.testimonials.index') }}">
                    <i class="fas fa-star"></i> Testimonials
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.galleries.*') ? 'active' : '' }}" href="{{ route('admin.galleries.index') }}">
                    <i class="fas fa-image"></i> Gallery
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('admin.settings.index') ? 'active' : '' }}" href="{{ route('admin.settings.index') }}">
                    <i class="fas fa-cog"></i> Settings
                </a>
            </li>
        </ul>
        <div class="sidebar-footer">
            <a class="nav-link" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </aside>

    <div class="topbar" id="topbar">
        <button class="toggle-sidebar" id="toggleSidebar" title="Toggle Sidebar">
            <i class="fas fa-bars"></i>
        </button>
        <span class="page-title">@yield('title', 'Admin Panel')</span>
        <div class="ms-auto dropdown user-dropdown">
            <a class="dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                <i class="fas fa-user-circle me-1"></i> {{ Auth::user()->name ?? 'Admin' }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="{{ route('admin.settings.index') }}"><i class="fas fa-cog me-2"></i>Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt me-2"></i>Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <main class="main-content">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <strong>Please fix the following errors:</strong>
                <ul class="mb-0 mt-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <div class="sidebar-overlay" id="sidebarOverlay" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:999;"></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('toggleSidebar');
        const overlay = document.getElementById('sidebarOverlay');

        toggleBtn.addEventListener('click', () => {
            if (window.innerWidth <= 768) {
                sidebar.classList.toggle('mobile-open');
                overlay.style.display = sidebar.classList.contains('mobile-open') ? 'block' : 'none';
            } else {
                sidebar.classList.toggle('collapsed');
            }
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('mobile-open');
            overlay.style.display = 'none';
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('mobile-open');
                overlay.style.display = 'none';
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
