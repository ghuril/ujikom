<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #224abe;
            --accent: #00f2fe;
        }

        body {
            background: linear-gradient(-45deg, var(--primary), var(--secondary));
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Poppins', sans-serif;
            animation: gradientBG 15s ease infinite;
            background-size: 400% 400%;
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
        }

        .login-container {
            width: 100%;
            padding: 2rem;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.2);
            max-width: 1000px;
            margin: 0 auto;
        }

        .login-left {
            background: rgba(0, 0, 0, 0.8);
            padding: 4rem;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .login-left::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--accent), transparent);
            opacity: 0.1;
        }

        .brand-logo {
            width: 120px;
            margin-bottom: 2rem;
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .login-right {
            padding: 4rem;
        }

        .form-control {
            border: none;
            border-bottom: 2px solid #eee;
            border-radius: 0;
            padding: 0.8rem 0;
            background: transparent;
            transition: all 0.3s;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: var(--primary);
        }

        .form-floating label {
            padding-left: 0;
        }

        .btn-login {
            background: var(--primary);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 1px;
            transition: all 0.3s;
        }

        .btn-login:hover {
            background: var(--secondary);
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .feature-item {
            margin-bottom: 2rem;
            position: relative;
            z-index: 1;
            transition: transform 0.3s;
        }

        .feature-item:hover {
            transform: translateX(10px);
        }

        .feature-icon {
            width: 50px;
            height: 50px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            font-size: 1.5rem;
            position: relative;
            overflow: hidden;
        }

        .feature-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--accent), transparent);
            opacity: 0;
            transition: opacity 0.3s;
        }

        .feature-item:hover .feature-icon::after {
            opacity: 1;
        }

        .notification {
            position: fixed;
            top: 20px;
            right: 20px;
            padding: 1rem;
            border-radius: 10px;
            animation: slideIn 0.5s ease-out;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }

        @keyframes slideIn {
            from {
                transform: translateX(100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <div class="row g-0">
                <div class="col-lg-6 login-left">
                    <div class="position-relative">
                        <img src="/assets/images/logoSMKN4.svg" alt="Logo" class="brand-logo">
                        <h2 class="mb-4">Welcome to SMKN 4 Bogor</h2>
                        <p class="mb-5">Access your admin dashboard to manage content and settings.</p>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <h5>Secure Access</h5>
                            <p class="text-white-50">Enhanced security measures to protect your data</p>
                        </div>
                        
                        <div class="feature-item">
                            <div class="feature-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            <h5>Powerful Dashboard</h5>
                            <p class="text-white-50">Comprehensive tools to manage your website</p>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 login-right">
                    <h3 class="mb-4">Admin Login</h3>
                    <p class="text-muted mb-4">Please sign in to continue</p>

                    @if(session('error'))
                        <div class="notification bg-danger text-white">
                            <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="notification bg-success text-white">
                            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('login.submit') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control" id="username" name="username" 
                                   placeholder="Username" required>
                            <label for="username">Username</label>
                        </div>
                        
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control" id="password" name="password"
                                   placeholder="Password" required>
                            <label for="password">Password</label>
                        </div>

                        <button type="submit" class="btn btn-login w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>Sign In
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Notification animation
        setTimeout(() => {
            document.querySelectorAll('.notification').forEach(notification => {
                notification.style.animation = 'slideOut 0.5s ease-in forwards';
            });
        }, 3000);
    </script>
</body>
</html> 