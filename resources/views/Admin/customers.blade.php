@extends('Admin.home')

@section('bar')
    <span class="text-muted float-right">Home / Customrs</span>
@endsection

@section('connect')
    <div class="card">
        <div class="card-header font-weight-bold">
            Customers
            <a href="{{url('admin-dashboard')}}" class="btn btn-primary float-right">Back</a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Mobile No</th>
                    <th scope="col">Role</th>
                </thead>

                @php $i=1 @endphp

                <tbody>
                    <tr>
                        @forelse ($user as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->address }}</td>
                        <td>{{ $row->mobile_no }}</td>
                        <td>
                            @if ($row->role == '1')
                                <div class="btn btn-success rounded-pill px-5">
                                    Admin
                                </div>
                            @else
                                <div class="btn btn-info rounded-pill px-5">
                                    customer
                                </div>
                            @endif

                        </td>
                    </tr>
                @empty
                    <td colspan="5" class="text-danger text-center font-weight-bold">No Data Record</td>
                    @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection

