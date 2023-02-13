@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="dsplyswitch">
            {{-- <center>
                <img class="img-fluid mainImgMxSz object-fit-contain border rounded shadow-lg mb-5 bg-body-tertiary"
                    src="\img\mainimg.webp" alt="pinyotrabaho">
            </center> --}}
        </div>
        <div class="">

            <form action="">
                @csrf
                <input action="{{ route('jobs.search') }}" method="GET" class="inputSearchBars form-select form-select-lg mb-3 text-black" list="JobLists" id="exampleDataList"
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

                <input class="inputSearchBars form-select-lg form-select mb-3 text-black" list="Places" id="exampleDataList"
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

                <button type="submit" class="btn btn-secondary form-control">Search for Jobs</button>
            </form><br>
            <center {{ $noResume = true }}>
            @if ( Auth::user() !== null )
                @if (Auth::user()->accounttype == 'seeker')
                    @if (isset( Auth::user()->resumes->user_id ))
                        @if ($noResume == true)
                            <a href="/home">Updated your resume</a><br><br>
                            {{  $noResume = false }}
                        @elseif($noResume == true)
                            <a href="/createresume">Create your resume here!</a><br><br>
                            {{  $noResume = false }}
                        @endif 
                    @elseif($noResume == true)
                            <a href="/createresume">Create your resume here!</a><br><br>
                            {{ $noResume = false }}
                    @endif
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
        <div style="margin:0 auto; min-width:500px; max-width:1400px" class="col-10 card px-3 pb-3">
            <h3 class="text-center pt-2">Job feeds</h3>
            <div class="row">
                <div class="col-4 jobtableoverflow-y">
                    @foreach ($users as $user)
                        @forelse ($jobposts as $jobpost)
                            @if ($user->id == $jobpost->user_id && $user->status == 'paid')
                                <div id="{{ $jobpost->id }}" class="card cursorpointer p-3 mx-1 my-5 shadow-lg" onclick="myFunction('/jobposts/{{ $jobpost->id }}')">
                                <h5>{{ $jobpost->jobtitle }}</h5>   
                                <h6><i>{{ $jobpost->user->companyname }}</i></h6><hr class="hrsmall">
                                    <p>{{ $jobpost->joblocation }}</p>
                                    <p class="small">{{ $jobpost->jobtype }}</p><hr class="hrsmall">
                                    <p class="small"> {{ $jobpost->salary }}</p>
                                    <span class="capsule">{{ $jobpost->jobtype }}</span>
                                    <p class="small">Posted {{ $jobpost->created_at->diffForhumans() }}</p>
                                </div>
                            @endif
                        @empty
                            <h5 class="text-center">No jobpost yet...</h5>
                        @endforelse     
                    @endforeach

                </div>

                <div id="jobpost" class="col-8">
                    <div>
                        @if (isset($jobpost))
                            <iframe scrolling="no" class="xframe shadow-lg" id="myFrame" src='/jobposts/{{ $jobpost->id }}'></iframe>        
                        @endif
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
