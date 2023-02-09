@if( Auth::user()->firstname == 'unsigned')

<form class="form-signup border shadow p-3" method="POST" action="{{ route('jobseeker') }}">
    @csrf
    <h3 class="mb-3 text-center">Create Resume</h3><hr>
    <div class="row mb-4">
        <input type="hidden" id="accounttype" name="accounttype" id="seeker" value="seeker">
        <div class="col-3">
            <label for="fullname" class="sr-only mt-3">Full Name</label>
            <input type="text" id="fullname" name="fullname" class="form-control" required>
        </div>
        <div class="col-2">
            <label for="phone" class="sr-only mt-3">Phone No.</label>
            <input type="text " maxlength="4" size="4" id="phone" name="phone" class="form-control" required>
        </div>
        <div class="col-5">
            <label for="address" class="sr-only mt-3">Address</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>
        <div class="col-2">
            <label for="email" class="sr-only mt-3">Email</label>
            <input type="text" id="email" name="email" class="form-control" required>
        </div>
    </div>

    <textarea class="ckeditor form-control" name="textarea" required>
        <h3><strong>OBJECTIVES</strong></h3>
        <ul>
            <li></li>
        </ul>
        <h3><strong>EDUCATION</strong></h3>
        <ul>
            <li></li>
        </ul>
        <h3><strong>EXPERIENCE</strong></h3>
        <ul>
            <li></li>
        </ul>
        <h3><strong>REFERENCE</strong></h3>
        <ul>
            <li></li>
        </ul>
    </textarea>

    <label for="skills" class="sr-only mt-3">Skills/Expertise</label>
    <textarea class="form-control" id="skills" name="skills" rows="3" required></textarea>

    <label for="language" class="sr-only mt-3">Language</label>
    <textarea class="form-control" id="language" name="language" rows="3" required></textarea>

    <button class="btn btn-lg btn-primary btn-block mt-4 form-control" type="submit">Confirm</button>
</form>
@else
<h6>this will gonna be dashboard for jobseekers</h6><br>
<hr class="small">
<div class="text-center">
    <h5>Resume</h5>
    <small><a href="/createresume">📄Create (PDF)</a> | <a href="#">🖨 Print (PDF) </a> | <a href="#">☁Upload </a><a href="#">🔽 Download (PDF) </a> </small>
    <hr class="small">
        @foreach($resumes as $resume)
            {{$resume->id}}
        @endforeach    
    
    <x-seeker.resume />
</div>
@endif
</body>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'textarea', {
    toolbar: [
    { name: 'basicstyles',items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Cut', 'Copy',  'PasteText', 'PasteFromWord', 'Undo', 'Redo','NumberedList', 'BulletedList', 'Outdent', 'Indent', 'HorizontalRule', 'Styles', 'Format', 'Maximize' ] }
]
});
    </script>

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