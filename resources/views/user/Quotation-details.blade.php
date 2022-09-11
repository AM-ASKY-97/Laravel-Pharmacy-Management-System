@extends('user.home')

@section('bar')
    <span class="text-muted float-right">Home / Quotation Details</span>
@endsection

@section('connect')
    <div class="card">
        <div class="card-header">
            Quotation Details
            <a href="{{url('prepared-quotation')}}" class="btn btn-primary float-right">Back</a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>#</th>
                        <th>Drugs</th>
                        <th>Quanity</th>
                        <th>Amount</th>
                    </tr>
                </thead>

                <tbody>
                    @php $i=1; @endphp
                    @php $total=0; @endphp
                    @forelse ($data as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->Medicine->drugs }}</td>
                            <td>{{ $row->Medicine->amount }} x {{ $row->quanity }}</td>
                            <td class="text-right">{{ $row->amount }}</td>
                            @php $total+= $row->amount; @endphp
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-danger text-center">No Data Records</td>
                        </tr>
                    @endforelse

                    <tr>
                        <td colspan="3" class="text-right font-weight-bold">
                            Total
                        </td>
                        <td class="text-right font-weight-bold">
                            {{ $total }}.00
                        </td>

                    </tr>
                </tbody>
            </table>

            <form action="{{url('status-update')}}" method="POST">
                @csrf
                <div class="form-group row">
                    <label for="inputEmail3" class="col-3 col-form-label font-weight-bold">User can accept/reject the quotation</label>
                    <div class="col-2">
                        <select class="form-control drug_name @error('status') is-invalid @enderror"
                            name="status">
                            <option value="" selected disabled>-Select quotation-</option>
                            <option value="1">Accept</option>
                            <option value="2">Reject</option>
                        </select>
                        @error('status')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>

                    <div>
                        <input type="text" value="{{$row->order_id}}" name="id" hidden>
                    </div>
                    <div class="col-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
