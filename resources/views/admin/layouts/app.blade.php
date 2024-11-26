<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - Admin Panel</title>
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #858796;
            --success: #1cc88a;
            --info: #36b9cc;
            --warning: #f6c23e;
            --danger: #e74a3b;
        }

        /* Sidebar */
        #sidebar {
            min-height: 100vh;
            background: #4e73df;
            background: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
            transition: all 0.3s;
            position: fixed;
            width: 250px;
            z-index: 999;
        }

        #sidebar.active {
            margin-left: -250px;
        }

        #sidebar .sidebar-header {
            padding: 20px;
            background: rgba(0, 0, 0, 0.1);
        }

        #sidebar ul.components {
            padding: 20px 0;
        }

        #sidebar ul li a {
            padding: 10px 20px;
            font-size: 1.1em;
            display: block;
            color: rgba(255,255,255,0.8);
            text-decoration: none;
            transition: all 0.3s;
        }

        #sidebar ul li a:hover {
            color: #fff;
            background: rgba(255,255,255,0.1);
        }

        #sidebar ul li.active > a {
            color: #fff;
            background: rgba(255,255,255,0.1);
        }

        /* Content */
        #content {
            width: calc(100% - 250px);
            min-height: 100vh;
            transition: all 0.3s;
            position: absolute;
            top: 0;
            right: 0;
            background: #f8f9fc;
        }

        #content.active {
            width: 100%;
        }

        /* Navbar */
        .navbar {
            background: #fff;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
            padding: 1rem;
        }

        /* Cards */
        .card {
            margin-bottom: 1.5rem;
            border: none;
            box-shadow: 0 .15rem 1.75rem 0 rgba(58,59,69,.15);
        }

        .card-header {
            background-color: #f8f9fc;
            border-bottom: 1px solid #e3e6f0;
        }

        /* Utilities */
        .border-left-primary { border-left: .25rem solid var(--primary) !important; }
        .border-left-success { border-left: .25rem solid var(--success) !important; }
        .border-left-info { border-left: .25rem solid var(--info) !important; }
        .border-left-warning { border-left: .25rem solid var(--warning) !important; }

        /* Responsive */
        @media (max-width: 768px) {
            #sidebar {
                margin-left: -250px;
            }
            #sidebar.active {
                margin-left: 0;
            }
            #content {
                width: 100%;
            }
            #content.active {
                width: calc(100% - 250px);
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3 class="text-white">SMKN 4 BOGOR</h3>
            </div>

            <ul class="list-unstyled components">
                <li class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="fas fa-fw fa-tachometer-alt mr-2"></i>
                        Dashboard
                    </a>
                </li>
                <li class="{{ Request::is('admin/berita*') ? 'active' : '' }}">
                    <a href="{{ route('posts.index') }}?type=berita">
                        <i class="fas fa-fw fa-newspaper mr-2"></i>
                        Berita
                    </a>
                </li>
                <li class="{{ Request::is('admin/agenda*') ? 'active' : '' }}">
                    <a href="{{ route('posts.index') }}?type=agenda">
                        <i class="fas fa-fw fa-calendar mr-2"></i>
                        Agenda
                    </a>
                </li>
                <li class="{{ Request::is('admin/galeri*') ? 'active' : '' }}">
                    <a href="{{ route('galeri.index') }}">
                        <i class="fas fa-fw fa-images mr-2"></i>
                        Gallery
                    </a>
                </li>
                <li>
                    <a href="{{ route('logout') }}">
                        <i class="fas fa-fw fa-sign-out-alt mr-2"></i>
                        Logout
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Content -->
        <div id="content">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-primary">
                        <i class="fas fa-bars"></i>
                    </button>

                    <div class="ml-auto d-flex align-items-center">
                        <div class="dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Admin</span>
                                <img class="img-profile rounded-circle" src="/assets/images/admin-avatar.jpg" width="32">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="{{ route('logout') }}">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content -->
            <div class="container-fluid p-4">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
            });
        });
    </script>
    @stack('scripts')
</body>
</html> 