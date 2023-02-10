<div>
    <h1 class="fw-bold">User Management
        <a href="{{ route('generate-pdf') }}" target="_blank" class="px-3 btn btn-secondary btn-sm float-end me-5">⬇ Download User's list as PDF File</a>
    </h1>
    <input wire:model="search" type="text" placeholder="Search users..."/>
    <table class="table">
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>