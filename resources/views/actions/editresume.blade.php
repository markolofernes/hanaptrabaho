@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
                <div class="manualresize col-10">
                    <div class="card-body">
                        <div class="postjobcard">
                            @if ( Auth::user() == null )
                               @php
                                header('Location:/');
                                exit;
                               @endphp
                            @else
                            <form enctype="multipart/form-data" class="form-signup border shadow p-3" method="POST" action="/actions.updateresume/{{ $resume->id }}">
                                @csrf
                                <h3 class="mb-3 text-center">Create Resume</h3><hr>
                                <div class="row mb-4">
                                     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    {{-- <input type="hidden" id="accounttype" name="accounttype" id="seeker" value="seeker"> --}}
                                    <div class="col-3">
                                        <label for="fullname" class="sr-only mt-3">Full Name</label>
                                        <input type="text" id="fullname" name="fullname" class="form-control text-black" value="{{ $resume->fullname }}" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="phone" class="sr-only mt-3">Phone No.</label>
                                        <input type="text " maxlength="4" size="4" id="phone" name="phone" class="form-control text-black" value="{{ $resume->phone }}" required>
                                    </div>
                                    <div class="col-5">
                                        <label for="address" class="sr-only mt-3">Address</label>
                                        <input type="text" id="address" name="address" class="form-control text-black" value="{{ $resume->address }}" required>
                                    </div>
                                    <div class="col-2">
                                        <label for="email" class="sr-only mt-3">Email</label>
                                        <input type="text" id="email" name="email" class="form-control text-black" value="{{ $resume->email }}" required>
                                    </div>
                                </div>
                                <textarea id="resumedesc" class="ckeditor form-control" name="textarea" required>{{ $resume->textarea }} 

                                </textarea>
                                {{-- <label for="skills" class="sr-only mt-3">Skills/Expertise</label> --}}
                                <input type="hidden" class="form-control text-black" id="skills" name="skills" rows="3" value="{{ $resume->skills }} " required> </input>
                                <label for="language" class="sr-only mt-3">Language</label>
                                <textarea class="form-control text-black" id="language" name="language" rows="3" required>{{ $resume->language }} </textarea>
                                <br><hr class="small">
                                <div class="row">
                                    <div class="col">
                                        <a type="button" class="rounded text-black form-control btn btn-danger mt-3" href="/home">Cancel</a>
                                    </div>
                                    <div class="col">
                                        <button class="rounded text-black form-control btn btn-warning mt-3" type="submit">Confirm</button> 
                                    </div>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            <div class="col-1"></div>
        </div>
    </div>
</body>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'resumedesc', {
    toolbar: [
        { name: 'basicstyles',items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 
            'Cut', 'Copy',  'PasteText', 'PasteFromWord', 'Undo', 'Redo','NumberedList', 'BulletedList', 
            'Outdent', 'Indent', 'HorizontalRule', 'Styles', 'Format', 'Maximize' ] }
    ]
    });
</script>
@endsection