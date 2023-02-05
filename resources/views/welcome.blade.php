@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="dsplyswitch">
            <center>
                <img class="img-fluid mainImgMxSz object-fit-contain border rounded shadow-lg mb-5 bg-body-tertiary"
                    src="mainimg.webp" alt="pinyotrabaho">
            </center>
        </div>
        <div class="">
            <form action="">
                @csrf
                <input class="inputSearchBars form-select-lg form-select mb-3" list="JobLists" id="exampleDataList"
                    placeholder="Search for jobs...">
                <datalist id="JobLists">
                    <option value="Urgent Hiring">
                    <option value="Office Staff">
                    <option value="Work From Home">
                    <option value="Part Time">
                    <option value="Encoder">
                    <option value="Non Voice Work From Home">
                    <option value="Direct Hiring">
                    <option value="Part Time Work From Home">
                    <option value="Job Hiring">
                </datalist>

                <input class="inputSearchBars form-select-lg form-select mb-3" list="Places" id="exampleDataList"
                    placeholder="Where...">
                <datalist id="Places">
                    <option value="Manila">
                    <option value="Cavite">
                    <option value="Quezon City">
                    <option value="Las Piñas">
                    <option value="Bacoor, Cavite">
                    <option value="Muntin Lupa">
                    <option value="Alabang">
                    <option value="Parañaque City">
                    <option value="Taguig">
                    <option value="Makati">
                    <option value="Pasig City">
                    <option value="Pasay City">
                </datalist>
                {{-- <div class="row">
                    <div class="col">
                        <select class="form-select-lg form-select mb-3" aria-label=".form-select-sm">
                            <option selected>Date Posted</option>
                            <option value="24hrs">Last 24 Hours</option>
                            <option value="3days">3 days ago</option>
                            <option value="7days">1 week ago</option>
                            <option value="14days">2 weeks ago</option>
                        </select>
                    </div>
                    <div class="col">
                        <select class="form-select-lg form-select mb-3" aria-label=".form-select-sm">
                            <option selected>Job Type</option>
                            <option value="Full-Time">Full Time</option>
                            <option value="Permanent">Permanent</option>
                            <option value="New-Grad">New-Grad</option>
                            <option value="Contract">Contract</option>
                            <option value="Internship">Internship</option>
                            <option value="Part-Time">Part Time</option>
                            <option value="Temporary">Temporary</option>
                        </select>
                    </div>
                </div> --}}
                <button class="btn btn-primary form-control">Search Jobs</button>
            </form><br>
            <center>
                <a href="#">Upload your resume and post it!</a><br><br>
            </center>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="col-1"></div>
        <div class="col-10 card p-3">
            <h3 class="text-center pt-2">Job feeds</h3>
            <div class="row">
                <div class="col-4 jobtableoverflow-y">
                    @foreach ($jobposts as $jobpost)
                        <div class="card p-3 mx-1 my-5 shadow-lg">
                        <h5>{{ $jobpost->jobtitle }}</h5>
                        <h6><i>{{ $jobpost->user->companyname }}</i></h6><hr class="hrsmall">
                            <p>{{ $jobpost->joblocation }}</p>
                            <p class="small">{{ $jobpost->jobtype }}</p><hr class="hrsmall">
                            <p class="small"> {{ $jobpost->salary }}</p>
                            <span class="capsule">LARAVEL PHP JAVASCRIPT HTML CSS SCSS REACT VITE LIVEWIRE</span>
                            <hr class="hrsmall"><a href="#">Job Description-></a> 
                        </div>
                    @endforeach
                    <div class="card p-3 mx-1 my-5 shadow-lg">
                        <h5>Full Stack Web Developer</h5>
                        <h6><i>Microsoft Corporation</i></h6><hr class="hrsmall">
                        <p class="small">Work from Home</p><hr class="hrsmall">
                        <span class="capsule">LARAVEL PHP JAVASCRIPT HTML CSS SCSS REACT VITE LIVEWIRE</span>
                    </div>
                </div>

                <div class="col-8">
                    <div id="jobDescPanel" class="jobpanel shadow-lg">
                    <img class="employerlogo" src="https://logodownload.org/wp-content/uploads/2021/08/microsoft-teams-logo-2.png" alt="">

                    <h4>Full Stack Developer (WordPress/PHP/JS/React/Vue)- job post</h4>
                    <h6>Rymera Web Co</h6> 
                    <p> Philippines • Remote</p>
                    <button class="btn btn-warning mx-2">Apply Now</button><button class="btn btn-warning mx-2">🖤 Save</button>
                    <hr>
                        <div class="jobpaneldesc tableoverflow-y">
                        <h5> Job details</h5>
                        <h6>💼 Job Type</h6>
                        <p>Full-time / Permanent / Remote</p> 
                        <h6>⏲ Shift and Schedule</h6>
                        <p> Monday to Friday</p>
                        <hr>

                        <h5>Qualifications</h5>
                        <p>WordPress: 3 years (Required)</p> 
                        <hr>

                        <div class="h4">Full Job Description</div> 

                        <p>We're looking for an...</p>

                        <b>Experienced WordPress PHP/JS/React/Vue Developer</b>
                        <p>
                        Do you have experience writing WordPress plugins? Love PHP and Javascript?

                        We’re growing and looking for a top notch developer to join our team.

                        You’ll be creating new features, improving code, squashing bugs, and helping us iterate on our much loved e-commerce tools.

                        If you want to work on a codebase that’s actively used by over 50,000+ WooCommerce stores worldwide, then read on!
                        </p>
                        <b>Interested?</b> See “How To Apply” below to learn more:

                        <h6>We’re looking for someone with these qualities:</h6>
                        <ul>
                            <li>
                            An excellent communicator – fluent in English, but also taking technical concepts and making them understandable. We believe that great communication is critical to success.
                            </li>
                            <li>
                            An attention to detail – you don’t let things through the cracks.
                            </li>
                            <li>
                            Passionate – you LOVE WordPress and are excited to work on something that will affect literally thousands of real e-commerce businesses.
                            </li>
                            <li>
                            A team player – comfortable working alongside and helping other developers.
                            </li>
                            <li>
                            An engineer – you understand that software engineering is more than just wrangling code, it’s the planning and the thought behind the code that counts too.
                            </li>
                            <li>
                            A self-starter – keen for a technical challenge, open to learning new things, and happy jumping between front-end and back-end development working on tasks of all sizes.
                            </li>
                        </ul><br>
                        <h5>If this describes you, then read on!</h5>

                        <h6>Regular Work Tasks:</h6>
                        <p>Here’s some of the regular things you’ll do in your day-to-day:</p>

                            <ul>
                                <li>
                                    Writing project briefs – when you get a project, you’ll be the one writing up the approach and telling us your plan of attack.
                                </li>
                                <li>
                                    Working with the backlog – setting up sprints, triaging bugs, and scoping enhancements.
                                </li>
                                <li>
                                    Making release dates – working with your team mates, testers, and management to ensure releases go out on time.
                                </li>
                                <li>
                                    Refactoring – sometimes you’ll need to work with legacy code and pay particular attention to backwards compatibility
                                </li>
                                <li>
                                    Future proofing – we want you to put your stamp on your contribution, the work you do will be around for years to come.
                                </li>
                                <li>
                                    Code reviews and PRs – we’re growing our teams and part of that means mentoring and reviewing your fellow developers in the ways of great software development.
                                </li>
                                <li>
                                We use a number of languages including PHP, vanilla JS, jQuery, and ReactJS.
                                </li>
                            </ul><br>
                        <h5>Must Have Skills:</h5>
                        <p>
                            Here’s a list of must have skills. Please apply if you have these as it means you’re likely a good fit for the role.
                        </p>
                            <ul>
                                <li>
                                    Professional experience working with WordPress and/or WooCommerce specifically doing plugin or theme development work (we’re after someone to hit the ground running).
                                </li>
                                <li>
                                    Great PHP knowledge including best practices (OOP, autoloading, namespacing, interfaces, etc).
                                </li>
                                <li>
                                    SQL writing skills, especially as it pertains to MySQL and using SQL queries within WordPress.
                                </li>
                                <li>
                                    Ability to code vanilla Javascript neatly.
                                </li>
                                <li>
                                    Ability to code jQuery neatly.
                                </li>
                                <li>
                                    Experience working with and creating APIs (eg. WooCommerce/WordPress API, Drip, Zapier, Stripe, etc).
                                </li>
                                <li>
                                    Version control experience, specifically Git on Github.
                                </li>
                            </ul>

                        <h6>Desirable Extra Skills:</h6>
                        <p>It would be great if you also had any of the following, it will set you apart from the pack:</p>
                        <ul>
                            <li>
                                Experience with any modern JavaScript development tools (TypeScript, React, VueJS, Angular). In particular, we use React and Typescript so those are very desirable.
                            </li>
                            <li>
                                Familiarity with package managers such as Composer/NPM.
                            </li>
                            <li>
                                Previous experience working remotely or freelance.
                            </li>
                            <li>
                                Experience with Docker. Most of us use Docker for our development environments.
                            </li>
                        </ul><br>
                        <h5>What We Offer</h5>
                        <small>
                            Our company is fast-growing. We’re looking to make key hires to move even faster.

                            This is a great opportunity to join a growing team of smart and enthusiastic people who believe in the mission of democratising e-commerce for even the smallest players.

                        <br><b>Here’s what we offer:</b> 
                        <ul>
                            <li>
                                Competitive salary – paid promptly into your bank account in your own currency with no third party fees or international conversion.
                            </li>
                            <li>
                                Private health care – once past your probation period full-time employees get paid with a local health company in your country.
                            </li>
                            <li>
                                Work remotely – our company is based in Australia but is spread out all over the world, mostly in the south east Asia region.
                            </li>
                            <li>
                                Vacation leave – once past your probation period full-time employees get paid vacation leave. We encourage employees to take the time they need to stay healthy, and to spend time with family.
                            </li>
                            <li>
                                Sick leave – once you’re pas your probation period full-time employees enjoy unlimited sick leave days.
                            </li>
                            <li>
                                Extra days off – get a paid day off on your birthday every year. Plus extra paid time for special days you might celebrate such as Easter/Eid, Christmas, and New Year.
                            </li>
                            <li>
                                Paid maternity/paternity leave – once past your probation period full-time employees get access to paid maternity and paternity leave.
                            </li>
                            <li>
                                Professional development – we happily provide access to courses to interested staff to promote continued learning. We also conduct regular internal training and mentoring.
                            </li>
                            <li>
                                Company laptop on your 5th year anniversary – on your 5th year anniversary with us we’ll buy you a brand new laptop.
                            </li>
                            <li>
                                Company travel – we do a paid all-company retreat each year. Now that travel is opening up, we’ll be going back to doing this in-person so you can meet all your teammates.
                            </li>
                        </ul>
                        </small>
                        <h6>Location & Other Requirements</h6>
                        <p>
                            This is a remote position – our team is spread out all over the world.
                            The company is based in Brisbane, Australia so company operating hours are 9am to 5pm AEST (UTC +10).
                            While you don’t have to cover that exact timezone, you must be available during a portion of the day for meetings & work assignments. We also have regular team meetings at set times that you must attend.
                        </p>
                        <h6>Other Requirements</h6>
                        <ul>
                            <li>
                                Bring your own modern laptop or desktop computer system.
                            </li>
                            <li>
                                Ability to run any required development tools, local servers, etc.
                            </li>
                            <li>
                                Preferably using Windows 10/11, MacOS, or Linux.
                            </li>
                            <li>
                                Fast broadband internet connection & a backup wireless/mobile internet connection.
                            </li>
                            <li>
                                A webcam and quiet place to work – the team frequently conducts video and screenshare meetings throughout our work.
                            </li>
                            <li>
                                Inclusion StatementAt Rymera Web Co, we strive to have the broadest possible view of diversity, going beyond visible differences to include the background, experiences, skills, and perspectives that make each person unique. We are proud to be an equal opportunity workplace and are committed to equal employment opportunity regardless of race, color, ancestry, religion, sex, national origin, sexual orientation, age, citizenship, marital status, disability, gender identity, Veteran status, or any other basis protected by federal, state, or local law.
                            </li>
                        </ul>
                        <center>
                        ****** How To Apply? *****
                        <br>
                        </center>
                        <p>
                        If this sounds like a great fit for you, then please submit your application and cover letter.
                        Please clearly include the following information in your cover letter/application:
                        </p>
                        <ul>
                            <li>
                            Demonstrate/explain your WordPress/WooCommerce development experience
                            </li>
                            <li>
                            Demonstrate/explain your PHP & JS experience
                            </li>
                            <li>
                            Code samples – show us any open source projects, plugins/themes you’ve written, anything that you feel shows off your skills. This code will be used only for evaluation purposes.
                            </li>
                            <li>
                            Tell us a bit about yourself. Why should you be considered for the role? Details about your experience, qualifications, & personality are very helpful.
                            </li>
                            <li>
                            Your profile links if available (Personal website, Github, Twitter, Facebook, LinkedIn, etc).
                            </li>
                        </ul>
                        <p>
                        &emsp; Don’t forget to proofread your application before submitting. Check for spelling, capitalization, etc. This is your chance to make your application stand out from the crowd.
                        Unfortunately we won’t be able to individually respond to each and every application, but if we feel you are a strong match, someone will be in touch with you shortly.
                        </p>
                        Thanks and we look forward to hearing from you!
                        <hr>
                        <h6>Job Types: Full-time, Permanent</h6>
                        <strong>Salary: Php80,000.00 - Php120,000.00 per month</strong><br><br>
                        <h6>Benefits:</h6>
                        <ul>
                            <li>
                            Company Christmas gift
                            </li>
                            <li>
                            Company events
                            </li>
                            <li>
                            Flexible schedule
                            </li>
                            <li>
                            Pay raise
                            </li>
                            <li>
                            Work from home
                            </li>
                            <li>
                                Schedule:
                                <p>( Monday to Friday )</p> 
                            </li>
                        </ul>


                        Supplemental pay types:

                        13th month salary
                        <hr>
                        <strong>Experience:</strong>
                        <ul>
                            <li>
                                WordPress: 3 years (Required)
                            </li>
                            <li>
                                Hiring Insights
                            </li>
                            <li>
                                Hiring 2 candidates for this role
                            </li>
                        </ul>
                        <h5>Job activity</h5>
                        <small>
                        <p>Employer reviewed job 4 days ago</p>
                        <i>Posted 30+ days ago</i>
                        </small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <div class="col-1"></div>
</div>
@endsection