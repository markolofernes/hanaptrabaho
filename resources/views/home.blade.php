@extends('layouts.app')
@section('content')
<div class="container">
    <h3 class="text-center text-white">Welcome!</h3>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-4">
            <img class="img-fluid d-block w-100"
                src="business-people.webp">
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-body shadow">
                    @if ( Auth::user()->accounttype == 'unsigned')
                    <h6>Ready for the Next Step?</h6>
                    <p class="text-muted">Create an account for tools to help you</p>
                    <h5>Registered email: {{ Auth::user()->email }}</h5>
                        <form class="form-signup border shadow p-5" method="POST" action="/createaccount">
                        @csrf
                            <h1 class="h3 mb-3 text-center">Please sign up as</h1>
                            <center>
                                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                    <input type="radio" class="btn-check" name="accounttype" id="employer"  value="employer" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="employer">Employer</label>

                                    <input type="radio" class="btn-check" name="accounttype" disabled id="none" autocomplete="off" required>
                                    <label class="btn btn-outline-primary" for="none"></label>

                                    <input type="radio" class="btn-check" name="accounttype" id="seeker"  value="seeker" autocomplete="off">
                                    <label class="btn btn-outline-primary" for="seeker">Job Seeker</label>
                                </div></center><br>
                                <input type="hidden" id="firstname" name="firstname" value="unsigned">
                                <input type="hidden" id="midname" name="midname" value="unsigned">
                                <input type="hidden" id="lastname" name="lastname" value="unsigned">
                                <input type="hidden" id="phone" name="phone" value="unsigned">
                                <input type="hidden" id="address" name="address" value="unsigned">
                                <input type="hidden" id="education" name="education" value="unsigned">
                                <input type="hidden" id="companyname" name="companyname" value="unsigned">
                            <button class="btn btn-lg btn-primary btn-block mt-4 form-control"  type="submit">Next</button>
                        </form>
                    @elseif( Auth::user()->accounttype == 'seeker')
                        <x-seeker.seeker />
                     @elseif( Auth::user()->accounttype == 'employer')  
                        <x-employer.employer />
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection