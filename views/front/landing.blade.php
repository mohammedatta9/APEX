@extends('layouts.main')

@section('content')
<style type="text/css">
        header {
            background-color: #0d1b26;
            color: #fff;
            padding: 10px 0;
        }

        .hide-element {
            display: none;
        }

        .notificaton-icon,
        .avater {
            display: inline-block;
        }

        body {
            background-color: #fff;
        }

        .move-right {
            padding-left: 0;
        }

        .col-sm-12.col-lg-12.order-one.pt-5 {
            text-align: left;
        }

        h2.blue-color.mt-3.mb-3.pt-2 {
            font-size: 23px;
        }

        .col-sm-12.col-lg-12.order-one.pt-5 h3 {
            font-size: 21px;
        }

        ul.user-information.text-center {
            border: solid 1px #Ddd;
            width: 100%;
            text-align: left !important;
            padding: 26px;
            border-radius: 10px;
        }

        .border-data-user-information {
            border-bottom: solid 1px #ddd;
            margin-bottom: 13px;
        }

        span.span-data-user {
            margin-left: 25px;
        }
        .banner-section .journey-step a {
          border: solid 1px #00e8b8;
          border-radius: 10px;
          display: block;
          margin: 0 0 15px 0;
          color: #fff;
          padding: 8px 23px;
          font-size: 17px;
        }
        .banner-section .journey-step a:hover {
          background-color: #00e8b7;
        }
    </style>


<!---------------- banner section --------------------->
<section class="filter-mentor bg-white p-0">
<div class="banner-section text-white">
    <div class="container position-relative ">
    <div class="row justify-content-md-center">
        <div class="start-journey" style="width: 90%;">
            <h1 class="text-uppercase mb-3"> WHAT WOULD YOU LIKE TO IMPROVE IN YOUR CAREER LIFE?</h1>
            <div class="journey-step" >
               
                    <div class="row justify-content-md-center">
                        
                        <div class="col-sm-3 col-lg-3">
                            <a @if(auth()->user() ) href="{{ route('coaches') }}" @else href="#section1" data-toggle="modal" @endif style="color: #0d1b26;">
                            I’m still starting my career life and I want to discover my goals & build a plan.<br>&#160; 
                           </a>
                        </div> 
                        <div class="col-sm-3 col-lg-3">
                        <a @if(auth()->user() ) href="{{ route('coaches') }}" @else  href="#section2" data-toggle="modal" @endif  style="color: #0d1b26;">
                          I’m unemployed and I need some expert career guidance to get the job I like.
                           </a>
                        </div> 
                        <div class="col-sm-3 col-lg-3">
                        <a @if(auth()->user() ) href="{{ route('coaches') }}" @else href="#section3" data-toggle="modal" @endif  style="color: #0d1b26;">
                        I don’t have a clear career direction, and I don’t know how to choose one.<br> &#160;
                           </a>
                        </div> 
                        <div class="col-sm-3 col-lg-3">
                        <a @if(auth()->user() ) href="{{ route('mentors') }}" @else href="#section4" data-toggle="modal" @endif  style="color: #0d1b26;">
                        I want a career change, maybe into a new industry, but don’t know how to do it.
                           </a>
                        </div> 
                        <div class="col-sm-3 col-lg-3">
                        <a @if(auth()->user() ) href="{{ route('mentors') }}" @else href="#section5" data-toggle="modal" @endif  style="color: #0d1b26;">
                        I’m stuck in some of my career goals, and I want to develop in my career life.
                           </a>
                        </div> 
                        <div class="col-sm-3 col-lg-3">
                        <a @if(auth()->user() ) href="{{ route('participate') }}" @else href="#section6" data-toggle="modal" @endif  style="color: #0d1b26;">
                        I want to expand my network and connect with like-minded professionals.

                           </a>
                        </div> 
                        <div class="col-sm-3 col-lg-3">
                        <a @if(auth()->user() ) href="{{ route('quizzes') }}" @else href="#section7" data-toggle="modal" @endif  style="color: #0d1b26;">
                        I want to access real-life career opportunities, courses, internships, and meetups.
                           </a>
                        </div> 
                        <div class="col-sm-3 col-lg-3">
                        <a @if(auth()->user() ) href="{{ route('communities') }}" @else href="#section8" data-toggle="modal" @endif  style="color: #0d1b26;">
                        I want to discover my true skills, talents, and gain a real estimation of my abilities.
                           </a>
                        </div> 
                        <div class="col-sm-3 col-lg-3">
                        <a @if(auth()->user() ) href="{{ route('contactus') }}" @else href="#section9" data-toggle="modal" @endif  style="color: #0d1b26;">
                        None of these options fit your need? Click here and we will help you out!
                           </a>
                        </div> 
                       
                    </div>
            </div>
        </div>
      </div>
    </div>
