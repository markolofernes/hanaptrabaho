<x-header />
<x-nav />
<div class="mt-5 row">
    <div class="col-1"></div>
    <div style="margin:0 auto; max-width: 1000px" class="col-10">
        <div class="card">
             <a href="/home">◀Dashboard</a>
             @if ( Auth::User()->accounttype == 'seeker' )
                <h1 class="p-3 text-center">Jobs that you have applied for...</h1><hr class="small">
                <table class="table">
                    <thead>
                        <th>Job Title</th>
                        <th>Location</th>
                        <th>Salary</th>
                        {{-- <th>Remove</th> --}}
                    </thead>
                    <tbody>
                        @forelse ($jobapplicants as $jobapplicant)
                            @foreach ($jobposts as $jobpost)
                                @if ( $jobpost->id == $jobapplicant->jobpost_id )
                                    <tr>
                                        <td>{{ $jobpost->jobtitle  }}</td>
                                        <td>{{ $jobpost->joblocation }}</td>
                                        <td>{{ $jobpost->salary  }}</td>
                                        {{-- <td><a href="/actions.delesave/{{ $jobpost->id }}">❌</a></td> --}}
                                    </tr>
                                @endif
                            @endforeach
                        @empty
                            <td colspan="3" class="text-center">You don't have any jobs applied...</td>
                        @endforelse
                    </tbody>
                </table>
             @elseif (  Auth::User()->accounttype == 'employer')
                <h1 class="p-3 text-center">Applicants to be interviewed</h1><hr class="small">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>
                        @forelse (Auth::user()->jobposts->sortByDesc('created_at') as $jobpost)
                            <div class="card px-2 mx-1 mt-3 mb-5 shadow-lg"><small style="font-size:10px;"><i>Job ID: {{ $jobpost->id }}</i></small>
                                <h5>{{ $jobpost->jobtitle }}</h5>
                                @foreach ($users as $user)
                                    @foreach ($jobapplicnts->unique('applicant_id') as $jobapplicnt)
                                        @if ($jobapplicnt->applicant_id == $user->id && $jobapplicnt->jobpost_id == $jobpost->id)
                                            <hr class="small">
                                            <div class="d-flex flex-row">
                                                <div class="col-sm">
                                                    {{ $user->firstname }} {{ $user->lastname }} 
                                                </div>
                                                <div class="col-lg float-right">

                                                    @foreach ($resumes as $resume)
                                                        @if ($resume->user_id == $user->id)
                                                            <a href="{{ route('view-resume-pdf', $user->id) }}"  target="_blank">📄 View Resume</a>
                                                        @endif
                                                    @endforeach
                                                    |<a href="{{ route('actions.sendinterview', $user->id )}}" target="_blank">🖊 Iterview</a>|<a href="#">🤝 Hire!</a>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                                <hr class="small">
                                <p style="font-size:12px;" class="small pt-2"><i>Posted {{ $jobpost->created_at->diffForHumans() }}</i></p>
                            </div>
                        @empty
                            <tr>
                                <td colspan="3" class="text-center"><h4>No Records Yet...</h4></td>
                            </tr>
                        @endforelse
                </table>
             @endif
        </div>
    </div>
    <div class="col-1"></div>
</div>
