<form class="form-signup border shadow p-5" method="POST" action="/createaccount">
@csrf
    <h1 class="h3 mb-3 text-center">Sign up as</h1>
    <center>
        <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="accounttype" id="employer"  value="employer" autocomplete="off">
            <label class="btn btn-outline-primary" for="employer">Employer</label>

            <input type="radio" class="btn-check" name="accounttype" disabled id="none" autocomplete="off" required>
            <label class="btn btn-outline-primary" for="none"></label>

            <input type="radio" class="btn-check" name="accounttype" id="seeker"  value="seeker" autocomplete="off">
            <label class="btn btn-outline-primary" for="seeker">Job Seeker</label>
        </div></center><br>
        <input type="hidden" id="firstname" name="firstname" value="unsigned">
        <input type="hidden" id="midname" name="midname" value="unsigned">
        <input type="hidden" id="lastname" name="lastname" value="unsigned">
        <input type="hidden" id="phone" name="phone" value="unsigned">
        <input type="hidden" id="address" name="address" value="unsigned">
        <input type="hidden" id="education" name="education" value="unsigned">
        <input type="hidden" id="companyname" name="companyname" value="unsigned">
    <button class="btn btn-lg btn-primary btn-block mt-4 form-control"  type="submit">Next</button>
</form>