<x-header />
<x-nav />
<div class="row py-5"><br>
    <div class="col-1"></div>
    <div style="margin: 0 auto;max-width:900px;" class="col-10 mt-5">
       <form class="card form-signup border shadow p-3" method="POST" action="{{ route('sendemail', $user->id )}}">
            @csrf
            <input type="hidden" name="subject" value="Interview Invitation for the position of at {{ Auth::user()->companyname }}">
            <h2 class="text-center">🤝 Hired Message</h2><hr>
            <textarea id="description" class="ckeditor form-control" name="description" required>
                <h3>Subject: You are hired for the position of <Position Name> at <strong>{{ Auth::user()->companyname }},</strong></h3>
                <h3>Hello  <b> {{ $user->firstname }} {{ $user->midname }} {{ $user->lastname }}</b>,

                We are happy to announce that you are <br>    now <b>HIRED </b> and <b> Congratulations! </b> you are now a part of our company!
                </h3> 

                Pls. keep in touch and check if your contact details are correct, 
                email us for corrections:
                <p><b>{{ $user->phone }}</b></p>
                <p><b>{{ $user->email }}</b></p><br>

                Please reply to this email: <b>{{ Auth::user()->email }} </b> if you have any questions or need to reschedule. We look forward to speaking with you. 
                <br><br>
                Sincerely,
                <p><strong>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }},</strong></p>
                <h3><strong>{{ Auth::user()->companyname }}</strong></h3>
            </textarea>
            <br><hr class="small">
            <div class="row">
                <div class="col">
                    <a type="button" class="rounded text-black form-control btn btn-danger mt-3" href="/home">Cancel</a>
                </div>
                <div class="col">
                    <button type="submit" class="text-black form-control btn btn-warning mt-3">Send</button>
                </div>
            </div>
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
