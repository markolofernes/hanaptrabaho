<x-header />
<div style="height:100vh" class="col-12">
  <div class="row mt-5">
    <div class="col-2"></div>
    <div class="col-8 p-5">
      <div class="card p-3 pt-4 shadow-lg">
        <a href="" style="position:absolute; right: 10px; top:10px; border-radius:100px; background: rgba(100,100,100,0.15)" type="button" onclick="window.close()">❌</a>
            @foreach ($jobposts as $jobpost)
                <div id="jobDescPanel" class="jobpanels">
                    @foreach ($users as $user)
                      @if ($jobpost->user_id == $user->id  && $user->status == 'pending')
                        <h3 class="mb-3">Pay now to publish the job posting</h3>
                        <div id="paypal-button-container"></div>
                      @endif 
                    @endforeach
                    <h4>{{ $jobpost->jobtitle }}</h4>
                    <h6>{{ $jobpost->user->companyname }}</h6> 
                    <p>{{ $jobpost->joblocation }}</p>
                @if ( Auth::user() !== null )
                    @if (Auth::user()->accounttype == 'seeker')
                    <div class="d-flex flex-row mb-3">
                        <form action="{{ route('applyjob', Auth::user()->id ) }}" method="POST">
                            @csrf
                            <input type="hidden" id="jobpost_id" name="jobpost_id" value="{{ $jobpost->id }}">
                            <input type="hidden" id="applicant_id" name="applicant_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-warning m-2 btn-sm" type="submit">✔Apply Now</button>
                        </form>
                        <form action="{{ route('savejob', Auth::user()->id ) }}" method="POST">
                            @csrf
                            <input type="hidden" id="jobpost_id" name="jobpost_id" value="{{ $jobpost->id }}">
                            <input type="hidden" id="applicant_id" name="applicant_id" value="{{ Auth::user()->id }}">
                            <button class="btn btn-warning m-2 btn-sm" type="submit">🖤 Save</button>
                        </form>
                    </div>
                    @endif
                @endif                           
                <hr>
                <div class="pb-3 jobpaneldesc tableoverflow-y">
                    <h5> Job details</h5>
                    <h6>💼 {{ $jobpost->jobtype }}</h6>
                    <h6>💵 {{ $jobpost->salary }}</h6>
                    <hr>
                    {!! $jobpost->jobdescription !!}
                    <i style="font-size:12px">Posted: {{ $jobpost->created_at->diffforhumans() }}</i>
                </div>
                <br>
            </div>                    
            @endforeach
        </div>
    </div>
    <div class="col-2"></div>
  </div>
   

@if (Auth::check())
    <script src="https://www.paypal.com/sdk/js?client-id=ATijLTD8Ekmy7GN6JzMhe6z0Uzrf5k3MjBWTxaBauVS3pTljYH976rtcdRDWDr5flhvUPWcLP9upRILh&currency=PHP" data-sdk-integration-source="button-factory"></script>
    <script>
      function initPayPalButton() {
        paypal.Buttons({
          style: {
            shape: 'rect',
            color: 'gold',
            layout: 'vertical',
            label: 'paypal',
          },
          createOrder: function(data, actions) {
            return actions.order.create({
              purchase_units: [{"description":"Publish Job Posting","amount":{"currency_code":"PHP","value":1}}]
            });
          },
          onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
            var userid = '{{ Auth::user()->id }}';
            const test = async () => {
            const response = await fetch('http://127.0.0.1:8000/api/update-user-status?userid=' + userid, { method: 'post' })
            console.log(response)
            }
            test()  
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              location.reload()
              alert("Payment successful!");
            });
          },
          onError: function(err) {
            console.log(err);
          }
        }).render('#paypal-button-container');
      }
      initPayPalButton();
    </script>
@endif
</div>