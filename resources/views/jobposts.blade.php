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

                @if ( Auth::user() !== null )
                    @if (Auth::user()->accounttype == 'seeker')
                        <button class="btn btn-warning mx-2">Apply Now</button><button class="btn btn-warning mx-2">🖤 Save</button>
                    @elseif (Auth::user()->accounttype == 'employer')
                        <button class="btn btn-warning mx-2">📝Edit</button>
                        @if($jobpost->user_id == Auth::user()->id)  
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                            ❌ Delete
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete This Job?</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <h4>Position: 💼{{ $jobpost->jobtitle }}</h4>
                                    <h6>Salary: 💶{{ $jobpost->salary }}</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                    <a class="rounded btn btn-danger mx-2" href="{{ route('deletejob', $jobpost->id) }}">Confirm</a>
                                </div>
                                </div>
                            </div>
                            </div>
                        @endif       
                    @else   
                        <button class="btn btn-warning mx-2">Apply Now</button><button class="btn btn-warning mx-2">🖤 Save</button>
                    @endif
                @endif                           
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