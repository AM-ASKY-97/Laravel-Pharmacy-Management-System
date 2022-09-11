@extends('user.home')

@section('bar')
    <span class="text-muted float-right">Home / Prepared Quotation</span>
@endsection

@section('connect')
    <div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Prepared Quotation</span>
            <a href="{{url('user-dashboard')}}" class="btn btn-primary float-right">Back</a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th>Item Orders</th>
                        <th>Note</th>
                        <th>Total Amount</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @php $i=1; @endphp
                    @php $total=0; @endphp
                    @forelse ($data as $row)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$row->note}}</td>
                            <td>{{$row->amount}}</td>
                            <td>
                                @if($row->status == 0)
                                <div class="btn btn-warning rounded-pill px-4">
                                    Pending
                                </div>
                                @elseif ($row->status == 1)
                                <div class="btn btn-success rounded-pill px-4">
                                    Accept
                                </div>
                                @elseif ($row->status == 2)
                                <div class="btn btn-danger rounded-pill px-4">
                                    Reject
                                </div>
                                @endif
                            </td>
                            <td>
                                @if($row->status == 0)
                                <a href="{{url('quoation-details')}}/{{$row->order_id}}" class="btn btn-primary">View</a>
                                @endif
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-danger text-center">No Data Records</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
