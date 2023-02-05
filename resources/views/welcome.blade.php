@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="dsplyswitch">
            <center>
                <img class="img-fluid mainImgMxSz object-fit-contain border rounded shadow-lg mb-5 bg-body-tertiary"
                    src="mainimg.webp" alt="pinyotrabaho">
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
                <a href="#">Upload your resume and post it!</a><br><br>
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
                        <div class="card p-3 mx-1 my-5 shadow-lg">
                        <h5>{{ $jobpost->jobtitle }}</h5>
                        <h6><i>{{ $jobpost->user->companyname }}</i></h6><hr class="hrsmall">
                            <p>{{ $jobpost->joblocation }}</p>
                            <p class="small">{{ $jobpost->jobtype }}</p><hr class="hrsmall">
                            <p class="small"> {{ $jobpost->salary }}</p>
                            <span class="capsule">LARAVEL PHP JAVASCRIPT HTML CSS SCSS REACT VITE LIVEWIRE</span>
                            <hr class="hrsmall"><a href="#">Job Description-></a> 
                        </div>
                    @endforeach

                </div>

                <div class="col-8">
                    @foreach ($jobposts as $jobpost)
                        @if ($jobpost->id == 2)
                            <div id="jobDescPanel" class="jobpanel shadow-lg">
                                <img class="employerlogo" src="https://logodownload.org/wp-content/uploads/2021/08/microsoft-teams-logo-2.png" alt="">
                                <h4>{{ $jobpost->jobtitle }}</h4>
                                <h6>{{ $jobpost->user->companyname }}</h6> 
                                <p>{{ $jobpost->joblocation }}</p>
                                <button class="btn btn-warning mx-2">Apply Now</button><button class="btn btn-warning mx-2">🖤 Save</button>
                                <hr>
                                <div class="jobpaneldesc tableoverflow-y">
                                    <h5> Job details</h5>
                                    <h6>💼 {{ $jobpost->jobtype }}</h6>
                                    <h6>💵 {{ $jobpost->salary }}</h6>
                                    <hr>
                                    <h5>Qualifications</h5>
                                    <p>WordPress: 3 years (Required)</p> 
                                    <hr>
                                    {!! $jobpost->jobdescription !!}
                                    <i>Posted: {{ $jobpost->created_at->diffforhumans() }}</i>
                                    </small>
                                </div>
                            </div>                    
                        @endif
                     @endforeach
                </div>
            </div>
        </div>
    <div class="col-1"></div>
</div>
@endsection
                    {{-- <div class="card p-3 mx-1 my-5 shadow-lg">
                        <h5>Full Stack Web Developer</h5>
                        <h6><i>Microsoft Corporation</i></h6><hr class="hrsmall">
                        <p class="small">Work from Home</p><hr class="hrsmall">
                        <span class="capsule">LARAVEL PHP JAVASCRIPT HTML CSS SCSS REACT VITE LIVEWIRE</span>
                    </div> --}}