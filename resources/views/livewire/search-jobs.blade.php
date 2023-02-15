<div>
    <div>
        <input wire:model="search" type="text" placeholder="Search for jobs..." class="inputSearchBars form-select form-select mb-3 text-black" list="JobLists"/><br>
            <div style="margin: 0 auto;" class="jobtableoverflow-y">
                <div  class="row">
                    @forelse ($jobposts as $jobpost)
                        @if ($jobpost->user->status == 'paid') 
                            <div class="col-4 mb-5">
                                <div id="{{ $jobpost->id }}" class="card cursorpointer mx-3 p-3 shadow-lg" onclick="window.open('/viewjob/{{ $jobpost->id }}', '_blank');">
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
                    @empty
                        <h5 class="text-center">type to search...</h5>
                    @endforelse     
                </div>
            </div>
        </div>
</div>
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