@extends('Admin.home')

@section('bar')
    <span class="text-muted float-right">Home / Dashboard</span>
@endsection

@section('connect')
    <div class="row">
        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">{{$newMedicines}}</h5>
                    <p class="card-text">New Prescription</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="{{ url('precribtion-list') }}" class="text-white"><span>More Info <i
                                class="fa fa-arrow-circle-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">{{$customers}}</h5>
                    <p class="card-text">Total Customers</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="{{url('customers')}}" class="text-white"><span>More Info <i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">{{$accept}}</h5>
                    <p class="card-text">Accept Prescription</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="{{url('accept')}}" class="text-white"><span>More Info <i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </div>


    <div class="row mt-lg-3">
        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">{{$pending}}</h5>
                    <p class="card-text">Pending Prescription</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="{{ url('pending') }}" class="text-dark"><span>More Info <i
                                class="fa fa-arrow-circle-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4 mb-3 mb-lg-0">
            <div class="card text-white" style="background-color: #e67e22">
                <div class="card-body">
                    <h5 class="card-title">{{$reject}}</h5>
                    <p class="card-text">Reject Prescription</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="{{url('reject')}}" class="text-white"><span>More Info <i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>

        <div class="col-12 col-lg-4">
            <div class="card text-white" style="background-color: #2980b9">
                <div class="card-body">
                    <h5 class="card-title">{{$medicines}}</h5>
                    <p class="card-text">Total Medicines</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="{{url('medicine-list')}}" class="text-white"><span>More Info <i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </div>
@endsection

