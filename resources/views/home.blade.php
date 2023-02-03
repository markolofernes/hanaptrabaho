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
{{-- STARTER ----------------------------------------------------------------------------------------------------- --}}
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

{{-- STARTER ----------------------------------------------------------------------------------------------------- --}}
                    @elseif( Auth::user()->accounttype == 'seeker')
{{-- Jobseeker ----------------------------------------------------------------------------------------------------- --}}
                        
                        @if( Auth::user()->firstname == 'unsigned')

                        <form class="form-signup border shadow p-3" method="POST" action="/createaccount">
                            @csrf
                            <h2 class="text-center">Jobseeker</h2><hr>
                            <h5 class="h5 mb-3 text-center">Please complete the following fields</h5>
                            <div class="row">
                                <input type="hidden" id="accounttype" name="accounttype" id="seeker" value="seeker">
                                <div class="col-5">
                                    <label for="firstname" class="sr-only mt-3">First Name</label>
                                    <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Juan" required>
                                </div>
                                <div class="col-2">
                                    <label for="midname" class="sr-only mt-3">M.I.</label>
                                    <input type="text "maxlength="4" size="4" id="midname" name="midname" class="form-control" placeholder="B" required>
                                </div>
                                <div class="col-5">
                                    <label for="lastname" class="sr-only mt-3">Last Name</label>
                                    <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Dela Cruz" required>
                                </div>
                            </div>
                             
                            <label for="phone" class="sr-only mt-3">Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone No" required>

                            <label for="address" class="sr-only mt-3">Address</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>

                            <label for="education" class="sr-only mt-3">Education</label>
                            <input type="text" id="education" name="education" class="form-control" placeholder="Education" required>

                            <input type="hidden" id="companyname" name="companyname" class="form-control"  value="unsigned" placeholder="companyname" required>

                            <button class="btn btn-lg btn-primary btn-block mt-4 form-control"  type="submit">Confirm</button>
                        </form>
                        @else
                            <h5> Hi! {{ Auth::user()->firstname }} </h5>
                        @endif
{{-- Jobseeker ----------------------------------------------------------------------------------------------------- --}}
                     @elseif( Auth::user()->accounttype == 'employer')  
{{-- Employer ----------------------------------------------------------------------------------------------------- --}}
                        @if ( Auth::user()->companyname == 'unsigned')  

                        <form class="form-signup border shadow p-3" method="POST" action="/createaccount">
                        @csrf
                            <h2 class="text-center">Employer</h2><hr>
                            <h5 class="h5 mb-3 text-center">Please complete the following fields</h5>
                                <div class="row">
                                    <input type="hidden" id="employer" name="accounttype" id="employer" value="employer">
                                    <div class="col-5">
                                        <label for="firstname" class="sr-only mt-3">First Name</label>
                                        <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Juan" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="midname" class="sr-only mt-3">M.I.</label>
                                        <input type="text "maxlength="4" size="4" id="midname" name="midname" class="form-control" placeholder="B" required>
                                    </div>
                                    <div class="col-5">
                                        <label for="lastname" class="sr-only mt-3">Last Name</label>
                                        <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Dela Cruz" required>
                                    </div>
                                </div>
                            <label for="companyname" class="sr-only mt-3">Company Role</label>
                            <input class="form-control" list="companyrole" placeholder="Company Position">
                            <datalist id="companyrole">
                                <option value="Owner">
                                <option value="CEO">
                                <option value="Assistant">
                                <option value="Secretary">
                                <option value="Staff">
                            </datalist>  
                            <input type="hidden" id="education" name="education" class="form-control"  value="unsigned" placeholder="Education" required>

                            <label for="companyname" class="sr-only mt-3">Company Name</label>
                            <input type="text" id="companyname" name="companyname" class="form-control" placeholder="companyname" required>

                            <label for="phone" class="sr-only mt-3">Company Phone</label>
                            <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone No" required>

                            <label for="address" class="sr-only mt-3">Company Address</label>
                            <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>

                            <button class="btn btn-lg btn-primary btn-block mt-4 form-control"  type="submit">Confirm</button>
                        </form>                  
                        @else
                             <h5> Hi! {{ Auth::user()->firstname }} from {{ Auth::user()->companyname }}
                            </h5>
                        @endif
{{-- Employer ----------------------------------------------------------------------------------------------------- --}} 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



                    {{-- <div class="d-grid">
                        <a class="d-grid" style="text-decoration:none;" href="{{ route('seek') }}"><button
                                class="btn btn-warning" type="submit">Job Seeker</button></a>
                        <a class="d-grid" style="text-decoration:none;" href="{{ route('employer') }}"><button
                                class="btn btn-warning" type="submit">Employer</button></a>
                    </div> --}}