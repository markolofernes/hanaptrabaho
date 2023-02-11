@if( Auth::user()->firstname == 'unsigned')

<form class="form-signup border shadow p-3" method="POST" action="{{ route('createaccount')}}">
    @csrf
    <h2 class="text-center">Jobseeker</h2><hr>
    <h5 class="h5 mb-3 text-center">Please complete the following fields</h5>
    <div class="row">
        <input type="hidden" id="accounttype" name="accounttype" id="seeker" value="seeker">
        <div class="col-5">
            <label for="firstname" class="sr-only mt-3">First Name</label>
            <input type="text" id="firstname" name="firstname" class="form-control text-black" placeholder="Juan" required>
        </div>
        <div class="col-2">
            <label for="midname" class="sr-only mt-3">M.I.</label>
            <input type="text "maxlength="4" size="4" id="midname" name="midname" class="form-control text-black" placeholder="B" required>
        </div>
        <div class="col-5">
            <label for="lastname" class="sr-only mt-3">Last Name</label>
            <input type="text" id="lastname" name="lastname" class="form-control text-black" placeholder="Dela Cruz" required>
        </div>
    </div>
        
    <label for="phone" class="sr-only mt-3">Phone</label>
    <input type="text" id="phone" name="phone" class="form-control text-black" placeholder="Phone No" required>

    <label for="address" class="sr-only mt-3">Address</label>
    <input type="text" id="address" name="address" class="form-control text-black" placeholder="Address" required>

    <label for="education" class="sr-only mt-3">Education</label>
    <input type="text" id="education" name="education" class="form-control text-black" placeholder="Education" required>

    <input type="hidden" id="companyname" name="companyname" class="form-control text-black"  value="unsigned" placeholder="companyname" required>

    <button class="btn btn-lg btn-primary btn-block mt-4 form-control"  type="submit">Confirm</button>
</form>
@else
<h6>this will gonna be dashboard for jobseekers</h6><br>
<hr class="small">
<div class="text-center">
    <h5>Resume</h5>
    <small><a href="/createresume">📄Create (PDF)</a> | <a href="#">🖨 Print (PDF) </a> | <a href="#">☁Upload </a><a href="#">🔽 Download (PDF) </a> </small>
    <hr class="small">
        @foreach($resumes as $resume)
            {{$resume->id}}
        @endforeach    
    <x-seeker.resume />
</div>
@endif