<x-header />
<x-nav />
<div class="row py-5"><br>
    <div class="col-1"></div>
    <div style="margin: 0 auto;max-width:900px;" class="col-10 mt-5">
       <form class="card form-signup border shadow p-3" method="POST" action="{{ route('sendemail', $user->id )}}">
            @csrf
            <input type="hidden" name="subject" value="Interview Invitation for the position of at {{ Auth::user()->companyname }}">
            <h2 class="text-center">🖊 Interview Invitation</h2><hr>
            <textarea id="description" class="ckeditor form-control" name="description" required>
                <h3>Subject: Interview Invitation for the position of <Position Name> at <strong>{{ Auth::user()->companyname }},</strong></h3>
                <p>Hello  <b> {{ $user->firstname }} {{ $user->midname }} {{ $user->lastname }}</b>,

                Thank you for applying for the position of <Position Name> with us. We are glad to inform you that your interview has been scheduled for ( 10:00am ) on (February 21, 2023).
                Kindly note the interview details:
                </p> 
                
                Venue Address (in case of face-to-face interview) <br>
                Communication Link (in case of remote/virtual interview) <br>
                Interviewing Person (name and designation) <br><br>

                Pls. check if your contact details are correct, email us for corrections:
                <p><b>{{ $user->phone }}</b></p>
                <p><b>{{ $user->email }}</b></p><br>

                Please reply to this email: <b>{{ Auth::user()->email }} </b> if you have any questions or need to reschedule. We look forward to speaking with you. 
                <br><br>
                Sincerely,
                <p><strong>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }},</strong></p>
                <h3><strong>{{ Auth::user()->companyname }}</strong></h3>
            </textarea>
            <button type="submit" class="text-black form-control btn btn-warning mt-3">Send</button>
            
        </form>
    </div>
    <div class="col-1"></div>
</div>
 
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
    CKEDITOR.replace( 'description', {
    toolbar: [
    { name: 'basicstyles',items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat', 'Cut', 'Copy',  'PasteText', 'PasteFromWord', 'Undo', 'Redo','NumberedList', 'BulletedList', 'Outdent', 'Indent', 'HorizontalRule', 'Styles', 'Format', 'Maximize' ] }
]
});
</script>
