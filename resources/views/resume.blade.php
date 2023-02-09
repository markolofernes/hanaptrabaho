@foreach ($resumes as $resume)
    <div id="{{ $resume->id }}" class="card cursorpointer p-3 mx-1 my-5 shadow-lg" onclick="myFunction('/jobposts/{{ $jobpost->id }}')">
@endforeach