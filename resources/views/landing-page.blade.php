<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 4 BOGOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        :root {
            --primary: #4e73df;
            --secondary: #224abe;
            --accent: #00f2fe;
            --dark: #1a1a1a;
        }

        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        /* Navbar Styles */
        .navbar {
            background: rgba(26, 26, 26, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            transition: all 0.3s ease;
        }

        .navbar-brand img {
            height: 40px;
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.1);
        }

        .nav-link {
            color: white !important;
            position: relative;
            padding: 0.5rem 1rem !important;
            margin: 0 0.2rem;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            bottom: 0;
            left: 50%;
            background: var(--accent);
            transition: all 0.3s ease;
        }

        .nav-link:hover::after {
            width: 100%;
            left: 0;
        }

        /* Hero Section */
        .hero {
            height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('/assets/images/hero-bg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex;
            align-items: center;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            opacity: 0.3;
            animation: gradientMove 15s ease infinite;
        }

        @keyframes gradientMove {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        .hero-content {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .hero-title {
            font-size: 4rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            animation: fadeInUp 1s ease;
        }

        .hero-subtitle {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            animation: fadeInUp 1s ease 0.3s;
            animation-fill-mode: both;
        }

        /* Program Cards */
        .program-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .program-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .program-img {
            height: 250px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .program-card:hover .program-img {
            transform: scale(1.1);
        }

        /* News Cards */
        .news-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            height: 100%;
        }

        .news-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.2);
        }

        .news-img {
            height: 200px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-img {
            transform: scale(1.1);
        }

        /* Achievement Section */
        .achievement-section {
            background: linear-gradient(rgba(0,0,0,0.9), rgba(0,0,0,0.9)), url('/assets/images/achievement-bg.jpg');
            background-size: cover;
            background-attachment: fixed;
            color: white;
            padding: 100px 0;
            position: relative;
            overflow: hidden;
        }

        .achievement-section::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            opacity: 0.1;
        }

        .achievement-card {
            text-align: center;
            padding: 2rem;
            position: relative;
            z-index: 1;
        }

        .achievement-number {
            font-size: 3rem;
            font-weight: 700;
            color: var(--accent);
            margin-bottom: 1rem;
            background: linear-gradient(45deg, var(--primary), var(--accent));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Footer */
        footer {
            background: var(--dark);
            color: white;
            padding: 50px 0 20px;
        }

        .social-links a {
            color: white;
            font-size: 1.5rem;
            margin-right: 1rem;
            transition: all 0.3s ease;
        }

        .social-links a:hover {
            color: var(--accent);
            transform: translateY(-3px);
        }

        /* Animations */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hero-title {
                font-size: 2.5rem;
            }
            
            .hero-subtitle {
                font-size: 1.2rem;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="/assets/images/logoSMKN4.svg" alt="SMKN 4 BOGOR">
                <span class="ms-2 text-white">GALERI SEKOLAH</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#home" class="nav-link">Beranda</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">Tentang</a></li>
                    <li class="nav-item"><a href="#programs" class="nav-link">Program</a></li>
                    <li class="nav-item"><a href="#news" class="nav-link">Berita</a></li>
                    <li class="nav-item"><a href="#agenda" class="nav-link">Agenda</a></li>
                    <li class="nav-item"><a href="#gallery" class="nav-link">Galeri</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="hero">
        <div class="container">
            <div class="hero-content" data-aos="fade-up">
                <h1 class="hero-title">SMKN 4 BOGOR</h1>
                <p class="hero-subtitle">SEKOLAH PUSAT KEUNGGULAN</p>
            </div>
        </div>
    </section>

    <!-- Sambutan Section -->
    <section id="sambutan" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold" data-aos="fade-up">SAMBUTAN KEPALA SEKOLAH</h6>
                <h2 class="mb-3" data-aos="fade-up">Selamat Datang di SMKN 4 Bogor</h2>
            </div>
            
            <div class="row align-items-center">
                <div class="col-md-5 mb-4 mb-md-0" data-aos="fade-right">
                    <div class="position-relative">
                        <img src="/assets/images/kepala_sekolah.png" alt="Kepala Sekolah" class="img-fluid rounded-3 shadow-lg" style="width: 100%; height: 400px; object-fit: cover;">
                        <div class="position-absolute bottom-0 start-0 end-0 bg-primary bg-opacity-90 text-white p-3">
                            <h5 class="mb-0">Drs. Mulya Murprihartono, M.Si.</h5>
                            <small>Kepala SMKN 4 Bogor</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-7" data-aos="fade-left">
                    <div class="ps-md-4">
                        <div class="mb-4">
                            <p class="lead text-primary mb-3">Assalamu'alaikum Wr. Wb.</p>
                            <p class="text-muted">Puji syukur kita panjatkan ke hadirat Allah SWT, atas segala limpahan rahmat dan karunia-Nya. Selamat datang di website resmi SMKN 4 Bogor.</p>
                            <p class="text-muted">SMKN 4 Bogor berkomitmen untuk menghasilkan lulusan yang:</p>
                            <ul class="text-muted">
                                <li>Berakhlak mulia dan berkarakter</li>
                                <li>Memiliki kompetensi unggul di bidangnya</li>
                                <li>Siap bersaing di dunia kerja</li>
                                <li>Mampu berwirausaha secara mandiri</li>
                            </ul>
                            <p class="text-muted">Dengan dukungan tenaga pendidik yang profesional dan fasilitas pembelajaran yang modern, kami terus berinovasi dalam mengembangkan metode pembelajaran yang efektif.</p>
                            <p class="text-muted mb-0">Wassalamu'alaikum Wr. Wb.</p>
                        </div>
                        <div class="row g-4 mt-4">
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-3 rounded-circle bg-primary bg-opacity-10">
                                            <i class="fas fa-award text-primary fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="mb-1 text-primary">30+</h4>
                                        <small class="text-muted">Tahun Pengalaman</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0">
                                        <div class="p-3 rounded-circle bg-primary bg-opacity-10">
                                            <i class="fas fa-star text-primary fa-2x"></i>
                                        </div>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h4 class="mb-1 text-primary">100%</h4>
                                        <small class="text-muted">Akreditasi A</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Programs Section dengan style yang diperbarui -->
    <section id="programs" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h6 class="text-primary fw-bold" data-aos="fade-up">PROGRAM KEAHLIAN</h6>
                <h2 class="mb-3" data-aos="fade-up">Pilihan Jurusan di SMKN 4 Bogor</h2>
                <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Program keahlian yang sesuai dengan kebutuhan industri</p>
            </div>
            
            <div class="row g-4">
                @foreach($programs as $program)
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="program-card h-100">
                        <div class="position-relative">
                            <img src="{{ asset($program['image']) }}" 
                                 class="program-img w-100" 
                                 alt="{{ $program['name'] }}"
                                 style="height: 250px; object-fit: cover;">
                            <div class="position-absolute top-0 start-0 m-3">
                                <span class="badge bg-primary">Program Unggulan</span>
                            </div>
                        </div>
                        <div class="p-4">
                            <h5 class="mb-3">{{ $program['name'] }}</h5>
                            <p class="text-muted mb-0">{{ $program['description'] }}</p>
                            <hr class="my-4">
                            <div class="d-flex align-items-center text-muted">
                                <i class="fas fa-users me-2"></i>
                                <small>3 Tahun Pembelajaran</small>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Achievement Section -->
    <section class="achievement-section">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up">
                    <div class="achievement-card">
                        <div class="achievement-number">{{ $achievements['students'] }}</div>
                        <h5>Siswa Aktif</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="achievement-card">
                        <div class="achievement-number">{{ $achievements['teachers'] }}</div>
                        <h5>Guru Profesional</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="achievement-card">
                        <div class="achievement-number">{{ $achievements['graduates'] }}</div>
                        <h5>Alumni Sukses</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="achievement-card">
                        <div class="achievement-number">{{ $achievements['partners'] }}</div>
                        <h5>Mitra Industri</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section id="news" class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3" data-aos="fade-up">Berita Terkini</h2>
                <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Informasi terbaru seputar kegiatan sekolah</p>
            </div>
            
            <div class="row">
                @foreach($berita as $post)
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="news-card">
                        <img src="{{ asset($post->gambar) }}" class="news-img w-100" alt="{{ $post->judul }}">
                        <div class="p-4">
                            <small class="text-muted">{{ $post->created_at->format('d M Y') }}</small>
                            <h5 class="mt-2">{{ $post->judul }}</h5>
                            <p>{{ Str::limit($post->isi, 100) }}</p>
                            <a href="#" class="btn btn-outline-primary">Baca Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Agenda Section -->
    <section id="agenda" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="mb-3" data-aos="fade-up">Agenda Kegiatan</h2>
                <p class="text-muted" data-aos="fade-up" data-aos-delay="100">Jadwal kegiatan yang akan datang</p>
            </div>
            
            <div class="row">
                @foreach($agenda as $post)
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="news-card">
                        <img src="{{ asset($post->gambar) }}" class="news-img w-100" alt="{{ $post->judul }}">
                        <div class="p-4">
                            <small class="text-muted">{{ $post->created_at->format('d M Y') }}</small>
                            <h5 class="mt-2">{{ $post->judul }}</h5>
                            <p>{{ Str::limit($post->isi, 100) }}</p>
                            <a href="#" class="btn btn-outline-primary">Detail Agenda</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h6 class="text-primary fw-bold" data-aos="fade-up">GALERI KEGIATAN</h6>
            <h2 class="mb-3" data-aos="fade-up">Dokumentasi Kegiatan Sekolah</h2>
        </div>
        
        <div class="row g-4">
        @foreach($galeri as $post)
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card gallery-card h-100">
                    <div class="position-relative overflow-hidden">
                    <img src="{{ $post->gambar ? asset($post->gambar) : asset('images') }}"
                            class="card-img-top gallery-img" 
                            alt="Thumbnail"
                            style="height: 250px; object-fit: cover;">
                            <div class="gallery-overlay">
                            <div class="p-4">
                                <h5 class="text-black mb-2">{{ $post->judul }}</h5>
                                <p class="text-black-50 mb-0">{{ Str::limit($post->isi, 100) }}</p>
                                <div class="mt-3">
                                    <small class="text-black-50">
                                        <i class="fas fa-calendar me-2"></i>
                                        {{ $post->created_at->format('d M Y') }}
                                    </small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5>SMKN 4 BOGOR</h5>
                    <p>AKHLAK terpuji ILMU terkaji TERAMPIL dan Teruji</p>
                    <div class="social-links mt-3">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Kontak</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i>Jl. Raya Tajur, Bogor</p>
                    <p><i class="fas fa-phone me-2"></i>+62 123 456 789</p>
                    <p><i class="fas fa-envelope me-2"></i>info@smkn4bogor.sch.id</p>
                </div>
                <div class="col-md-4 mb-4">
                    <h5>Jam Operasional</h5>
                    <p>Senin - Jumat: 07:00 - 16:00</p>
                    <p>Sabtu: 07:00 - 12:00</p>
                </div>
            </div>
            <div class="text-center pt-4 border-top">
                <small>&copy; 2024 SMKN 4 Bogor. All rights reserved.</small>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });

        // Smooth scroll
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            if (window.scrollY > 50) {
                document.querySelector('.navbar').style.background = 'rgba(26, 26, 26, 0.95)';
            } else {
                document.querySelector('.navbar').style.background = 'transparent';
            }
        });
    </script>
</body>
</html>
