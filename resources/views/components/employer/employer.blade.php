@if ( Auth::user()->companyname == 'unsigned')  
<form class="form-signup border shadow p-3" method="POST" action="/createaccount">
@csrf
    <h2 class="text-center">Employer</h2><hr>
    <h5 class="h5 mb-3 text-center">Please complete the following fields</h5>
        <div class="row">
            <input type="hidden" id="employer" name="accounttype" id="employer" value="employer">
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
    <label for="companyname" class="sr-only mt-3">Company Role</label>
    <input class="form-control" list="companyrole" placeholder="Company Position">
    <datalist id="companyrole">
        <option value="Owner">
        <option value="CEO">
        <option value="Assistant">
        <option value="Secretary">
        <option value="Staff">
    </datalist>  
    <input type="hidden" id="education" name="education" class="form-control"  value="unsigned" placeholder="Education" required>

    <label for="companyname" class="sr-only mt-3">Company Name</label>
    <input type="text" id="companyname" name="companyname" class="form-control" placeholder="companyname" required>

    <label for="phone" class="sr-only mt-3">Company Phone</label>
    <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone No" required>

    <label for="address" class="sr-only mt-3">Company Address</label>
    <input type="text" id="address" name="address" class="form-control" placeholder="Address" required>

    <button class="btn btn-lg btn-primary btn-block mt-4 form-control"  type="submit">Confirm</button>
</form>                  
@else
    <h5 class="mb-3"> Hi! {{ Auth::user()->firstname }}, <br>{{ Auth::user()->companyname }}</h5>
    <a href="/createjobpost" class="btn btn-warning">Post a job</a>
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
    {{-- <x-employer.EmpDashboard /> --}}
@endif