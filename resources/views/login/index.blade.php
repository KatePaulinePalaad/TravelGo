@extends('welcome')
 <!--============ HEADER ============--->
 <header class="header" data-header>
    <div class="container">
      <a href="#">
        <h1 class="logo">TRAVELGO</h1>
      </a>

      <button
        class="nav-toggle-btn"
        data-nav-toggle-btn
        aria-label="Toggle Menu"
      >
        <ion-icon name="menu-outline" class="open"></ion-icon>
        <ion-icon name="close-outline" class="close"></ion-icon>
      </button>

      <nav class="navbar">
        <ul class="navbar-list">
          <li>
            <a href={{route('home')}} class="navbar-link">Home</a>
          </li>

          <li>
            <a href="{{route('about')}}" class="navbar-link">About Us</a>
          </li>

          <li>
            <a href={{route('destination')}} class="navbar-link">Destinations</a>
          </li>

          <li>
            <a href="{{route('review.index')}}" class="navbar-link">Reviews</a>
          </li>

          <span class="d-flex">
            <a href="#" class="btn btn-secondary me-2" data-toggle="modal" data-target="#exampleModalCenter">Sign up</a>
            @if(Auth::check())
                <span class="align-self-end justify-self-end">
                    <a href="{{route('logout')}}" class="btn btn-danger align-self-end justify-self-end"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
                </span>
            @else
                <a href="{{route('login')}}" class="btn btn-secondary">Login</a>
            @endif
          </span>

        </ul>
      </nav>

      <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex align-items-center justify-content-center">
            <h5 class="modal-title" id="titleSignup">Signup and Start Your Travel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body d-flex justify-content-center alig-items-center">

                <form method="POST" action="{{route('SignUp')}}">
                    @csrf
                    <span class="d-flex">
                        <div class="mb-3 p-2">
                            <label for="exampleInputEmail1" class="form-label"><i class="fa-regular fa-user text-warning "></i>   Name</label>
                            <input type="text" name="name" class="form-control p-2 fs-4 @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 p-2">
                            <label for="exampleInputEmail1" class="form-label"><i class="fa-regular fa-user text-warning "></i> Last Name</label>
                            <input type="text" name="lastname" class="form-control p-2 fs-4 @error('lastname') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{old('lastname')}}">
                            @error('lastname')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    </span>


                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-envelope text-warning"></i> Email address</label>
                      <input type="email" name="email" class="form-control p-2 fs-4 @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
                      value="{{old('email')}}">
                      @error('email')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-user-lock text-warning"></i>   Password</label>
                      <input type="password" name="password" class="form-control p-2 fs-4 @error('password') is-invalid @enderror" id="exampleInputPassword1"
                      value="{{old('password')}}">
                      @error('password')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-lock text-warning"></i> Confirmed Password</label>
                      <input type="password" name="password_confirmation" class="form-control p-2 fs-4 @error('password_confirmed') is-invalid @enderror" id="exampleInputPassword1"
                      value="{{old('password_confirmed')}}">
                      @error('password_confirmed')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                      @enderror
                    </div>

            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Sign up</button>
        </form>
            </div>
        </div>
        </div>
    </div>
    </div>
  </header>


  <main>
    <article>
      <!--
      - #HERO
    -->

      <section
        class="section hero"
        style="
          background-image: url('/storage/images/hero-bg-bottom.png')
            url('/storage/images/hero-bg-top.png');
        "
      >
        <div class="container">
          <img
            src="/storage/images/shape-1.png"
            width="61"
            height="61"
            alt="Vector Shape"
            class="shape shape-1"
          />

          <img
            src="/storage/images/shape-2.png"
            width="56"
            height="74"
            alt="Vector Shape"
            class="shape shape-2"
          />

          <img
            src="/storage/images/shape-3.png"
            width="57"
            height="72"
            alt="Vector Shape"
            class="shape shape-3"
          />

          <div class="hero-content">
            <p class="section-subtitle">Explore Your Travel</p>

            <h2 class="hero-title">Trusted Travel Agency</h2>

            <p class="hero-text">
              I travel not to go anywhere, but to go. I travel for travel's
              sake the great affair is to move.
            </p>

            <div class="btn-group">
              <a href="#" class="btn btn-primary">Contact Us</a>

              <a href="#" class="btn btn-outline">Learn More</a>
            </div>
          </div>

          <figure class="hero-banner">
            <img
              src="/storage/images/hero.png"
              width="686"
              height="812"
              loading="lazy"
              alt="hero banner"
              class="w-100"
            />
          </figure>
        </div>
      </section>

      <!--============ DESTINATION ============--->

      <section class="section destination">
        <div class="container">
          <p class="section-subtitle">Destinations</p>

          <h2 class="h2 section-title">Choose Your Place</h2>

          <ul class="destination-list">

            <li class="w-40">
              <a href="{{route('destination.show',13)}}" class="destination-card">
                <figure class="card-banner">
                  <img
                    src="/storage/images/destination-1.jpg"
                    width="1140"
                    height="1100"
                    loading="lazy"
                    alt="Malé, Maldives"
                    class="img-cover"
                  />
                </figure>

                <div class="card-content">
                  <p class="card-subtitle">Cagayan De Oro</p>

                  <h3 class="h3 card-title">Camiguin</h3>
                </div>
              </a>
            </li>

            <li class="w-50">
              <a href="{{route('destination.show',14)}}" class="destination-card">
                <figure class="card-banner">
                  <img
                    src="/storage/images/destination-2.jpg"
                    width="1140"
                    height="1100"
                    loading="lazy"
                    alt="Bangkok, Thailand"
                    class="img-cover"
                  />
                </figure>

                <div class="card-content">
                  <p class="card-subtitle">Island in Malay, Aklan</p>

                  <h3 class="h3 card-title">Boracay</h3>
                </div>
              </a>
            </li>

            <li>
              <a href="{{route('destination.show',15)}}" class="destination-card">
                <figure class="card-banner">
                  <img
                    src="/storage/images/destination-3.jpg"
                    width="1110"
                    height="480"
                    loading="lazy"
                    alt="Kuala Lumpur, Malaysia"
                    class="img-cover"
                  />
                </figure>

                <div class="card-content">
                  <p class="card-subtitle">Baler,Aurora</p>

                  <h3 class="h3 card-title">Dicasalarin Cove</h3>
                </div>
              </a>
            </li>

            <li>
              <a href="{{route('destination.show',16)}}" class="destination-card">
                <figure class="card-banner">
                  <img
                    src="/storage/images/destination-4.jpg"
                    width="1110"
                    height="480"
                    loading="lazy"
                    alt="Kathmandu, Nepal"
                    class="img-cover"
                  />
                </figure>

                <div class="card-content">
                  <p class="card-subtitle">Ilocos Sur</p>

                  <h3 class="h3 card-title">Vigan City</h3>
                </div>
              </a>
            </li>

            <li>
              <a href="{{route('destination.show',3)}}" class="destination-card">
                <figure class="card-banner">
                  <img
                    src="/storage/images/destination-5.jpg"
                    width="1110"
                    height="480"
                    loading="lazy"
                    alt="Jakarta, Indonesia"
                    class="img-cover"
                  />
                </figure>

                <div class="card-content">
                  <p class="card-subtitle">Palawan</p>

                  <h3 class="h3 card-title">El Nido</h3>
                </div>
              </a>
            </li>
          </ul>
        </div>
      </section>

      <!--
      - #POPULAR
    -->

      <section class="section popular">
        <div class="container">
          <p class="section-subtitle">Featured Tours</p>

          <h2 class="h2 section-title">Most Popular Tours</h2>
          <div class="d-flex justify-content-end align-items-end">
            {{$destinationPopular->links()}}
            </div>
          <ul class="popular-list">
            @foreach($destinationPopular as $places)
            <li>
            <div class="popular-card">
                <figure class="card-banner">
                  <a href={{route('destination.show',$places->id)}}>
                    <img
                      src="/storage/images/{{$places->image}}"
                      width="740"
                      height="518"
                      loading="lazy"
                      alt=""
                      class="img-cover"
                    />
                  </a>

                  <span class="card-badge">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="P12D">{{$places->time}}</time>
                  </span>
                </figure>

                <div class="card-content">
                  <div class="card-wrapper">
                    <div class="card-price">From {{$places->price}} php</div>

                    <div class="card-rating">
                        <span class="badge rounded-pill">Popular</span>
                    </div>
                  </div>

                  <h3 class="card-title">
                    <a href="#"
                      >{{$places->detailes}}</a
                    >
                  </h3>

                  <address class="card-location">
                    {{$places->location}}
                  </address>
                </div>
              </div>
            </li>
            @endforeach
          </ul>
        </div>
      </section>

      <!--
      - #ABOUT
    -->

      <section class="section about" style="margin-top:10%;">
        <div class="container">
          <div class="about-content">
            <p class="section-subtitle">About Us</p>

            <h2 class="h2 section-title">
              Explore all tour of the world with us.
            </h2>

            <p class="about-text">
              Lorem Ipsum available, but the majority have suffered alteration
              in some form, by injected humour, or randomised words which
              don't look even slightly believable.
            </p>

            <ul class="about-list">
              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="compass"></ion-icon>
                </div>

                <div class="about-item-content">
                  <h3 class="h3 about-item-title">Destination guide</h3>

                  <p class="about-item-text">
                    Lorem Ipsum available, but the majority have suffered
                    alteration in some.
                  </p>
                </div>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="briefcase"></ion-icon>
                </div>

                <div class="about-item-content">
                  <h3 class="h3 about-item-title">Friendly price</h3>

                  <p class="about-item-text">
                    Lorem Ipsum available, but the majority have suffered
                    alteration in some.
                  </p>
                </div>
              </li>

              <li class="about-item">
                <div class="about-item-icon">
                  <ion-icon name="umbrella"></ion-icon>
                </div>

                <div class="about-item-content">
                  <h3 class="h3 about-item-title">Reliable tour</h3>

                  <p class="about-item-text">
                    Lorem Ipsum available, but the majority have suffered
                    alteration in some.
                  </p>
                </div>
              </li>
            </ul>

            <a href="#" class="btn btn-primary">Booking Now</a>
          </div>

          <figure class="about-banner">
            <img
              src="/storage/images/about-banner.png"
              width="756"
              height="842"
              loading="lazy"
              alt=""
              class="w-100"
            />
          </figure>
        </div>
      </section>

      <!--
      - #BLOG
    -->

      <section class="section blog" style="margin-bottom:10%;">
        <div class="container">
          <p class="section-subtitle">From The Blog Post</p>

          <h2 class="h2 section-title">New Destination Package</h2>

          <ul class="blog-list">
            <li>
              <div class="blog-card">
                <figure class="card-banner">
                  <a href="#">
                    <img
                      src="/storage/images/popular-1.jpg"
                      width="740"
                      height="518"
                      loading="lazy"
                      alt="A good traveler has no fixed plans and is not intent on arriving."
                      class="img-cover"
                    />
                  </a>

                  <span class="card-badge">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="12-04">04 Dec</time>
                  </span>
                </figure>

                <div class="card-content">
                  <div class="card-wrapper">
                    <div class="author-wrapper">
                      <figure class="author-avatar">
                        <img
                          src="/storage/images/author-avatar.png"
                          width="30"
                          height="30"
                          alt="Jony bristow"
                        />
                      </figure>

                      <div>
                        <a href="#" class="author-name">Raniel Undan</a>

                        <p class="author-title">Admin</p>
                      </div>
                    </div>

                    <time class="publish-time" datetime="10:30"
                      >10:30 AM</time
                    >
                  </div>

                  <h3 class="card-title">
                    <a href="#">
                      A good traveler has no fixed plans and is not intent on
                      arriving.
                    </a>
                  </h3>

                  <a href="#" class="btn-link">
                    <span>Read More</span>

                    <ion-icon
                      name="arrow-forward-outline"
                      aria-hidden="true"
                    ></ion-icon>
                  </a>
                </div>
              </div>
            </li>

            <li>
              <div class="blog-card">
                <figure class="card-banner">
                  <a href="#">
                    <img
                      src="/storage/images/blog-2.jpg"
                      width="740"
                      height="518"
                      loading="lazy"
                      alt="A good traveler has no fixed plans and is not intent on arriving."
                      class="img-cover"
                    />
                  </a>

                  <span class="card-badge">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="12-04">04 Dec</time>
                  </span>
                </figure>

                <div class="card-content">
                  <div class="card-wrapper">
                    <div class="author-wrapper">
                      <figure class="author-avatar">
                        <img
                          src="./assets/images/author-avatar.png"
                          width="30"
                          height="30"
                          alt=""
                        />
                      </figure>

                      <div>
                        <a href="#" class="author-name">Dave Tadeo</a>

                        <p class="author-title">Admin</p>
                      </div>
                    </div>

                    <time class="publish-time" datetime="10:30"
                      >10:30 AM</time
                    >
                  </div>

                  <h3 class="card-title">
                    <a href="#">
                      A good traveler has no fixed plans and is not intent on
                      arriving.
                    </a>
                  </h3>

                  <a href="#" class="btn-link">
                    <span>Read More</span>

                    <ion-icon
                      name="arrow-forward-outline"
                      aria-hidden="true"
                    ></ion-icon>
                  </a>
                </div>
              </div>
            </li>

            <li>
              <div class="blog-card">
                <figure class="card-banner">
                  <a href="#">
                    <img
                      src="/storage/images/blog-3.jpg"
                      width="740"
                      height="518"
                      loading="lazy"
                      alt="A good traveler has no fixed plans and is not intent on arriving."
                      class="img-cover"
                    />
                  </a>

                  <span class="card-badge">
                    <ion-icon name="time-outline"></ion-icon>

                    <time datetime="12-04">04 Dec</time>
                  </span>
                </figure>

                <div class="card-content">
                  <div class="card-wrapper">
                    <div class="author-wrapper">
                      <figure class="author-avatar">
                        <img
                          src="/storage/images/author-avatar.png"
                          width="30"
                          height="30"
                          alt=""
                        />
                      </figure>

                      <div>
                        <a href="#" class="author-name">Kate Palaad</a>

                        <p class="author-title">Admin</p>
                      </div>
                    </div>

                    <time class="publish-time" datetime="10:30"
                      >10:30 AM</time
                    >
                  </div>

                  <h3 class="card-title">
                    <a href="#">
                      A good traveler has no fixed plans and is not intent on
                      arriving.
                    </a>
                  </h3>

                  <a href="#" class="btn-link">
                    <span>Read More</span>

                    <ion-icon
                      name="arrow-forward-outline"
                      aria-hidden="true"
                    ></ion-icon>
                  </a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </section>
    </article>
  </main>

  <!--
  - #FOOTER
