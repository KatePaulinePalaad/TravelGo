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
    <p class="section-subtitle">{{$destination->location}}</p>
    @if (Session::has("error"))
    <div class="d-flex justify-content-center w-100">
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="fa-solid fa-triangle-exclamation h1"></i><strong> Error!</strong> {{session('error')}}
      </div>
    </div>
    @endif
    @if (Session::has("EmailSuccess"))
      <div class="d-flex justify-content-center w-100">
        <div class="alert alert-success w-25" role="alert">
          <h4 class="alert-heading">Booked Success!</h4>
          <p>Thank you for choosing TravelGo. We send you the offical receipt via email</p>
        </div>
      </div>
    @endif
    <div class="container d-flex">
      <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col">
                    <img src="/storage/images/{{$destination->image}}" class="img-fluid" alt="...">
                    <span class="card-badge">
                        <ion-icon name="time-outline"></ion-icon>

                        <time datetime="P12D">{{$destination->time}}</time>
                      </span>
                </div>
                <div class="col">
                    <div class="p-2 d-flex flex-column justify-content-center align-items-center">
                        <h3>{{$destination->location}}</h3>
                        <h6 class="badge badge-primary">Primary</h6>
                        <p>{{$destination->detailes}}</p>
                        <span class=" mb-3 align-self-start">Detailes:</span>
                        <ul class="align-self-start">
                            <li style="border-bottom: 1px solid rgba(0,0,0,0.3);"><small><i class="fa-solid fa-tag text-success"></i> Price:  {{$destination->price}}</small></li>
                            <li style="border-bottom: 1px solid rgba(0,0,0,0.3);"><small><i class="fa-regular fa-calendar text-success"></i> No. of Days Stay:  {{$destination->time}}</small></li>
                            <li style="border-bottom: 1px solid rgba(0,0,0,0.3);"><small><i class="fa-solid fa-location-dot text-success"></i> Location:  {{$destination->location}}</small></li>
                        </ul>

                <span class="display-6 mb-3">Top reviews:</span>
                <div class="container d-flex align-self-end">
                     <div class="card p-3 align-self-start">

                                <blockquote class="blockquote">
                                    <p class="mb-3">"This is legit pa sa tunay sasdasasdasd"</p>
                                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                    </div>
                    <div class="card p-3 align-self-start">

                                <blockquote class="blockquote">
                                    <p class="mb-3">"This is legit pa sa tunay sasdasasdasd"</p>
                                    <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
                                </blockquote>
                    </div>
                </div>

                    </div>
                </div>
            </div>
        </div>
      </div>

      <div class="card container-sm w-50 d-flex flex-column border border-success" style="background-color:#FCC603;">

          <span class="d-flex align-content-center justify-content-center">
            <h2 class="text-light p-2">Book your Travel</h2>
          </span>
            <form method="POST" action="{{route('book',$destination->id)}}">
                @csrf
            <div class="form-row text-light fw-bold">

                <div class="form-group p-2">
                  <label for="inputEmail4 text-light"><i class="fa-solid fa-location-dot text-light"></i> From:</label>
                  <input type="text" name="from" class="form-control p-3 h6 fw-bold text-warning @error('from') is-invalid @enderror" id="inputEmail4" placeholder="From"
                  value="{{old('from')}}">
                  @error('from')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group p-2">
                  <label for="inputEmail4 text-light"><i class="fa-solid fa-location-arrow text-light"></i> To:</label>
                  <input type="text" name="to" class="form-control p-3 h6 fw-bold text-warning" id="inputEmail4" placeholder="To" value="{{$destination->location}}"
                  readonly>
                  @error('to')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group p-2">
                  <label for="inputEmail4 text-light"><i class="fa-solid fa-building-circle-check text-light"></i> Check In</label>
                  <input type="date" name="checkin" class="form-control p-3 h6 fw-bold text-warning @error('checkin') is-invalid @enderror" id="inputEmail4" placeholder="Email"
                  value="{{old('date')}}">
                  @error('checkin')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>

                <div class="form-group p-2">
                  <label for="inputEmail4 text-light"><i class="fa-solid fa-plane-departure text-light"></i> Check Out</label>
                  <input type="date" name="checkout" class="form-control p-3 h6 fw-bold text-warning @error('checkout') is-invalid @enderror" id="inputEmail4" placeholder="Email"
                  value="{{old('date')}}">
                  @error('checkout')
                    <p class="text-danger">{{$message}}</p>
                  @enderror
                </div>
                <div class="d-flex">
                  <div class="form-group p-2">
                    <label for="inputEmail4 text-light"><i class="fa-solid fa-person"></i> Adult</label>
                    <input type="number" name="adult" class="form-control p-3 h6 fw-bold text-warning @error('adult') is-invalid @enderror" id="inputEmail4" placeholder="adult"
                    value="{{old('adult')}}">
                    @error('adult')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                  <div class="form-group p-2">
                    <label for="inputEmail4 text-light"><i class="fa-solid fa-child"></i> Children</label>
                    <input type="number" name="children" class="form-control p-3 h6 fw-bold text-warning @error('children') is-invalid @enderror" id="inputEmail4" placeholder="children"
                    value="{{old('children')}}">
                    @error('checkout')
                      <p class="text-danger">{{$message}}</p>
                    @enderror
                  </div>
                </div>
            </div>
                <button type="submit" class="btn btn-primary w-100  fw-bold"><i class="fa-solid fa-bookmark"></i> Book now</button>
          </form>
      </div>
    </div>

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
