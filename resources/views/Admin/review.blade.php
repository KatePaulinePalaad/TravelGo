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
        <div class="col py-3 shadow">
            <div class="container d-flex flex-column">
                @if(Session::has('success'))
                <div class="alert alert-success d-flex align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                    <div>
                        <i class="fa-solid fa-circle-check"></i> <strong>Success!! </strong>{{session('success')}}
                    </div>
                </div>
                @endif

                @if (Session::has("error"))
                <div class="d-flex justify-content-center w-100">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-triangle-exclamation h1"></i><strong> Denied!</strong> {{session('error')}}
                  </div>
                </div>
                @endif

                <div class="card d-flex align-items-center justify-content-center">
                    <div id="NewDestination">
                        Reviews
                    </div>
                    <div class="container">
                        <span class="d-flex justify-content-between p-5">
                            <table class="table table-hover table-striped" style="table-layout:fixed;" >
                                <thead>
                                    <th>User</th>
                                    <th>Feedback</th>
                                    <th>Action</th>
                                </thead>
                                <tbody>
                                    @foreach ($review as $datas)
                                    <form action="{{route('admin.action',$datas->id)}}" method="POST">
                                        @csrf
                                        <tr>
                                            <td>
                                                {{$datas->name}} {{$datas->Lastname}}
                                            </td>
                                            <td>
                                                <span class="p-2 rounded">
                                                    "{{$datas->Review}}"
                                                </span>
                                            </td>
                                            <td>
                                                <button type="submit" name="accept" class="btn btn-primary" value="accept">Accept</button>
                                                <button type="submit" name="denied" class="btn btn-primary" value="denied">Denied</button>
                                            </td>
                                        </tr>
                                    </form>
                                    @endforeach
                                </tbody>
                            </table>
                            </div>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

