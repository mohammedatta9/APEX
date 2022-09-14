<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-lg-3">
                <img src="{{ url('/') }}/site/images/footer-logo.png" alt="telcca" class="mb-4">
                <p>TELCCA is a career-progression platform, designed to be the ultimate toolkit in which all what needed
                    to achieve greatness is found. TELCCA aims to become the ultimate journey partner and to facilitate
                    individual’s journey towards greatness.</p>
                <ul class="social-links">
                    <a href="https://www.linkedin.com/company/telcca" target="_blank"><img src="{{ url('/') }}/site/images/linkden.png" alt="linkden"></a>
                    <a href="https://www.facebook.com/telcca" target="_blank"><img src="{{ url('/') }}/site/images/facebook.png" alt="facebook"></a>
                    <a href="https://www.instagram.com/telcca" target="_blank"><img src="{{ url('/') }}/site/images/instagram.png" alt="instagram"></a>
                    <a href="https://www.youtube.com/channel/UCKxRyVpeKETvxcKVTNO8P3g" target="_blank"><img src="{{ url('/') }}/site/images/youtube.png" alt="youtube"></a>
                </ul>
            </div>
            <div class="col-sm-2 col-lg-3">
                <h5>Company</h5>
                <ul class="pages-links">
                    <a href="/JoinRequest">Let’s Collaborate </a>
                    <a href="{{ route('contactus') }}">Contact Us</a>
                    <a href="{{ route('aboutus') }}">About Us</a>
                    <a href="{{ route('articles')}}">Articles</a>
                </ul>
            </div>
            <div class="col-sm-3 col-lg-3">
                <h5>Customer Services</h5>
                <ul class="pages-links">
                    <a href="{{ route('help') }}">Help & Support </a>
                    <a href="{{ route('privacy') }}">Privacy Policy</a>
                    <a href="{{ route('terms') }}">Terms & Conditions</a>
                    <a href="{{ route('faqs') }}">FAQ</a>
                </ul>
            </div>
            <div class="col-sm-4 col-lg-3  mb-4">
                <h5>Subscribe</h5>
                <p>Stay updated and enrich your TELCCA experience with personalized newsletters</p>
                <form class="mt-3 mb-3" method="post" id="nl_form">
                    <input type="text" name="nl_email" id="nl_email" placeholder="Email Address">
                    <input type="button" id="send_newsletter" value="SEND" />
                </form>
                <div id="nl_msg"></div>
                <small class="mt-3">Your email ID is Confidential</small>
            </div>
        </div>
        <div class="copyright">
            Copyrights © All Rights Reserved By <span style="font-family:Roboto-Regular;">TELCCA</span>
        </div>
    </div>
</footer>

<div class="modal fade" id="company-institution-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document" style="    max-width: 361px;">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Register As</h4>
            </div>
            <div class="modal-body form-style">
                <form>
                    <div class="row">
                        <div class="col-lg-12">
                            <select class="w-100 p-1" id="registeras">
                                <option value="register/learner"> As Learner</option>
                                <option value="JoinRequest">As Coach</option>
                                <option value="JoinRequest">As Mentor</option>
                                <option value="register/company">As Company</option>
                                <option value="register/institution">As Institution</option>
                            </select>
                        </div>
                        <div class="col-sm-12 col-lg-12 text-center submit-btn">
                            <a href="" id="register" class="btn-style changelink2">Next</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    const userId = "{{Auth::id()}}"
    
</script>



 <x:notify-messages />
 <script src="{{ asset('/js/app.js')}}" ></script>


<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
<script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/datepicker.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/air-datepicker/2.2.3/js/i18n/datepicker.en.js'></script>




<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/site/js/owl.carousel.js"></script>
<script src="{{ url('/') }}/site/js/calender.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script defer src="{{ url('/') }}/site/js/custom.js?<?=time()?>"></script>
<script defer src="{{ url('/') }}/site/js/notify.js?<?=time()?>"></script>
{{--@notifyJs--}}

@stack('js')
        <script>

            $('#register').on('click' , function (e) {
               e.preventDefault();
                window.location.replace($('#registeras').val());

            });
            function isValidEmailAddress(emailAddress) {
                var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
                return pattern.test(emailAddress);
            };

            $('#send_newsletter').on('click' , function(e){
                e.preventDefault();
               // alert('ff');
                if(isValidEmailAddress($('#nl_email').val())==false){
                    $("#nl_form").css('border-color' , 'red');
                    return false;
                }
                $.ajax({
                    type: "POST",
                    url: '{{ route('save_nl') }}',
                    data: {
                        _token: '{{ csrf_token() }}',
                        email: $('#nl_email').val()
                    },

                    success:function(data){
                        $("#nl_form").css('border-color' , '#0094fb');
                        $("#nl_email").val('');
                       $('#nl_msg').html(data);



                    }
                });
            });



        </script>
        
</body>

</html>