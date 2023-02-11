<x-header />
<x-nav />
<div class="row py-5"><br>
    <div class="col-1"></div>
    <div style="margin: 0 auto;max-width:900px;" class="col-10 mt-5">
       <form class="card form-signup border shadow p-3" method="POST" action="{{ route('createaccount')}}">
            @csrf
            <a href="/home">◀Dashboard</a>
            <h2 class="text-center">Profile Edit</h2><hr>
            <input type="hidden" id="accounttype" name="accounttype" id="seeker" value="{{ $user->accounttype }}">

            <div class="col-5">
                <label for="firstname" class="sr-only mt-3">First Name</label>
                <input type="text" id="firstname" name="firstname" class="form-control text-black" value="{{ $user->firstname }}" required>
            </div>

            <div class="col-2">
                <label for="midname" class="sr-only mt-3">M.I.</label>
                <input type="text "maxlength="4" size="4" id="midname" name="midname" class="form-control text-black" value="{{ $user->midname }}" required>
            </div>

            <div class="col-5">
                <label for="lastname" class="sr-only mt-3">Last Name</label>
                <input type="text" id="lastname" name="lastname" class="form-control text-black" value="{{ $user->lastname }}" required>
            </div>
            
            <label for="phone" class="sr-only mt-3">Phone</label>
            <input type="text" id="phone" name="phone" class="form-control text-black" value="{{ $user->phone }}" required>


            <label for="address" class="sr-only mt-3">Address</label>
            <input type="text" id="address" name="address" class="form-control text-black" value="{{ $user->address }}" required>
            <div {{ $typeSeeker = 'text' }}{{ $typeEmployer = 'text' }}>
                @if( Auth::user()->accounttype == 'seeker')
                    <div {{ $typeSeeker = 'text' }}{{ $typeEmployer = 'hidden' }}></div>
                    <label for="education" class="sr-only mt-3">Education</label>
                @elseif( Auth::user()->accounttype == 'employer')
                    <div {{ $typeSeeker = 'hidden' }}{{ $typeEmployer = 'text' }}></div>
                    <label for="companyname" class="sr-only mt-3">Company Name</label>
                @elseif( Auth::user()->accounttype == 'admin')
                    <div {{ $typeSeeker = 'text' }}{{ $typeEmployer = 'text' }}></div>
                @endif
                <input type="{{$typeSeeker}}" id="education" name="education" class="form-control text-black" value="{{ $user->education }}" required>
                
                <input type="{{$typeEmployer}}" id="companyname" name="companyname" class="form-control text-black" value="{{ $user->companyname }}" required>
            </div>
            <button class="btn btn-lg btn-secondary btn-block mt-4 form-control"  type="submit">Confirm</button>
        </form>
    </div>
    <div class="col-1"></div>
</div>
 

