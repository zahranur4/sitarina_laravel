<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://unpkg.com/scrollreveal"></script>
    

    <!--=============== FAVICON ===============-->
    <link
      rel="shortcut icon"
      href="{{asset('img/favicon.png')}}"
      type="image/x-icon"
    />

    <!-- Swiper CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!--=============== REMIXICONS ===============-->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/3.7.0/remixicon.css"
    />

    @vite(['resources/css/styles.css', 'resources/js/main.js'])

  <title>Sitarina's</title>
  </head>
  <body>
    <!--==================== HEADER ====================-->
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
              <a href="#favorite" class="nav__link">Product</a>
            </li>
            <li class="nav__item">
              <a href="#visit" class="nav__link">Location</a>
            </li>
            <li class="nav__item">
            <div class="ms-auto">
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
            </div>
        </div>
        </li>
          </ul>

          <!-- Close button -->
          <div class="nav__close" id="nav-close">
            <i class="ri-close-line"></i>
          </div>
        </div>

        <!-- Toggle button -->
        <div class="nav__toggle" id="nav-toggle">
          <i class="ri-menu-fill"></i>
        </div>
      </nav>
    </header>

    <!--==================== MAIN ====================-->
    <main class="main">
      <!--==================== HOME ====================-->
      <section class="home section" id="home">
    <div class="swiper homeSwiper">
      <div class="swiper-wrapper">

        <!-- Slide 1 -->
        <div class="swiper-slide">
          <div class="home__slide">
            <img src="{{asset('img/slider 1.png')}}" alt="Slide 1" />
          </div>
        </div>

        <!-- Slide 2 -->
        <div class="swiper-slide">
          <div class="home__slide">
            <img src="{{asset('img/slider 2.png')}}" alt="Slide 2" />
          </div>
        </div>

        <!-- Slide 3 -->
        <div class="swiper-slide">
          <div class="home__slide">
            <img src="{{asset('img/slider 3.png')}}" alt="Slide 3" />
          </div>
        </div>

        <div class="swiper-slide">
          <div class="home__slide">
            <img src="{{asset('img/slider 4.png')}}" alt="Slide 4" /> 
          </div>
        </div>

      </div>

      <!-- Navigasi -->
      <div class="swiper-pagination"></div>
      <div class="swiper-button-next"></div>
      <div class="swiper-button-prev"></div>
    </div>
  </section>

  <!-- ================= Script ================= -->
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Swiper Initialization -->
  <script>
    var swiper = new Swiper(".homeSwiper", {
      loop: true,
      autoplay: {
        delay: 4000,
        disableOnInteraction: false,
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>

      <!--==================== NEWS ====================-->
      <section class="new section" id="new">
        <h2 class="section__title">Classic Product</h2>

        <div class="new__container container grid">
          <div class="new__content grid">
            <article class="new__card">
              <div class="new__data">
                <h2 class="new__title">Cream and Cheese</h2>
                <p class="new__description">
                  Crepe lembut yang dilapis krim cokelat yang creamy banget. Rasa cokelatnya rich, lembut, dan lumer di mulut.
                </p>
              </div>

              <img
                src="{{asset('img/CNC.png')}}"              
                alt= "Image New Bread"
                class="new__img"
              />
            </article>

            <article class="new__card">
              <div class="new__data">
                <h2 class="new__title">PBnC</h2>
                <p class="new__description">
                  Crepe yang ringan dan creamy, dilapis krim keju yang lembut. Rasanya pas banget—manisnya dapet, gurihnya juga dapet.
                </p>
              </div>

              <img
                src="{{asset('img/PBnC.png')}}"               
                alt="Image New Bread"
                class="new__img"
              />
            </article>

            <article class="new__card">
              <div class="new__data">
                <h2 class="new__title">Strawberry</h2>
                <p class="new__description">
                  Lapisan crepe yang lembut, diisi krim stroberi yang ringan, dipadukan dengan sentuhan rasa buah asli.
                </p>
              </div>

              <img
                src="{{asset('img/Stro.png')}}"               
                alt="Image New Bread"
                class="new__img"
              />
            </article>
          </div>

          <a href="#" class="new__button button">See More Mille Crepes</a>
        </div>
      </section>

      <!--==================== ABOUT ====================-->
      <section class="about section" id="about">
        <div class="about__container container grid">
          <div class="about__data">
            <h2 class="section__title">About Sitarina's</h2>

            <p class="about__description">
              Sitarina’s adalah brand dessert yang lahir dari cinta buat bikin mille crepes yang cantik, handmade, dan pastinya enak banget. Buat kami, dessert yang enak itu datang dari bahan-bahan yang berkualitas dan dibuat dengan penuh perhatian. Makanya, setiap mille crepes di Sitarina’s disusun dengan telaten, pakai krim terbaik, dan pastinya penuh rasa.
              Mille crepes kita itu terbuat dari banyak lapisan crepe yang super tipis dan lembut, diselingi krim yang halus dan creamy di setiap lapisannya. Di Sitarina’s, kita nggak cuma jual kue, tapi juga bagi-bagi momen spesial. Mau buat ulang tahun, traktiran, atau cuma pengen ngemil manis, mille crepes kita selalu siap nemenin. Kita selalu komit buat kasih kualitas terbaik, rasa yang konsisten, dan bikin pelanggan happy—karena buat kita, dessert itu harus bisa bikin hidup jadi sedikit lebih magic.
            </p>

            <a href="#" class="button">Know More</a>
          </div>

          <img
            src="{{asset('img/about sitarina.jpg')}}"
            alt="image"
            class="about__img"
          />
        </div>
      </section>

      <!--==================== FAVORITES ====================-->
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

    <!--==================== MODAL ====================-->
      <div class="modal" id="modalChocolate">
      <div class="modal__content">
      <span class="close" onclick="closeModal('modalChocolate')">&times;</span>
      <img src="{{asset('img/Chocolate.png')}}" alt="Chocolate Crepes" class="modal__img" />
      <h3 class="modal__title">Chocolate Mille Crepes</h3>
      <p class="modal__desc">
      Chocolate Mille Crepes yang lembut dan manis, terdiri dari lapisan crepes tipis dengan krim coklat berkualitas di setiap lapisannya. Nikmati rasa klasik yang tak pernah gagal.
      </p>
      <a href="pembayaran.html" class="button">Pesan Sekarang</a>
      </div>
      </div>

      <!--==================== VISIT ====================-->
      <section class="visit section" id="visit">
        <div class="visit__container">
          <img
            src="{{asset('img/visit sitarina.jpg')}}"
            alt="visit img"
            class="visit__bg"
          />
          <div class="visit__shadow"></div>

          <div class="visit__content container grid">
            <div class="visit__data">
              <h2 class="visit__title">Visit Us</h2>

              <p class="visit__description">
                Discovery the best cake, we look forward to your visit.
              </p>

              <a href="#" class="button">See Location</a>
            </div>
      <!-- Maps -->
  <div class="maps">
    <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63352.75907340143!2d107.6667561681617!3d-6.94286438223869!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e91ce8103fb9%3A0x3402de08b13a79a!2sCiwastra%2C%20Kec.%20Buahbatu%2C%20Kota%20Bandung%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1719711273403!5m2!1sid!2sid" 
      width="100%" 
      height="450" 
      style="border:0;" 
      allowfullscreen="" 
      loading="lazy" 
      referrerpolicy="no-referrer-when-downgrade">
    </iframe>
  </div>
</section>
    </main>


    

    <!--==================== FOOTER ====================-->
    <footer class="footer">
      <div class="footer__container container grid">
         <div>
            <a href="#" class="footer__logo">Mille Crepes</a>
            <p class="footer__description">
               We make the best mille crepes <br> in the city
            </p>
         </div>

         <div class="footer__content grid">
            <div>
               <h3 class="footer__title">Address</h3>

               <ul class="footer__list">
                  <li>
                     <address class="footer__info">Ciwastra, Bandung <br> Jawa Barat</address>
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
                     <address class="footer__info">+62 857 2488 7713</address>
                  </li>
               </ul>
            </div>
            <div>
               <h3 class="footer__title">Follow Us</h3>

               <ul class="footer__social">
                  <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                     <i class="ri-facebook-circle-line"></i>
                  </a>
                  <a href="https://instagram.com" target="_blank" rel="noopener noreferrer">
                     <i class="ri-instagram-line"></i>
                  </a>
                  <a href="https://www.youtube.com" target="_blank" rel="noopener noreferrer">
                     <i class="ri-youtube-line"></i>
                  </a>
               </ul>
            </div>
         </div>
      </div>

      <span class="footer__copy">
         &#169; All Rights Reserved
      </span>
    </footer>

    <!--========== SCROLL UP ==========-->
    <a href="#" class="scrollup" id="scroll-up">
      <i class="ri-arrow-up-line"></i>
    </a>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>