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
                <a href="#">👤Edit Profile</a>
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
                        {{-- STARTER ------------------------------------------------ --}}
                        <x-initialize />
                        {{-- STARTER ------------------------------------------------ --}}
                     @elseif( Auth::user()->accounttype == 'seeker')
                        {{-- Jobseeker ------------------------------------------------ --}}
                        <x-seeker.seeker />
                        {{-- Jobseeker ------------------------------------------------ --}}
                     @elseif( Auth::user()->accounttype == 'employer')  
                        {{-- Employer ------------------------------------------------ --}}
                        <x-employer.employer />
                        {{-- Employer ------------------------------------------------ --}} 
                     @elseif( Auth::user()->accounttype == 'admin')  
                        {{-- Employer ------------------------------------------------ --}}
                        <x-admin.admin />
                        {{-- Employer ------------------------------------------------ --}} 
                     @else
                        @php header('Location:/');exit; @endphp
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection