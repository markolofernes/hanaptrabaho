@extends('layouts.app')
@section('content')
    @if (Route::has('login'))
        @auth
            <a href="{{ url('/home') }}">Dashboard</a>
        @endauth
        <img style="border-radius: 10px;box-shadow: 2px 2px 5px rgba(0,0,0,0.25)" src="mainimg.webp" alt="pinyotrabaho">
    @endif
@endsection