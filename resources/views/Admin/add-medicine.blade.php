@extends('Admin.home')

@section('bar')
    <span class="text-muted float-right">Home / New Medicine</span>
@endsection

@section('connect')
    <div class="row">
        <div class="col-12 col-lg-6 mx-lg-auto">
            <div class="card">
                <div class="card-header">
                    New Medicine
                </div>

                <div class="card-body">
                    <form action="store-medicine" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="">Drugs Name</label>
                            <input type="text" name="drugName" id=""
                                class="form-control @error('drugName') is-invalid @enderror">
                            @error('drugName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Price</label>
                            <input type="number" name="price" id=""
                                class="form-control @error('price') is-invalid @enderror">
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="">Discount</label>
                            <input type="number" name="discount" id=""
                                class="form-control @error('price') is-invalid @enderror">
                            @error('discount')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
