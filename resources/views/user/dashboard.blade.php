@extends('user.home')

@section('bar')
    <span class="float-right">Home / Dashboard</span>
@endsection

@section('connect')
    <div class="row">
        <div class="col">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">{{ $totalPrecription }}</h5>
                    <p class="card-text">Total Prescription</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="{{ url('precribtion-history') }}" class="text-white"><span>More Info <i
                                class="fa fa-arrow-circle-right" aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5 class="card-title">{{ $accept }}</h5>
                    <p class="card-text">Accept Prescription</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="" class="text-white"><span>More Info <i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">{{ $reject }}</h5>
                    <p class="card-text">Reject Prescription</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="" class="text-white"><span>More Info <i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-4">
            <div class="card bg-warning text-dark">
                <div class="card-body">
                    <h5 class="card-title">{{ $pending }}</h5>
                    <p class="card-text">Prepared Quotation</p>
                </div>

                <div class="card-footer text-center font-weight-bold">
                    <a href="{{url('prepared-quotation')}}" class="text-dark"><span>More Info <i class="fa fa-arrow-circle-right"
                                aria-hidden="true"></i></span></a>
                </div>
            </div>
        </div>
    </div>
@endsection