-->

  <footer
    class="footer"
    style="background-image: url('/storage/images/footer-bg.png')"
  >
    <div class="container">
      <div class="footer-top">
        <ul class="footer-list">
          <li>
            <p class="footer-list-title">CONTACT US</p>
          </li>

          <li>
            <a href="#" class="footer-link">Phone: 0964-314</a>
          </li>

          <li>
            <a href="#" class="footer-link">E-mail: travelgo@gmail.com</a>
          </li>

          <li>
            <a href="#" class="footer-link">Admin: RanielUndan@gmail.com</a>
          </li>

          <li>
            <a href="#" class="footer-link">DaveTadeo@gmail.com</a>
          </li>

          <li>
            <a href="#" class="footer-link">PalaadKate@gmail.com</a>
          </li>
        </ul>

        <ul class="footer-list">
          <li>
            <p class="footer-list-title">Location</p>
          </li>

          <li>
            <a href="#" class="footer-link"
              >944 Balikbayan Street<br />Trip mo lang, 44883</a
            >
          </li>

          <li>
            <a href="#" class="footer-link">209 Camptinio Cabanatuan City</a>
          </li>

          <li>
            <a href="#" class="footer-link">Bical, Science City of Munoz</a>
          </li>

          <li>
            <a href="#" class="footer-link"
              >Publacion South, Science City of Munoz</a
            >
          </li>

          <li>
            <a href="#" class="footer-link">Food & Drink</a>
          </li>
        </ul>

        <ul class="footer-list">
          <li>
            <p class="footer-list-title">Quick links</p>
          </li>

          <li>
            <a href="#" class="footer-link">About</a>
          </li>

          <li>
            <a href="#" class="footer-link">Contact</a>
          </li>

          <li>
            <a href="#" class="footer-link">Tours</a>
          </li>

          <li>
            <a href="#" class="footer-link">Booking</a>
          </li>

          <li>
            <a href="#" class="footer-link">Terms & Conditions</a>
          </li>
        </ul>

        <div class="footer-list">
          <p class="footer-list-title">Get a newsletter</p>

          <p class="newsletter-text">
            For the latest deals and tips, travel no further than your inbox
          </p>

          <form action="" class="newsletter-form">
            <input
              type="email"
              name="email"
              required
              placeholder="Email address"
              class="newsletter-input"
            />

            <button type="submit" class="btn btn-primary">Subscribe</button>
          </form>
        </div>
      </div>

      <div class="footer-bottom">
        <a href="#" class="logo">Tourest</a>

        <p class="copyright">
          &copy; 2022 <a href="#" class="copyright-link">codewithsadee</a>.
          All Rights Reserved
        </p>

        <ul class="social-list">
          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-instagram"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-google"></ion-icon>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </footer>

  <!--
  - #GO TO TOP
-->

  <a href="#top" class="go-top" data-go-top aria-label="Go To Top">
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>

  <!--
  - custom js link
-->
  <script src="./assets/js/script.js"></script>

  <!--
  - ionicon link
-->
  <script
    type="module"
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"
  ></script>
  <script
    nomodule
    src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"
  ></script>

