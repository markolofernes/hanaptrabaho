@extends('layouts.app')

@section('content')
<div class="container">
    <h3 class="text-center text-white">Welcome!</h3>
    <div class="row d-flex justify-content-center align-items-center">
        <div class="col-7">
            <img class="img-fluid d-block w-100"
                src="business-people.webp">
        </div>
        <div class="col-5">
            <div class="card">
                <div class="card-body shadow">
                    <h6>Ready for the Next Step?</h6>
                    <p class="text-muted">Create an account for tools to help you</p>
                    <div class="d-grid">
                        <a class="d-grid" style="text-decoration:none;" href="{{ route('seek') }}"><button
                                class="btn btn-warning" type="submit">Job Seeker</button></a>
                        <a class="d-grid" style="text-decoration:none;" href="{{ route('employer') }}"><button
                                class="btn btn-warning" type="submit">Employer</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection