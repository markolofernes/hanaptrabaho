@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
                <div class="col-8">
                    <div class="card-body">
                        <div class="postjobcard">
                            <h1>Post a Job</h1>
                            @if ( Auth::user() == null )
                               @php
                                header('Location:/');
                                exit;
                               @endphp
                            @else
                            <form enctype="multipart/form-data" action="/postjob" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <label class="sr-only mt-1" for="jobtitle">Job Title</label>
                                <input class="form-control mb-2" type="text" id="jobtitle" name="jobtitle" placeholder="Web Developer" required>

                                <label class="sr-only mt-1" for="joblocation">Job Location</label>
                                <input class="form-control mb-2" type="text" id="joblocation" name="joblocation" placeholder="Manila" required>

                                <label class="sr-only mt-1" for="jobtype">Job Type</label>
                                <input class="form-control mb-2" type="text" id="jobtype" name="jobtype" placeholder="Work from home" required>

                                <label class="sr-only mt-1" for="jobdescription">Job Description</label>
                                <textarea class="ckeditor form-control" name="jobdescription" required>
                                    <h3><strong>Job description</strong></h3>
                                    <ul>
                                        <li>Working with the backlog &ndash; setting up sprints, triaging bugs, and scoping enhancements.</li>
                                        <li>Making release dates &ndash; working with your team mates, testers, and management to ensure releases go out on time.</li>
                                        <li>Refactoring &ndash; sometimes you&rsquo;ll need to work with legacy code and pay particular attention to backwards compatibility</li>
                                        <li>Code reviews and PRs &ndash; we&rsquo;re growing our teams and part of that means mentoring and reviewing your fellow developers in the ways of great software development.</li>
                                        <li>We use a number of languages including PHP, vanilla JS, jQuery, and ReactJS.</li>
                                    </ul>
                                </textarea>
                                <label class="sr-only mt-1" for="salary">Salary</label>
                                <input class="form-control mb-2" type="text" id="salary" name="salary" placeholder="PHP 25,000 - P35,000 a month" required>

                                <button type="submit" class="form-control btn btn-warning mt-3">Post</button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            <div class="col-2"></div>
        </div>
    </div>
</body>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'jobdescription', {
    toolbar: [
    { name: 'basicstyles',items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Cut', 'Copy',  'PasteText', 'PasteFromWord', 'Undo', 'Redo','NumberedList', 'BulletedList', 'Outdent', 'Indent', 'HorizontalRule', 'Styles', 'Format', 'Maximize' ] }
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