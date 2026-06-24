<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Entai Kenya</title>
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
            background-color: #f4f4f4;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            width: 100%;
            max-width: 420px;
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 24px rgba(44, 24, 16, 0.12);
        }
        .login-logo {
            width: 72px;
            height: 72px;
            background: var(--primary);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            font-weight: 700;
            margin: 0 auto 12px;
        }
        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
            color: #fff;
            font-weight: 600;
        }
        .btn-primary-custom:hover {
            background-color: #145228;
            border-color: #145228;
        }
        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 0.2rem rgba(218, 165, 32, 0.25);
        }
        .brand-heading {
            color: var(--primary);
            font-weight: 700;
            letter-spacing: 1px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-card card mx-auto">
            <div class="card-body p-5">
                <div class="text-center mb-4">
                    <div class="login-logo">EK</div>
                    <h2 class="brand-heading">Entai Kenya</h2>
                    <p class="text-muted small">Admin Panel</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" name="email" id="email" class="form-control" placeholder="admin@entaikenya.com" value="{{ old('email') }}" required autofocus>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" name="password" id="password" class="form-control" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary-custom btn-lg">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-3 small">&copy; {{ date('Y') }} Entai Kenya. All rights reserved.</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
