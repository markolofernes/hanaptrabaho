@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <h1>Job Seeker's Dashboard</h1>
        @foreach ($accounts as $account)
            @if ($account->id == Auth::user()->id)
                <p>ID: {{ $account->id }}</p> 
                <p>Account Type: {{ $account->accounttype }}</p> 
                <p>Full Name: {{ $account->firstname }}
                    {{ $account->midname }} 
                    {{ $account->lastname }}</p>
                <p>Contact#: {{ $account->phone }}</p>
                <p>Address: {{ $account->address }}</p> 
                <p>Education: {{ $account->education }}  </p>
            @else
                
            @endif

        @endforeach

        {{-- <form class="form-signup bg-light border shadow rounded p-5">
        @csrf

            <h1 class="h3 mb-3 text-center">Please sign up as employee</h1>
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
            <label for="phone" class="sr-only">Phone</label>
            <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone No." required>
            <label for="address" class="sr-only">Address</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
            <label for="education" class="sr-only">Education</label>
            <input type="text" id="education" name="education" class="form-control" placeholder="Education" required>


            <button class="btn btn-lg btn-warning btn-block"  type="submit">Sign up</button>
        </form> --}}
    </div>
@endsection