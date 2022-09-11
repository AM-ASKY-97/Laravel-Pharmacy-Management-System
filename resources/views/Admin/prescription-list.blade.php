@extends('Admin.home')

@section('bar')
    <span class="text-muted float-right">Home / New Prescription</span>
@endsection

@section('connect')
    <div class="card">
        <div class="card-header font-weight-bold">
            New Prescription
            <a href="{{ url('admin-dashboard') }}" class="btn btn-primary float-right">Back</a>
        </div>

        <div class="card-body">
            <table class="table">
                <thead class="table-dark">
                    <th scope="col">#</th>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Note</th>
                    <th scope="col">Delivery address</th>
                    <th scope="col">Action</th>
                </thead>

                @php $i=1 @endphp

                <tbody>
                    <tr>
                        @forelse ($precription as $row)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $row->user->name }}</td>
                        <td>{{ $row->note }}</td>
                        <td>{{ $row->address }}</td>
                        <td>
                            @if ($row->confirm == 0)
                                <a href="{{ url('uploaded-prescriptions') }}/{{ $row->id }}"
                                    class="btn btn-primary">Add medications</a>
                                    <img src="https://sahussaintu.files.wordpress.com/2018/04/newgif5.gif" alt="" width="60" height="60">
                            @elseif($row->confirm == 1)
                                <a href="{{ url('uploaded-prescriptions') }}/{{ $row->id }}"
                                    class="btn btn-success">Update Medications</a>
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
