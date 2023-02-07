{{-- @extends('layouts.app')
@section('jobcontent') --}}
{{-- <div class="containter">
    <div class="row"> --}}
        {{-- <div class="col-2">
            <a a href="/" class="px-2 rounded btn btn-warning">⬅Back</a>
        </div> --}}
        <x-header />
        <div style="height:100vh" class="col-12">
            <div class="card">
                @foreach ($jobposts as $jobpost)
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
                @endforeach
            </div>
        </div>
        {{-- <div class="col-2"></div>
    </div>
</div> --}}
{{-- @endsection --}}