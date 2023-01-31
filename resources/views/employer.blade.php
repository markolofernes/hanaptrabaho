@extends('layouts.app')

@section('content')
    <div class="container p-5">
        <form class="form-signup bg-light border shadow rounded p-5">
        @csrf

            <h1 class="h3 mb-3 text-center">Please sign up as employer</h1>
            <label for="name" class="sr-only">Name</label>
            <input type="text" id="name" name="name" class="form-control" placeholder="Name" required>
            <label for="phone" class="sr-only">Phone</label>
            <input type="number" id="phone" name="phone" class="form-control" placeholder="Phone No." required>
            <label for="address" class="sr-only">Address</label>
            <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>
            <label for="education" class="sr-only">Education</label>
            <input type="text" id="education" name="education" class="form-control" placeholder="Education" required>


            <button class="btn btn-lg btn-warning btn-block"  type="submit">Sign up</button>
        </form>
    </div>
@endsection