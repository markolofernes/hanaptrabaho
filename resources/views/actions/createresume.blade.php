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
                            <form enctype="multipart/form-data" class="form-signup border shadow p-3" method="POST" action="/actions.postresume">
                                @csrf
                                <h3 class="mb-3 text-center">Create Resume</h3><hr>
                                <div class="row mb-4">
                                     <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                    {{-- <input type="hidden" id="accounttype" name="accounttype" id="seeker" value="seeker"> --}}
                                    <div class="col-12">
                                        <label for="fullname" class="sr-only mt-3">Full Name</label>
                                        <input type="text" id="fullname" name="fullname" class="form-control text-black" value="{{ old('fullname') }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="phone" class="sr-only mt-3">Phone No.</label>
                                        <input type="number " maxlength="12" size="12" id="phone" name="phone" class="form-control text-black" value="{{ old('phone') }}" required>
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="sr-only mt-3">Email</label>
                                        <input type="text" id="email" name="email" class="form-control text-black" value="{{ old('email') }}" required>
                                    </div>
                                    <div class="col-12">
                                        <label for="address" class="sr-only mt-3">Address</label>
                                        <input type="text" id="address" name="address" class="form-control text-black" value="{{ old('address') }}" required>
                                    </div>
                                </div>
                                <textarea id="resumedesc" class="ckeditor form-control" name="textarea" value="{{ old('textarea') }}" required>
                                 <h1> * put resume description here *</h1>
                                </textarea>
                                <label for="skills" class="sr-only mt-3">Skills/Expertise</label>
                                <textarea class="form-control text-black" id="skills" name="skills" rows="3" value="{{ old('skills') }}" required></textarea>
                                <label for="language" class="sr-only mt-3">Language</label>
                                <textarea class="form-control text-black" id="language" name="language" rows="3" value="{{ old('language') }}" required></textarea>
                                <button class="btn btn-lg btn-primary btn-block mt-4 form-control" type="submit">Confirm</button>
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
{{-- 
    CKEDITOR.replace( 'jobdescription', {
    toolbar: [
    { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Source', '-', 'Save', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },
    { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ] },
    { name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
    { name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },
    '/',
    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
    { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl', 'Language' ] },
    { name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
    { name: 'insert', items: [ 'Image', 'Flash', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak', 'Iframe' ] },
    '/',
    { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
    { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
    { name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
    { name: 'others', items: [ '-' ] },
    { name: 'about', items: [ 'About' ] }
]
}); --}}