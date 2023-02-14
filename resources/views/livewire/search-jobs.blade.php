<div>
    {{-- <h3 class="fw-bold">Job Seach</h3> --}}
    <div>
        <input wire:model="search" type="text" placeholder="Search for jobs..." class="inputSearchBars form-select form-select mb-3 text-black" list="JobLists"/><br>
            <div style="margin: 0 auto;" class="jobtableoverflow-y">
                <div  class="row">
                    {{-- @foreach ($users as $user) --}}
                        @forelse ($jobposts as $jobpost)
                            {{-- @if ($user->id == $jobpost->user_id && $user->status == 'paid') --}}
                            @if ($jobpost->user->status == 'paid')
                                <div class="col-4">
                                    <div id="{{ $jobpost->id }}" class="card cursorpointer mx-3 p-3 shadow-lg" onclick="window.open('/viewjob/{{ $jobpost->id }}', '_blank');">
                                        {{-- onclick="myFunction('/jobposts/{{ $jobpost->id }}') --}}
                                        {{-- <a href="/jobposts/{{ $jobpost->id }}" target="_blank" >show</a> --}}
                                    <h5>{{ $jobpost->jobtitle }}</h5>   
                                    <h6><i>{{ $jobpost->user->companyname }}</i></h6><hr class="hrsmall">
                                        <p>{{ $jobpost->joblocation }}</p>
                                        <p class="small">{{ $jobpost->jobtype }}</p><hr class="hrsmall">
                                        <p class="small"> {{ $jobpost->salary }}</p>
                                        <span class="capsule">{{ $jobpost->jobtype }}</span>
                                        <p class="small">Posted {{ $jobpost->created_at->diffForhumans() }}</p>
                                    </div>
                                </div>
                            @endif
                            {{-- @endif --}}
                        @empty
                            <h5 class="text-center">type to search...</h5>
                        @endforelse     
                    {{-- @endforeach --}}
                </div>
            </div>

            {{-- <div id="jobpost" class="col-8">
                <div>
                    @if (isset($jobpost))
                        @foreach ($jobposts->unique('user_id') as $jobpost)
                            @if ($jobpost->user->status == 'paid')
                                <iframe scrolling="no" class="xframe shadow-lg" id="myFrame3" src='/jobposts/{{ $jobpost->id }}'></iframe>        
                            @endif
                        @endforeach
                    @endif
                </div>
            </div> --}}
        </div>
</div>
<script>
    
// function myFunction(value) {
//   document.getElementById("myFrame1").src = value;
//   }
</script>





















































<datalist id="JobLists">
    <option value="Web Developer">
    <option value="Carpenter">
    <option value="Work From Home">
    <option value="Part Time">
    <option value="Encoder">
    <option value="Non Voice Work From Home">
    <option value="Direct Hiring">
    <option value="Part Time Work From Home">
    <option value="Job Hiring">
</datalist>

            {{-- <form action="">
                @csrf


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
            </form> --}}