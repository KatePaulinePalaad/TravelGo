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
    </div>
  </header>


  <main class="p-5">
    @if (Session::has("error"))
    <div class="d-flex justify-content-center w-100">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation h1"></i><strong> Error!</strong> {{session('error')}}
      </div>
    </div>
    @endif

    @if(Session::has('success'))
    <span class="d-flex justify-content-center align-items-center">
        <div class="alert alert-success d-flex align-items-center w-25" role="alert">
            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
            <div>
                <i class="fa-solid fa-circle-check"></i> <strong>Success!! </strong>{{session('success')}}
            </div>
        </div>
    </span>
    @endif

<section class="p-4 p-md-5 text-lg-start shadow-1-strong rounded d-flex">
  <div class="row d-flex justify-content-center">
    <h5 id="titleSignup">Reviews and Feedback</h5>
    @if(count($review) >= 1)
    @foreach ($review as $datas)
    <div class="col-4 d-flex mb-2">
      <div class="card shadow w-100">
        <div class="card-body m-3">
          <div class="row">
            <div class="col-lg-4 d-flex justify-content-center align-items-center mb-4 mb-lg-0">
              <img src="/storage/images/account.png"
                class="rounded-circle img-fluid shadow-1" alt="woman avatar" width="200" height="200" />
            </div>
            <div class="col-lg-8 d-flex flex-column justify-content-center align-items-center">
              <p class="text-muted fw-light mb-4 h-100 w-100 text-center">
               <strong class="fs-3">"</strong>{{$datas->Review}}.<strong>"</strong>
              </p>
              <div class="container justify-self-end">
                <span class="d-flex text-warning">
                    @if ($datas->stars == 1)
                        <i class="fa fa-star"></i>
                    @elseif($datas->stars == 2)
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    @elseif($datas->stars == 3)
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    @elseif($datas->stars == 4)
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    @else
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    @endif
                </span>
                <p class="fw-bold lead mb-2"><strong>{{$datas->name}} {{$datas->Lastname}}</strong></p>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
    @else
    @endif
  </div>
</section>

<div class="container d-flex justify-content-center align-items-center">
<div class="review w-75">
    <form action="{{route('review.post')}}" method="POST">
      @csrf
      <span class="w-25">
        <label for="stars">Stars:</label>
        <select name="stars" class="form-control p-2 fs-4">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
        </select>
      </span>

    <span>Leave a review</span>
    <div class="form-floating">
      <textarea class="form-control @error('review') is-ivalid @enderror fs-4" name="review" placeholder="Leave a review here" id="floatingTextarea2" style="height: 100px"
      maxlength="160"></textarea>
      <label for="floatingTextarea2">Review</label>
    </div>
    @error('review')
      <p class="text-danger">{{$message}}</p>
    @enderror
    <button type="submit" class="btn btn-primary w-100 mt-2">Submit</button>
  </form>
  </div>
</div>
</div>
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

