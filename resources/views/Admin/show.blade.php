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
            <div class="container d-flex flex-column">
                <div class="container d-flex">
                    <div class="row">
                        <div class="card shadow">
                            <div class="card-body">
                                <form action="{{route('admin.update',$places)}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <img class="img-thumbnail" src="/storage/images/{{$places->image}}" alt="Card image cap">
                                        <input type="file" class="form-control mt-3 fs-3 p-3" value="{{$places->image}}" name="image">
                                    </div>
                                    <div class="col">
                                          <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Location</label>
                                            <input type="text" class="form-control fs-3 p-3" value="{{$places->location}}" name="location">
                                          </div>
                                          <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Price</label>
                                            <input type="number" class="form-control fs-3 p-3" value="{{$places->price}}" name="price">
                                          </div>
                                          <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">Days</label>
                                            <input type="text" class="form-control fs-3 p-3" value="{{$places->time}}" name="time">
                                          </div>
                                          <div class="mb-3">
                                            <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
                                            <textarea class="form-control fs-3 p-3" id="exampleFormControlTextarea1" rows="3" name="detailes">{{$places->detailes}}</textarea>
                                          </div>
                                          <button type="submit" class="btn btn-primary w-100">Submit</button>
                                    </div>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