</div>
<!---------------- text section --------------------->
 

<div class="modal fade" id="section1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/plan.png" alt="plan">
                    </div>
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25"> Get All the Guidance You Need to Launch a Successful Career Journey
                        </h3>
                        <p>You might be a fresher, a new graduate, or maybe lacking clarity when it
                            comes to you career life, what you want, how to start, and what are your best
                            career options that are aligned with your skills, your knowledge, your education, your
                            circumstances, and your passion.</p>
                                <p>The best favor you can give to yourself at this new
                            phase of your life is to find a coach who can guide you step-by-step, give you the
                            tips & tricks, and put you on the right track of YOUR unique career journey!
                            </p> 
                            
                            <a href="register/learner ?page= coaches" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 

<div class="modal fade" id="section2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                    
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25">Hunt the Job You’ve Always Wanted with the Guidance of a Career Coach
                        </h3>
                        <p>If you are mostly doing it on your own, it could be a tricky situation to try to
                                figure out why your job searching formula isn’t actually working, and what is this
                                exact mistake you are making that is standing between you and your dream job.
                                Getting more interviews, job offers, and finally getting hired, is a long complex
                                process that needs both self-development, career understanding, and some serious
                                planning.</p>
                                                            <p>. How to effectively speed up this process? Match yourself with a career
                                coach so you can finally design together a personalized job hunting plan, today!

                                                        </p> 
                            
                            <a href="register/learner ?page= coaches" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>
                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/mentor.png" alt="plan">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 

<div class="modal fade" id="section3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/a1.jpeg" alt="plan">
                    </div>
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25">  Become Closer to Your Destined Career by Discovering Yourself & Your Talents
                        </h3>
                        <p>Sometimes we get lost between what we want, what is the demand, who we
                            are, and where we actually end up! If you feel like you are the wrong person in the
                            wrong place doing the wrong thing, or just can’t feel satisfied with any of the options
                            available for you, then perhaps it is time to talk to an expert before making any BIG
                            decisions.</p>
                                                            <p>Our coaches can definitely help you break this depressing cycle by
                            aligning your career life with your true passion using a personalized strategic eyeopening process!

                                                        </p> 
                            
                            <a href="register/learner ?page= coaches" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 

<div class="modal fade" id="section4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                    
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25"> Get All Your Questions Answered & Your Career Change Planned with a Mentor
                        </h3>
                        <p>Changing by itself is a confusing process, let alone changing your whole career
                        to a new industry.</p>
                                                        <p>Instead of wasting time and effort, trying to discover the correct
                        strategy of how to balance your current career life while transitioning safely to a new
                        industry, a new field, or a new job title, we encourage you to NOT do it all alone,
                        and instead connect with a mentor with years of inside and outside experience &
                        knowledge in this new field you are entering so you can finally develop a realistic
                        career change plan that actually works!
                            </p> 
                            
                            <a href="register/learner ?page= mentors" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>
                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/a2.jpeg" alt="plan">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 

