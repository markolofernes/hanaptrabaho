<div class="col-4 jobtableoverflow-y">
       @foreach (Auth::user()->jobposts as $jobpost)  {{-- wire:loading.remove --}}
        <div class="card px-2 mx-1 mt-3 mb-5 shadow-lg">
            @if ( Auth::user() !== null )
                @if (Auth::user()->accounttype == 'seeker')
                    <button class="btn btn-warning mx-2">Apply Now</button><button class="btn btn-warning mx-2">🖤 Save</button>
                @elseif (Auth::user()->accounttype == 'employer')
                    <div class="dropdown">
                    <a class="jobminimenu" role="button" data-bs-toggle="dropdown" aria-expanded="false"> ••• </a>
                        <ul class="dropdown-menu">
                            @if($jobpost->user_id == Auth::user()->id)  
                                <li><a class="dropdown-item" role="button">📝Edit</a></li>
                                <li><a class="dropdown-item" role="button" wire:click="deleteId({{ $jobpost->id }})" onclick="cleariframe()">❌Delete</a></li>
                            @endif   
                            {{-- href="{{ route('deletejob', $jobpost->id) }}" --}}
                        </ul>
                    </div>
                @endif
            @endif   
            <div  id="{{ $jobpost->id }}" class="cursorpointer p-2" onclick="myFunction('/jobposts/{{ $jobpost->id }}')">
            <h5>{{ $jobpost->jobtitle }}</h5>
            <h6><i>{{ $jobpost->user->companyname }}</i></h6><hr class="hrsmall">
                <p>{{ $jobpost->joblocation }}</p>
                <p class="small">{{ $jobpost->jobtype }}</p><hr class="hrsmall">
                <p class="small"> {{ $jobpost->salary }}</p>
                <span class="capsule">LARAVEL PHP JAVASCRIPT HTML CSS SCSS REACT VITE LIVEWIRE</span>
                <p class="small">Posted {{ $jobpost->created_at->diffForhumans() }}</p>
            </div>
        </div>
     @endforeach
</div>
<div id="jobpost" class="col-8">
    <div>
        @if (isset($jobpost))
            <iframe scrolling="no" class="jobpanel shadow-lg" style="width:100%;height:100vh;" id="myFrame" src='/jobposts/{{ $jobpost->id }}'></iframe>        
        @endif
    </div>
</div>
<script>
    function myFunction(value) {
        document.getElementById("myFrame").src = value;
    }
</script>
<script>
    function cleariframe() {
        document.getElementById("myFrame").src = 'blank';
    }
</script>
  {{-- onmouseover="myOverFunction('/jobposts/{{ $jobpost->id }}')" --}}
{{-- <script>
    function myOverFunction(value) {
         document.getElementById("myFrame").src = value;
    }
</script> --}}