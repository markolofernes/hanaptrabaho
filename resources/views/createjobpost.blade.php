@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
                <div class="col-8">
                    <div class="card-body">
                        <div class="postjobcard">
                            <h1>Post a Job</h1>
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
