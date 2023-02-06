@extends('layouts.app')
@section('content')
@if ( Auth::user() == null )
    @php
    header('Location:/');
    exit;
    @endphp
@else
<div class="container">
    <div class="row align-items-center">
        <div class="col hideOn800px">
            <img class="img-fluid d-block w-100" src="\img\{{ Auth::user()->accounttype }}.webp">
        </div>
        <div class="col align-items-center"><br>
            <div class="col-10 card shadow-lg m-5 p-3 py-5">
                <h3 class="text-center">Welcome!</h3><br>
                @php  $name = Auth::user()->firstname @endphp
                @if ($name !== 'unsigned')
                    <h5>Hi!, {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5> 
                @endif
                <h6>{{ Auth::user()->email }}</h6>
            </div>

        </div>
    </div>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-12">
            <div class="card">
                <div class="card-body shadow">
                    @if ( Auth::user()->accounttype == 'unsigned')
                    <h6>Ready for the Next Step?</h6>
                    <p class="text-muted">Create an account for tools to help you</p>
                   
                    {{-- <h5>Registered email: {{ Auth::user()->email }}</h5> --}}
                {{-- STARTER ------------------------------------------------ --}}
                        <form class="form-signup border shadow p-5" method="POST" action="/createaccount">
                        @csrf
                            <h1 class="h3 mb-3 text-center">Sign up as</h1>
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
                {{-- STARTER ------------------------------------------------ --}}
                     @elseif( Auth::user()->accounttype == 'seeker')
                {{-- Jobseeker ------------------------------------------------ --}}
                        <x-seeker.seeker />
                {{-- Jobseeker ------------------------------------------------ --}}
                     @elseif( Auth::user()->accounttype == 'employer')  
                {{-- Employer ------------------------------------------------ --}}
                        <x-employer.employer />
                {{-- Employer ------------------------------------------------ --}} 
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection