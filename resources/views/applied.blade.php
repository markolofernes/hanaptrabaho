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

                <h1 class="p-3 text-center">Who save my posted Jobs</h1><hr class="small">
                <table class="table">
                    <thead>
                    </thead>
                    <tbody>

                        @forelse ((Auth::user()->jobposts)->sortByDesc('created_at') as $jobpost)
                            <div class="card px-2 mx-1 mt-3 mb-5 shadow-lg"> Job ID: {{ $jobpost->id }}
                                <h5>{{ $jobpost->jobtitle }}</h5>
                                    @foreach ($users as $user)
                                        @foreach ($jobapplicnts->unique('applicant_id') as $jobapplicnt)
                                            @if ($jobapplicnt->applicant_id == $user->id )
                                                <ul> {{ $user->firstname }} {{ $user->lastname }}</ul>
                                            @endif
                                        @endforeach
                                    @endforeach

                                    <p class="small">Posted {{ $jobpost->created_at->diffForhumans() }}</p>
                                </div>
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
