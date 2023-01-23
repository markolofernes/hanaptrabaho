@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h3 class="text-center">Welcome!</h3>
                    <h6>Ready for the Next Step?</h6>
                    <p class="text-muted">Create an account for tools to help you</p>
                    <div class="d-grid gap-2">
                        <a href="{{ route('seek') }}"><button class="btn btn-warning" type="submit">Job Seeker</button></a>
                        <a href=""><button class="btn btn-warning" type="submit">Employer</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
