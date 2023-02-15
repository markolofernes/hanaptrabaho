<div>
    <div class="row">
        <div class="col-1"></div>
        <div class="col-10"><hr>
            <h3 class="fw-bold">User Management
                <a href="{{ route('generate-users-report-pdf') }}" target="_blank" class="px-3 btn btn-secondary btn-sm float-end me-5">⬇ Download User's list</a>
            </h3>
            <input wire:model="search" class="form-control" type="text" placeholder="Search users..."/><hr>
            <table class="table">
                <thead>
                    <tr>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th colspan="2">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->firstname }}</td>
                        <td>{{ $user->lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>
                        <td><a href="#">❌</a></td>
                        <td><a href="{{ route('actions.editprofile', $user->id) }}">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-1"></div>
    </div>
</div>