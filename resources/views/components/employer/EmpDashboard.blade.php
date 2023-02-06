<h5 class="mb-3"> Hi! {{ Auth::user()->firstname }}, <br>{{ Auth::user()->companyname }}</h5>
<a href="/createjobpost" class="px-3 btn btn-warning">Post a job</a><hr>
    <div class="col-4 jobtableoverflow-y">
        @foreach (Auth::user()->jobposts as $jobpost)
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