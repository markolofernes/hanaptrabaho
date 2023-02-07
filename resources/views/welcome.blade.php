@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="dsplyswitch">
            <center>
                <img class="img-fluid mainImgMxSz object-fit-contain border rounded shadow-lg mb-5 bg-body-tertiary"
                    src="\img\mainimg.webp" alt="pinyotrabaho">
            </center>
        </div>
        <div class="">
            <form action="">
                @csrf
                <input class="inputSearchBars form-select-lg form-select mb-3" list="JobLists" id="exampleDataList"
                    placeholder="Search for jobs...">
                <datalist id="JobLists">
                    <option value="Urgent Hiring">
                    <option value="Office Staff">
                    <option value="Work From Home">
                    <option value="Part Time">
                    <option value="Encoder">
                    <option value="Non Voice Work From Home">
                    <option value="Direct Hiring">
                    <option value="Part Time Work From Home">
                    <option value="Job Hiring">
                </datalist>

                <input class="inputSearchBars form-select-lg form-select mb-3" list="Places" id="exampleDataList"
                    placeholder="Where...">
                <datalist id="Places">
                    <option value="Manila">
                    <option value="Cavite">
                    <option value="Quezon City">
                    <option value="Las Piñas">
                    <option value="Bacoor, Cavite">
                    <option value="Muntin Lupa">
                    <option value="Alabang">
                    <option value="Parañaque City">
                    <option value="Taguig">
                    <option value="Makati">
                    <option value="Pasig City">
                    <option value="Pasay City">
                </datalist>
                {{-- <div class="row">
                    <div class="col">
                        <select class="form-select-lg form-select mb-3" aria-label=".form-select-sm">
                            <option selected>Date Posted</option>
                            <option value="24hrs">Last 24 Hours</option>
                            <option value="3days">3 days ago</option>
                            <option value="7days">1 week ago</option>
                            <option value="14days">2 weeks ago</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select-lg form-select mb-3" aria-label=".form-select-sm">
                            <option selected>Job Type</option>
                            <option value="Full-Time">Full Time</option>
                            <option value="Permanent">Permanent</option>
                            <option value="New-Grad">New-Grad</option>
                            <option value="Contract">Contract</option>
                            <option value="Internship">Internship</option>
                            <option value="Part-Time">Part Time</option>
                            <option value="Temporary">Temporary</option>
                        </select>
                    </div>
                </div> --}}
                <button class="btn btn-primary form-control">Search Jobs</button>
            </form><br>
            <center>
            @if ( Auth::user() !== null )
                @if (Auth::user()->accounttype == 'seeker')
                    <a href="/login">Upload your resume and post it!</a><br><br>
                @elseif (Auth::user()->accounttype == 'employer')
                    <a href="/login">Create a Job and Post it!!</a><br><br>
                @else   
                    <a href="/home">Click here to finish setup your account!</a><br><br>
                @endif
            @endif
            </center>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="col-1"></div>
        <div class="col-10 card p-3">
            <h3 class="text-center pt-2">Job feeds</h3>
            <div class="row">
                <div class="col-4 jobtableoverflow-y">
                    @foreach ($jobposts as $jobpost)
                        <div id="{{ $jobpost->id }}" class="card cursorpointer p-3 mx-1 my-5 shadow-lg" onclick="myFunction('/jobposts/{{ $jobpost->id }}')">
                        <h5>{{ $jobpost->jobtitle }}</h5>
                        <h6><i>{{ $jobpost->user->companyname }}</i></h6><hr class="hrsmall">
                            <p>{{ $jobpost->joblocation }}</p>
                            <p class="small">{{ $jobpost->jobtype }}</p><hr class="hrsmall">
                            <p class="small"> {{ $jobpost->salary }}</p>
                            <span class="capsule">LARAVEL PHP JAVASCRIPT HTML CSS SCSS REACT VITE LIVEWIRE</span>
                            {{-- <hr class="hrsmall"><a class="text-center" href="/jobposts/{{ $jobpost->id }}">View Job Description</a>  --}}
                        </div>
                    @endforeach

                </div>

                <div id="jobpost" class="col-8">
                    <div>
                    <iframe class="jobpanel shadow-lg" style="width:100%;height:100vh;" id="myFrame" src="/jobposts/2"></iframe>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-1"></div>
</div>


<script>
function myFunction(value) {
  document.getElementById("myFrame").src = value;
  }
</script>
@endsection
                    {{-- <div class="card p-3 mx-1 my-5 shadow-lg">
                        <h5>Full Stack Web Developer</h5>
                        <h6><i>Microsoft Corporation</i></h6><hr class="hrsmall">
                        <p class="small">Work from Home</p><hr class="hrsmall">
                        <span class="capsule">LARAVEL PHP JAVASCRIPT HTML CSS SCSS REACT VITE LIVEWIRE</span>
                    </div> --}}