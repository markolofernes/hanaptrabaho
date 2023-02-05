<h5 class="mb-3"> Hi! {{ Auth::user()->firstname }}, <br>{{ Auth::user()->companyname }}</h5>
<a href="/createjobpost" class="btn btn-warning">Post a job</a>