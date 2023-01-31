@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="dsplyswitch">
            <center>
                <img class="img-fluid mainImgMxSz object-fit-contain border rounded shadow-lg mb-5 bg-body-tertiary"
                    src="mainimg.webp" alt="pinyotrabaho">
            </center>
        </div>
        <div class="">
            <form action="">
                @csrf
                <input class="inputSearchBars form-select-lg form-select mb-3" list="JobLists" id="exampleDataList"
                    placeholder="Search for jobs...">
                <datalist id="JobLists">
                    <option value="Urgent Hiring">
                    <option value="Office Staff">
                    <option value="Work From Home">
                    <option value="Part Time">
                    <option value="Encoder">
                    <option value="Non Voice Work From Home">
                    <option value="Direct Hiring">
                    <option value="Part Time Work From Home">
                    <option value="Job Hiring">
                </datalist>

                <input class="inputSearchBars form-select-lg form-select mb-3" list="Places" id="exampleDataList"
                    placeholder="Where...">
                <datalist id="Places">
                    <option value="Manila">
                    <option value="Cavite">
                    <option value="Quezon City">
                    <option value="Las Piñas">
                    <option value="Bacoor, Cavite">
                    <option value="Muntin Lupa">
                    <option value="Alabang">
                    <option value="Parañaque City">
                    <option value="Taguig">
                    <option value="Makati">
                    <option value="Pasig City">
                    <option value="Pasay City">
                </datalist>
                <div class="row">
                    <div class="col">
                        <select class="form-select-lg form-select mb-3" aria-label=".form-select-sm">
                            <option selected>Date Posted</option>
                            <option value="24hrs">Last 24 Hours</option>
                            <option value="3days">3 days ago</option>
                            <option value="7days">1 week ago</option>
                            <option value="14days">2 weeks ago</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select-lg form-select mb-3" aria-label=".form-select-sm">
                            <option selected>Job Type</option>
                            <option value="Full-Time">Full Time</option>
                            <option value="Permanent">Permanent</option>
                            <option value="New-Grad">New-Grad</option>
                            <option value="Contract">Contract</option>
                            <option value="Internship">Internship</option>
                            <option value="Part-Time">Part Time</option>
                            <option value="Temporary">Temporary</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection