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
                <a href="{{ route('editprofile', Auth::user()->id) }}">👤Edit Profile</a>
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
                        {{-- <x-seeker.seeker /> --}}
                        @if( Auth::user()->firstname == 'unsigned')
                            <form class="form-signup border shadow p-3" method="POST" action="{{ route('createaccount')}}">
                                @csrf
                                <h2 class="text-center">Jobseeker</h2><hr>
                                <h5 class="h5 mb-3 text-center">Please complete the following fields</h5>
                                <div class="row">
                                    <input type="hidden" id="accounttype" name="accounttype" id="seeker" value="seeker">
                                    <div class="col-5">
                                        <label for="firstname" class="sr-only mt-3">First Name</label>
                                        <input type="text" id="firstname" name="firstname" class="form-control text-black" placeholder="Juan" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="midname" class="sr-only mt-3">M.I.</label>
                                        <input type="text "maxlength="4" size="4" id="midname" name="midname" class="form-control text-black" placeholder="B" required>
                                    </div>
                                    <div class="col-5">
                                        <label for="lastname" class="sr-only mt-3">Last Name</label>
                                        <input type="text" id="lastname" name="lastname" class="form-control text-black" placeholder="Dela Cruz" required>
                                    </div>
                                </div>
                                    
                                <label for="phone" class="sr-only mt-3">Phone</label>
                                <input type="text" id="phone" name="phone" class="form-control text-black" placeholder="Phone No" required>

                                <label for="address" class="sr-only mt-3">Address</label>
                                <input type="text" id="address" name="address" class="form-control text-black" placeholder="Address" required>

                                <label for="education" class="sr-only mt-3">Education</label>
                                <input type="text" id="education" name="education" class="form-control text-black" placeholder="Education" required>

                                <input type="hidden" id="companyname" name="companyname" class="form-control text-black"  value="unsigned" placeholder="companyname" required>

                                <button class="btn btn-lg btn-primary btn-block mt-4 form-control"  type="submit">Confirm</button>
                            </form>
                            @else
                                {{-- <x-seeker.SeekDashboard /> --}}
                            <h6>Jobseeker's Dasboard</h6><br>
                            <hr class="small">
                            <div class="text-center">
                                <h5>Resume</h5>
                                <small style="text-decoration: none;color:orange;" {{ $noResume = false }}>
                                    @forelse ($resumes as $resume)
                                        @if ($resume->user_id == Auth::user()->id)
                                            @if ( $noResume == false )
                                                <a {{ $noResume = true }} href="{{ route('actions.editresume', $resume->id) }}">📝Edit </a> 
                                                | 
                                                <a type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">❌ Delete </a> 
                                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Resume</h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="display6">Click "Confirmed Delete" to delete your resume</div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a type="button" class="btn btn-danger px-3 rounded btn-sm" href="{{ route('actions.deleteresume', $resume->id) }}">Confirm Delete</a>
                                                        </div>
                                                        </div>
                                                    </div>
                                                    </div>
                                                | 
                                                <a href="#">🖨 Print </a> 
                                                | 
                                                <a href="#">🔽 Download </a> 
                                            @endif 
                                        @elseif(!isset(Auth::user()->resumes->user_id))
                                            @if ($noResume == false)
                                                <a {{ $noResume = true }} href="{{ route('createresume', $resume->id) }}">📄Create (PDF)</a> 
                                            @endif
                                        @endif
                                    @empty
                                        <a href="/createresume">Create your resume here!</a>
                                    @endforelse
                                </small>
                                <hr class="small">
                            </div>
                            @endif
                        {{-- Jobseeker ------------------------------------------------ --}}
                     @elseif( Auth::user()->accounttype == 'employer')  
                        {{-- Employer ------------------------------------------------ --}}
                        <x-employer.employer />
                        {{-- Employer ------------------------------------------------ --}} 
                     @elseif( Auth::user()->accounttype == 'admin')  
                        {{-- Employer ------------------------------------------------ --}}
                        <h1>Welcome Admin</h1>
                        {{-- <x-admin.admin /> --}}
                        <livewire:search-users />
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