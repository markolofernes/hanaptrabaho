{{-- <h5> Hi! {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</h5> --}}
{{-- <h6>this will gonna be dashboard for jobseekers</h6><br>
<hr class="small">
<div class="text-center">
    <h5>Resume</h5>
    <small><a href="/createresume">📄Create (PDF)</a> | <a href="#">🖨 Print (PDF) </a> | <a href="#">☁Upload </a><a href="#">🔽 Download (PDF) </a> </small>
    <hr class="small">
        @foreach($resumes as $resume)
            {{$resume->id}}
        @endforeach    
    
    <x-seeker.resume />
</div> --}}