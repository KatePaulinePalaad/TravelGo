@extends('welcome')

<div class="container-fluid">
    <div class="row flex-nowrap">
        <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-success">
            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
                <a href="/" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <div class="container p-3 d-flex justify-content-center align-items-center">
                        <h1 class="d-none d-sm-inline text-center" style="font-size: 20px;">
                            <i class="fa-solid fa-plane-departure"></i> TravelGo Admin</h1>
                    </div>
                </a>
                <ul class="nav nav-pills d-flex  flex-column justify-content-center align-items-center mb-sm-auto mb-0 w-100" id="menu">
                    <li class="nav-item">
                        <a href="{{route('admin.index')}}" class="nav-link align-middle px-0 text-white p-5 text-center">
                            <i class="fa-solid fa-map-location-dot"></i> <span class="ms-1 d-none d-sm-inline">Destination</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('admin.review')}}" class="nav-link align-middle px-0 text-white p-5 text-center">
                            <i class="fa-regular fa-comments"></i><span class="ms-1 d-none d-sm-inline">
                            Reviews
                            </span>
                        </a>
                    </li>
                </ul>
                <hr>
                <div class="dropdown pb-4">
                   <a href="{{route('logout')}}" class="text-light"><i class="fa-solid fa-door-open"></i> Logout</a>
                </div>
            </div>
        </div>
        <div class="col py-3 d-flex align-items-center justify-content-center">
            <div class="container d-flex flex-column justify-content-center align-items-center">
                <div class="card shadow p-3">
                    <div id="NewDestination">
                        Add New Destination
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.store')}}" class="d-flex flex-column" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputEmail1" class="form-label">Destination name</label>
                              <input type="text" class="form-control fs-3 p-3 @error('location') is-invalid @enderror" id="exampleInputEmail1" name="location" value="{{old('location')}}">
                              @error('location')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Price</label>
                              <input type="number" name="price" class="form-control fs-3 p-3 @error('price') is-invalid @enderror" id="exampleInputPassword1" value="{{old('price')}}">
                              @error('price')
                                <p class="text-danger">{{$message}}</p>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Image</label>
                              <input type="file" name="image" class="form-control fs-3 p-3 @error('image') is-invalid @enderror" id="exampleInputPassword1" value="{{old('image')}}">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Number of Days Stayed</label>
                              <input type="text" name="time" class="form-control fs-3 p-3 @error('time') is-invalid @enderror" id="exampleInputPassword1" value="{{old('time')}}">
                              @error('time')
                              <p class="text-danger">{{$message}}</p>
                            @enderror
                            </div>
                            <div class="form-floating mb-2">
                                <textarea class="form-control fs-3  @error('details') is-invalid @enderror" name="details" placeholder="Detailes" id="floatingTextarea2" style="height: 100px"></textarea>
                                <label for="floatingTextarea2">Details</label value="{{old('details')}}">
                                    @error('details')
                                    <p class="text-danger">{{$message}}</p>
                                  @enderror
                              </div>

                              <div class="form-check form-switch">
                                <input class="form-check-input" name="popular" type="checkbox" id="flexSwitchCheckDefault">
                                <label class="form-check-label"  for="flexSwitchCheckDefault"> Popular</label>
                              </div>

                              <div class="form-check form-switch">
                                 <input class="form-check-input"  name="upcoming" type="checkbox" id="flexSwitchCheckDefault">
                                 <label class="form-check-label"  for="flexSwitchCheckDefault">Upcoming</label>
                              </div>
                            <button type="submit" class="btn btn-primary w-100">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

