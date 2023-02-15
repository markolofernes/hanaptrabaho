@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-1"></div>
                <div style="max-width:900px; margin:0 auto;" class="col-10">
                    <div class="card-body">
                        <div class="postjobcard">
                            <h1>Update Job Entry</h1>
                            <form enctype="multipart/form-data" action="{{ route('actions.updatejob', $jobpost->id) }}" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="id" value="{{ $jobpost->id }}">
                                <label class="sr-only mt-1" for="jobtitle">Job Title</label>
                                <input class="text-black form-control mb-2" type="text" id="jobtitle" name="jobtitle" value="{{ $jobpost->jobtitle }}" required>

                                <label class="sr-only mt-1" for="joblocation">Job Location</label>
                                <input class="text-black form-control mb-2" type="text" id="joblocation" name="joblocation" value="{{ $jobpost->joblocation }}" required>

                                <label class="sr-only mt-1" for="jobtype">Job Type</label>
                                <input class="text-black form-control mb-2" type="text" id="jobtype" name="jobtype" value="{{ $jobpost->jobtype }}" required>

                                <label class="sr-only mt-1" for="jobdescription">Job Description</label>
                                <textarea class="ckeditor form-control" name="jobdescription" required>{{ $jobpost->jobdescription }}</textarea>
                                <label class="sr-only mt-1" for="salary">Salary</label>
                                <input class="text-black form-control mb-2" type="text" id="salary" name="salary" value="{{ $jobpost->salary }}" required>
                                <br><hr class="small">
                                <div class="row">
                                    <div class="col">
                                        <a type="button" class="rounded text-black form-control btn btn-danger mt-3" href="/home">Cancel</a>
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="text-black form-control btn btn-warning mt-3">Update</button> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            <div class="col-1"></div>
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
