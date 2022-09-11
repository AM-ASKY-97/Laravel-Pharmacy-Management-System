@extends('user.home')

@section('bar')
    <span class="text-muted float-right">Home / Precription History</span>
@endsection

@section('connect')
    <div class="card">
        <div class="card-header">
            <span class="font-weight-bold">Precription History</span>
            <a href="{{url('user-dashboard')}}" class="btn btn-primary float-right">Back</a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Note</th>
                        <th>Delivery Address</th>
                        <th colspan="5" class="text-center">Images</th>
                    </tr>
                </thead>

                @php $i=1; @endphp

                <tbody>
                    @forelse ($user as $row)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $row->note }}</td>
                            <td>{{ $row->address }}</td>
                            <td class="text-center"><a href="{{ asset($row->image1) }}" target="_blank"><img
                                        src="{{ asset($row->image1) }}" alt="" width="50px" height="50px"
                                        class="rounded-circle"></a>
                            </td>
                            <td class="text-center"><a href="{{ asset($row->image2) }}" target="_blank"><img
                                        src="{{ asset($row->image2) }}" alt="" width="50px" height="50px"
                                        class="rounded-circle"></a>
                            </td>
                            <td class="text-center"><a href="{{ asset($row->image3) }}" target="_blank"><img
                                        src="{{ asset($row->image3) }}" alt="" width="50px" height="50px"
                                        class="rounded-circle"></a>
                            </td>
                            <td class="text-center"><a href="{{ asset($row->image4) }}" target="_blank"><img
                                        src="{{ asset($row->image4) }}" alt="" width="50px" height="50px"
                                        class="rounded-circle"></a>
                            </td>
                            <td class="text-center"><a href="{{ asset($row->image5) }}" target="_blank"><img
                                        src="{{ asset($row->image5) }}" alt="" width="50px" height="50px"
                                        class="rounded-circle"></a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center text-danger" colspan="8">No Data Record</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>
        </div>
    </div>
@endsection

