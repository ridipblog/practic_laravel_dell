<div class="table-responsive">
    <table class="table table-hover table-striped align-middle mb-0">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>City</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $row)
                <tr>
                    <td>{{ $row->id }}</td>
                    <td>{{ $row->first_name }}</td>
                    <td>{{ $row->last_name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->phone }}</td>
                    <td>{{ $row->city }}</td>
                    <td>{{ $row->age }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center text-muted py-4">No records found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
<div class="d-flex justify-content-end mt-3">
    {!! $data->links('pagination::bootstrap-5') !!}
</div>