<div class="modal fade" id="section5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                   
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25"> Reach the Next Level of Your Career Life & Goals by Getting Yourself a Mentor
                        </h3>
                        <p>You already got a list of detailed career & personal goals and have already
                            achieved a good number of them, and your career situation is really great, but you
                            are aspiring for more and you are not developing as much as you desire.</p>
                                                            <p>Maybe it is
                            time to ask for some next-level help? Imagine how transformative it would be if you
                            could access the advice of an expert who has already reached this next level you are looking for.
                            </p> <p>Speed up your career progression by starting a professional
                                mentoring relationship today!
                                </p>
                            
                            <a href="register/learner ?page= mentors" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>
                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/quiz.png" alt="plan">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 

<div class="modal fade" id="section6" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/community.png" alt="plan">
                    </div>
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25"> Join a Community of Like-Minded Professionals & Start Networking Today
                        </h3>
                        <p>You might be able to do EVERYTHING alone with some years and patience, but
                            would it be as fun and enriching of an experience as having a community of likeminded people who will celebrate your success with you in the end? Having a
                            community of people whom you share with your most precious goals is definitely a
                            great way to expand your access to professional relationships, career-life
                            experience, as well as encouragement. </p>
                                    <p> Whether you join or build a new community,
                            to chat or to even start a business together, we all need some friends along the
                            journey!
                                </p> 
                            
                            <a href="register/learner ?page= participate" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 

<div class="modal fade" id="section7" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                    
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25"> Enrich Your Resume & Turn Your Theoretical Knowledge into Real Experience
                        </h3>
                        <p>Building up your C.V with a strong list of professional, vocational, and careerrelated experience will 100% transform your whole career life and will give a boost to
                            your next job application.</p>
                                                            <p>But even more personally, such opportunities increase
                            your self-confidence in your career abilities and move you ahead of everyone else
                            with the help of the latest knowledge and the cutting-edge practices in your field. 
                                                        </p> <p> Joining seminars, workshops, meetups, courses, internships, programs, and projects
                            will set you apart from those who say “we can do it” and those who “can actually
                            do it”!</p>
                            
                            <a href="register/learner ?page= quizzes" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>
                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/a3.jpeg" alt="plan">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 

<div class="modal fade" id="section8" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/a4.jpeg" alt="plan">
                    </div>
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25"> Discover Yourself, Your Strengths & Weaknesses with Our Free Fun Quizzes
                        </h3>
                        <p>Gain a quick, but surprisingly accurate, estimation of who you are in life and
                            career, what should you do, where should you go, and what exactly are your
                            natural talents and unique features so you can cultivate them into your selfactualization journey.</p>
                                            <p>Check out our FREE Arabic & English collection of quick, easy,
                            and fun career, life, and personality quizzes and exercises designed by experts &
                            coaches from all over the world! Sign up now to access the quizzes & exercises you
                            like and then share your results with your friends and colleagues!
                                        </p> 
                            
                            <a href="register/learner?page= communities" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 

<div class="modal fade" id="section9" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document" style="max-width: 950px;">
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-style">
            <div class="container">
            
                <div class="row">
                   
                    <div class="col-sm-6 col-lg-6 my-auto set-font">
                        <h3 class="mb-3 text-uppercase font-25"> Book a Phone Call with Our TELCCA Team & Let Us Get Back to You with Help

                        </h3>
                        <p>If you think your problem is not anything of what we have listed,</p>
                                <p> then feel free
                                to contact us and we will get back to you to schedule a 15-minute free discovery
                                phone call to assess your personal needs so you can have a better idea of how to
                                use TELCCA the best you can to solve the problems you have or gain the value you
                                desire. 
                                                        </p> <p>Also, you can totally skip choosing any option, including this one, and just
                                start navigating our TELCCA platform using the menu above.</p>
                            
                            <a href="register/learner ?page= contactus" class="btn-style mt-4">Sign Up & Let’s Get Started!</a>

                            
                    </div>

                    <div class="col-sm-6 col-lg-6 my-auto">
                        <img src="{{ url('/') }}/site/images/a5.jpeg" alt="plan">
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> </div> 
<!---------------- text section --------------------->
    </section>
<!--<div class="text-center empowered">-->
<!--    empowered authentic work ecosystem-->
<!--</div>-->

@endsection
@push('js')
 @endpush