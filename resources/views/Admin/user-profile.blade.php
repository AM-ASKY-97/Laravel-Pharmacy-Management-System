@extends('Admin.home')

@section('bar')
    <span class="float-right text-muted">Home / Profile</span>
@endsection

@section('connect')
    <div class="card p-3">
        <div class="card-header text-center font-weight-bold">
            <i class="fa fa-pencil-square-o mr-2" aria-hidden="true"></i> Edit Profile
        </div>

        <div class="card-body">
            <form action="{{ url('admin-profile-update') }}/{{ Auth()->user()->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-9">
                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="">Name</label>
                                    <input type="text" name="name" id=""
                                        class="form-control @error('name') is-invalid @enderror"
                                        value="{{ Auth()->user()->name }}">
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Email</label>
                                    <input type="text" id="" class="form-control"
                                        value="{{ Auth()->user()->email }}" disabled>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="">Mobile No</label>
                                    <input type="text" name="mobile" id=""
                                        class="form-control @error('mobile') is-invalid @enderror"
                                        value="{{ Auth::user()->mobile_no }}">
                                    @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="">Date Of Birth</label>
                                    <input type="date" name="dob" id=""
                                        class="form-control @error('dob') is-invalid @enderror"
                                        value="{{ Auth::user()->dob }}">
                                    @error('dob')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" id=""
                                class="form-control @error('address') is-invalid @enderror"
                                value="{{ Auth()->user()->address }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-3 my-auto">
                        <div class="text-center">
                            <ul class="navbar-nav">

                                <li class="nav-item dropdown">

                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        @if (Auth()->user()->logo)
                                            <img src="{{ asset(Auth::user()->logo) }}" alt="User Logo" width="150"
                                                height="150" loading="lazy" class="d-inine-block rounded-circle">
                                        @else
                                            <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt=""
                                                width="150" height="150" loading="lazy" class="d-inine-block">
                                        @endif
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <input type="file" name="logo">
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary px-5">Update</button>
            </form>
        </div>
    </div>
@endsection

