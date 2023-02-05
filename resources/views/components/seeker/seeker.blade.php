@if( Auth::user()->firstname == 'unsigned')

<form class="form-signup border shadow p-3" method="POST" action="/createaccount">
    @csrf
    <h2 class="text-center">Jobseeker</h2><hr>
    <h5 class="h5 mb-3 text-center">Please complete the following fields</h5>
    <div class="row">
        <input type="hidden" id="accounttype" name="accounttype" id="seeker" value="seeker">
        <div class="col-5">
            <label for="firstname" class="sr-only mt-3">First Name</label>
            <input type="text" id="firstname" name="firstname" class="form-control" placeholder="Juan" required>
        </div>
        <div class="col-2">
            <label for="midname" class="sr-only mt-3">M.I.</label>
            <input type="text "maxlength="4" size="4" id="midname" name="midname" class="form-control" placeholder="B" required>
        </div>
        <div class="col-5">
            <label for="lastname" class="sr-only mt-3">Last Name</label>
            <input type="text" id="lastname" name="lastname" class="form-control" placeholder="Dela Cruz" required>
        </div>
    </div>
        
    <label for="phone" class="sr-only mt-3">Phone</label>
    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone No" required>

    <label for="address" class="sr-only mt-3">Address</label>
    <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>

    <label for="education" class="sr-only mt-3">Education</label>
    <input type="text" id="education" name="education" class="form-control" placeholder="Education" required>

    <input type="hidden" id="companyname" name="companyname" class="form-control"  value="unsigned" placeholder="companyname" required>

    <button class="btn btn-lg btn-primary btn-block mt-4 form-control"  type="submit">Confirm</button>
</form>
@else
    <x-seeker.SeekDashboard />
@endif