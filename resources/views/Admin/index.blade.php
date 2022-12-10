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
                @if(Session::has('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        <i class="fa-solid fa-circle-check"></i> <strong>Success!! </strong>{{session('success')}}
                    </div>
                </div>
                @endif
                <div class="align-self-end">
                    <a href="{{route('admin.create')}}" class="btn btn-success btn-lg mb-2"> <i class="fa-solid fa-plus"></i> Add Destination</a>
                </div>
                <div class="container d-flex">
                    <div class="row">
                        @foreach ($destination as $places)
                        <div class="col-4 mb-2">
                            <div class="card h-25">
                                <img class="card-img-top" src="/storage/images/{{$places->image}}" alt="Card image cap">
                                <div class="card-body d-flex flex-column p-5">
                                    <span class="d-flex align-self-end">
                                        <a href="{{route('admin.show',$places->id)}}"><i class="fa-solid fa-pen-to-square text-success pe-2"></i></a>
                                        <form action="{{route('admin.destroy',$places->id)}}" method="POST">
                                            @csrf @method('DELETE')
                                            <button type="submit"><i class="fa-solid fa-trash text-success"></i></button>
                                        </form>
                                    </span>
                                    <small>{{$places->location}}</small>
                                    <span class="d-flex p-2">
                                         <small class="badge rounded-pill bg-success mr-2">P{{$places->price}}</small>
                                         <small class="badge rounded-pill bg-success ">P{{$places->time}}</small>
                                    </span>
                                    <div class="card-text">{{$places->detailes}}</div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

