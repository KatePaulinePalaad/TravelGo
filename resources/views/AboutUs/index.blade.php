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
    </div>

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
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
                            value="{{old('name')}}">
                            @error('name')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        </div>

                        <div class="mb-3 p-2">
                            <label for="exampleInputEmail1" class="form-label"><i class="fa-regular fa-user text-warning "></i> Last Name</label>
                            <input type="text" name="lastname" class="form-control @error('lastname') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
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
                      <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"
                      value="{{old('email')}}">
                      @error('email')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label class="form-label"><i class="fa-solid fa-user-lock text-warning"></i>   Password</label>
                      <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1"
                      value="{{old('password')}}">
                      @error('password')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                      @enderror
                    </div>

                    <div class="mb-3">
                      <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-lock text-warning"></i> Confirmed Password</label>
                      <input type="password" name="password_confirmation" class="form-control @error('password_confirmed') is-invalid @enderror" id="exampleInputPassword1"
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
  </header>

  <!--
      - #POPULAR
    -->

  <section class="section popular">
    <div class="container d-flex">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">Who We Are</h1>
              <p class="lead fs-3">TravelGo is a “Travel is the main thing you purchase that makes you more extravagant”. We, at ‘Organization Name’, swear by this and put stock in satisfying travel dreams that make you perpetually rich constantly.

                We have been moving excellent encounters for a considerable length of time through our cutting-edge planned occasion bundles and other fundamental travel administrations. We rouse our clients to carry on with a rich life, brimming with extraordinary travel encounters.

                Through our exceptionally curated occasion bundles, we need to take you on an adventure where you personally enjoy the stunning magnificence of America and far-off terrains. We need you to observe sensational scenes that are a long way past your creative ability.</p>
            </div>
        </div>

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">About Our Agency</h1>
              <p class="lead fs-3">To guarantee that you have a satisfying occasion and healthy encounters, all our vacation administrations are available to your no matter what. On your universal occasion, we guarantee that you are very much outfitted with outside trade (Forex Cards, Currency Notes), visa, and travel protection.
                We are the pioneers of outside trade in America and booking forex online is basic and advantageous with us.
                Our online visa administrations are exceptional and make the bulky procedure of booking visas a cake stroll for clients. We likewise give exceptional visa, forex, and travel protection and outside settlement administrations for understudies voyaging abroad for study.</p>
            </div>
        </div>
    </div>
  </section>

  <!--
  - #FOOTER
-->

  <footer
    class="footer"
    style="background-image: url('/storage/images/footer-bg.png'); margin-top:11%;"
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
