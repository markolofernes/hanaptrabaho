<h5 class="mb-3"> Hi! {{ Auth::user()->firstname }}, <br>{{ Auth::user()->companyname }}</h5>
<a href="/createjobpost" class="px-3 btn btn-warning">Post a job</a><hr>
    <h3 class="text-center pt-2">Your Posted Jobs</h3>
    <div class="row">
        <div class="col-4 jobtableoverflow-y">
            @foreach (Auth::user()->jobposts as $jobpost)
                <div id="{{ $jobpost->id }}" class="card cursorpointer p-3 mx-1 my-5 shadow-lg" onclick="myFunction('/jobposts/{{ $jobpost->id }}')">
                <h5>{{ $jobpost->jobtitle }}</h5>
                <h6><i>{{ $jobpost->user->companyname }}</i></h6><hr class="hrsmall">
                    <p>{{ $jobpost->joblocation }}</p>
                    <p class="small">{{ $jobpost->jobtype }}</p><hr class="hrsmall">
                    <p class="small"> {{ $jobpost->salary }}</p>
                    <span class="capsule">LARAVEL PHP JAVASCRIPT HTML CSS SCSS REACT VITE LIVEWIRE</span>
                </div>
            @endforeach
        </div>
        <div id="jobpost" class="col-8">
            <div>
            <iframe class="jobpanel shadow-lg" style="width:100%;height:100vh;" id="myFrame" src=""></iframe>
            </div>
        </div>
    </div>
<script>
function myFunction(value) {
  document.getElementById("myFrame").src = value;
  }
</script>