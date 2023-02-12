 {{-- Hi! {{ Auth::user()->firstname }}, <br> --}}
<h5 class="mb-3">{{ Auth::user()->companyname }}</h5>
<a href="/actions.createjobpost" class="px-3 btn btn-warning">Post a job</a>
<a href="{{ route('appliedjobs', Auth::user()->id) }}" class="px-3 btn btn-warning">My Applicants</a>
<hr>
    <h3 class="text-center pt-2">Your Posted Jobs</h3>
        <div class="row">
            <livewire:employerjobpost />
        </div>
