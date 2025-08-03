<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="{{asset ('img/favicon.png')}}"
      type="image/x-icon"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.7.0/remixicon.css"
    />
    @vite(['resources/css/styles.css', 'resources/js/main.js'])
    <title>Sitarina's</title>
  </head>
  <body>
    <header class="header" id="header">
      <nav class="nav container">
        <a href="#" class="nav__logo">sitarina's</a>
        <div class="nav__menu" id="nav-menu">
          <ul class="nav__list">
            <li class="nav__item">
              <a href="#home" class="nav__link">Home</a>
            </li>
            <li class="nav__item">
              <a href="#about" class="nav__link">About Us</a>
            </li>
            <li class="nav__item">
              <a href="#favorite-classic" class="nav__link">Product</a>
            </li>
            <li class="nav__item">
              <a href="#visit" class="nav__link">Location</a>
            </li>
            <li class="nav__item">
             @guest
                    <a class="btn btn-dark" href="{{ url('/login') }}">Login</a>
                @endguest

                @auth
                    <div class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                          @if (Auth::user()->is_admin)
                            <li>
                              <a class="dropdown-item" href="{{ route('admin.products.index') }}">
                                <i class="ri-dashboard-line"></i> Dashboard Admin
                              </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                          @endif
                            <li><a class="dropdown-item" href="{{ url('/profile') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="{{ url('/logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </li>
          </ul>
          <div class="nav__close" id="nav-close">
            <i class="ri-close-line"></i>
          </div>
        </div>
        
        <div class="nav__toggle" id="nav-toggle">
          <i class="ri-menu-fill"></i>
        </div>
      </nav>
    </header>
    
    <main class="main">
      <section class="home section" id="home">
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="{{asset ('img/slider 1.png')}}" class="d-block w-100" alt="Sentuhan Manis yang Menggugah Selera">
              <div class="carousel-caption">
                <a href="#favorite-classic" class="button">Lihat Koleksi</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{asset ('img/slider 2.png')}}" class="d-block w-100" alt="Kue Spesial untuk Moment Spesial">
              <div class="carousel-caption">
                <a href="#favorite-classic" class="button">Pesan Sekarang</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{asset ('img/slider 3.png')}}" class="d-block w-100" alt="Nikmati Sensasi Manis dengan Gaya">
              <div class="carousel-caption">
                <a href="#visit" class="button">Hubungi Kami</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="{{asset ('img/slider 4.png')}}" class="d-block w-100" alt="Satu Irisan, Seribu Kenikmatan">
              <div class="carousel-caption">
                <a href="#visit" class="button">Hubungi Kami</a>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </section>

      <section class="new section" id="new">
        <h2 class="section__title">Classic Product</h2>
        <div class="new__container container center-content">
          <div class="new__content grid">
            <article class="new__card">
              <div class="new__data">
                <h2 class="new__title">Cream and Cheese</h2>
                <p class="new__description">
                  Crepe lembut yang dilapis krim cokelat yang creamy banget.
                  Rasa cokelatnya rich, lembut, dan lumer di mulut.
                </p>
              </div>
              <img
                src="{{asset ('img/CNC.png')}}"
                alt="Image New Bread"
                class="new__img"
              />
            </article>
            <article class="new__card">
              <div class="new__data">
                <h2 class="new__title">PBnC</h2>
                <p class="new__description">
                  Crepe yang ringan dan creamy, dilapis krim keju yang lembut.
                  Rasanya pas banget—manisnya dapet, gurihnya juga dapet.
                </p>
              </div>
              <img
                src="{{asset ('img/PBnC.png')}}"
                alt="Image New Bread"
                class="new__img"
              />
            </article>
            <article class="new__card">
              <div class="new__data">
                <h2 class="new__title">Strawberry</h2>
                <p class="new__description">
                  Lapisan crepe yang lembut, diisi krim stroberi yang ringan,
                  dipadukan dengan sentuhan rasa buah asli.
                </p>
              </div>
              <img
                src="{{asset ('img/Stro.png')}}"
                alt="Image New Bread"
                class="new__img"
              />
            </article>
          </div>
          <a href="#" class="new__button button">See More Mille Crepes</a>
        </div>
      </section>

      <section class="about section" id="about">
        <div class="about__container container center-content">
          <div class="about__data">
            <h2 class="section__title">About Sitarina's</h2>
            <p class="about__description">
              Hey, kenalan yuk! 💫
              Namaku Elsa Sitarina, owner dari Sitarina’s Mille Crepes yang sudah aku bangun sejak kelas 11 SMA, tepatnya pada awal tahun 2023. FYI, aku lahir di Bandung pada 8 Juli 2005, jadi sekarang umurku 20 tahun.
              Saat ini aku merupakan mahasiswi aktif semester 3 di Politeknik Pariwisata NHI Bandung, setelah lulus dari SMAN 25 Bandung pada tahun 2024.
              Selain fokus kuliah dan menjalankan usaha Sitarina’s Mille Crepes, aku juga bekerja menjadi part-timer di The Deli Bakes, dan dipercaya menjabat sebagai wakil ketua dari salah satu UKM di kampus.
              Saat ini aku sedang belajar menyeimbangkan antara tanggung jawab akademik, pekerjaan, dan passion, sambil tetap menjaga waktu untuk diri sendiri.
              Salam kenal, ya! 
            </p>
            <a href="#" class="button">Know More</a>
          </div>
          <img
            src="{{asset ('img/about sitarina.jpg')}}"
            alt="image"
            class="about__img"
          />
        </div>
      </section>

      <section class="favorite section" id="favorite">
    <h2 class="section__title">Our Products</h2>

    <div class="favorite__container container grid">
        @foreach($products as $product)
        <article class="favorite__card">
            <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" class="favorite__img">
            <div class="favorite__data">
                <h3 class="favorite__title">{{ $product->name }}</h3>
                <span class="favorite__subtitle">{{ $product->subtitle }}</span>
                <span class="favorite__price">Rp. {{ number_format($product->price) }}</span>
            </div>
            <a href="{{ route('pembayaran.show', $product->id) }}" class="favorite__button button">
              <i class="ri-add-line"></i>
            </a>
        </article>
        @endforeach
    </div>
</section>

      <div class="modal" id="modalChocolate">
        <div class="modal__content">
          <span class="close" onclick="closeModal('modalChocolate')">×</span>
          <img
            src="{{asset ('img/Chocolate.png')}}"
            alt="Chocolate Crepes"
            class="modal__img"
          />
          <h3 class="modal__title">Chocolate Mille Crepes</h3>
          <p class="modal__desc">
            Chocolate Mille Crepes yang lembut dan manis, terdiri dari lapisan
            crepes tipis dengan krim coklat berkualitas di setiap lapisannya.
            Nikmati rasa klasik yang tak pernah gagal.
          </p>
          <a href="pembayaran.html" class="button">Pesan Sekarang</a>
        </div>
      </div>

      <section class="visit section" id="visit">
        <div class="visit__container center-content">
          <img
            src="{{asset ('img/visit sitarina.jpg')}}"
            alt="visit img"
            class="visit__bg"
          />
          <div class="visit__shadow"></div>
          <div class="visit__content container">
            <div class="visit__data">
              <h2 class="visit__title">Visit Us</h2>
              <p class="visit__description">
                Discovery the best cake, we look forward to your visit.
              </p>
              <a href="#" class="button">See Location</a>
            </div>
          </div>
          <div class="maps">
            <iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3960.3955540500274!2d107.661915!3d-6.962578000000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNsKwNTcnNDUuMyJTIDEwN8KwMzknNDIuOSJF!5e0!3m2!1sen!2sid!4v1754223444769!5m2!1sen!2sid" 
                width="600" 
                height="450" 
                style="border:0;" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
          </div>
        </div>
      </section>
    </main>

    <footer class="footer">
      <div class="footer__container container grid">
        <div>
          <a href="#" class="footer__logo">Mille Crepes</a>
          <p class="footer__description">
            We make the best mille crepes <br />
            in the city
          </p>
        </div>
        <div class="footer__content grid">
          <div>
            <h3 class="footer__title">Address</h3>
            <ul class="footer__list">
              <li>
                <address class="footer__info">
                  Jl. Pasir Pogor Blok DD-5, Ciwastra <br />
                  Jawa Barat
                </address>
              </li>
              <li>
                <address class="footer__info">9AM - 8PM</address>
              </li>
            </ul>
          </div>
          <div>
            <h3 class="footer__title">Contact Me</h3>
            <ul class="footer__list">
              <li>
                <address class="footer__info">sitarinas@gmail.com</address>
              </li>
              <li>
                <address class="footer__info">+62 821-2003-5698</address>
              </li>
            </ul>
          </div>
          <div>
            <h3 class="footer__title">Follow Us</h3>
            <ul class="footer__social">
              <a
                href="https://www.facebook.com"
                target="_blank"
                rel="noopener noreferrer"
              >
                <i class="ri-facebook-circle-line"></i>
              </a>
              <a
                href="https://instagram.com"
                target="_blank"
                rel="noopener noreferrer"
              >
                <i class="ri-instagram-line"></i>
              </a>
              <a
                href="https://www.youtube.com"
                target="_blank"
                rel="noopener noreferrer"
              >
                <i class="ri-youtube-line"></i>
              </a>
            </ul>
          </div>
        </div>
      </div>
      <span class="footer__copy"> © All Rights Reserved </span>
    </footer>

    <a href="#" class="scrollup" id="scroll-up">
      <i class="ri-arrow-up-line"></i>
    </a>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>