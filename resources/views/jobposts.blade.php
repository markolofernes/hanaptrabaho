<x-header />
<div style="height:100vh" class="col-12">
    <div class="card">
        @foreach ($jobposts as $jobpost)
            <div id="jobDescPanel" class="jobpanel shadow-lg">
                <img class="employerlogo" src="https://logodownload.org/wp-content/uploads/2021/08/microsoft-teams-logo-2.png" alt="">
                <h4>{{ $jobpost->jobtitle }}</h4>
                <h6>{{ $jobpost->user->companyname }}</h6> 
                <p>{{ $jobpost->joblocation }}</p>
            @if ( Auth::user() !== null )
                @if (Auth::user()->accounttype == 'seeker')
                <div class="d-flex flex-row mb-3">
                    <form action="{{ route('applyjob', Auth::user()->id ) }}" method="POST">
                        @csrf
                        <input type="hidden" id="jobpost_id" name="jobpost_id" value="{{ $jobpost->id }}">
                        <input type="hidden" id="applicant_id" name="applicant_id" value="{{ Auth::user()->id }}">
                        <button class="btn btn-warning m-2 btn-sm" type="submit">✔Apply Now</button>
                    </form>
                    <form action="{{ route('savejob', Auth::user()->id ) }}" method="POST">
                        @csrf
                        <input type="hidden" id="jobpost_id" name="jobpost_id" value="{{ $jobpost->id }}">
                        <input type="hidden" id="applicant_id" name="applicant_id" value="{{ Auth::user()->id }}">
                        <button class="btn btn-warning m-2 btn-sm" type="submit">🖤 Save</button>
                    </form>
                </div>
                @endif
            @endif                           
            <hr>
            <div class="pb-3 jobpaneldesc tableoverflow-y">
                <h5> Job details</h5>
                <h6>💼 {{ $jobpost->jobtype }}</h6>
                <h6>💵 {{ $jobpost->salary }}</h6>
                <hr>
                <h5>Qualifications</h5>
                <p>WordPress: 3 years (Required)</p> 
                <hr>
                {!! $jobpost->jobdescription !!}
                <i style="font-size:12px">Posted: {{ $jobpost->created_at->diffforhumans() }}</i>
            </div>
            <br>
        </div>                    
        @endforeach
    </div>
</div>