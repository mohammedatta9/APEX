@extends('layouts.main') @section('content')

<style type="text/css">
 header{
 	background-color: #0d1b26;
 	color: #fff;
 	padding: 10px 0;
 }
 .hide-element{
 	display: none;
 }
.notificaton-icon, .avater {
    display: inline-block;
}
 
</style>

<!---------------- banner section --------------------->

<div class="bg-white align-items-center padding-top about-col position-relative terms-col support-col collaborate-col">
	<div class="horizental-line"></div>
	<div class="mentor-searcg-wrapper pl-0">
		<h5>Let’s Collaborate  </h5>
		<h1>Join TELCCA as a Mentor or as a Coach </h1>
	</div>
</div>


<section class="wizard-section pt-0 bg-white collaborate pb-3">
    <div class="container">
      <div class="row no-gutters">
          <h6 class="blue-color" style="text-transform: capitalize;">Dear Mentor/ Coach, we are so glad you have considered TELCCA,
              welcome! </h6>
        <div class="col-lg-12 col-md-12">
            <div class="form-wizard">
            @include('layouts.success') @include('layouts.error')
            <form action="{{ route('JoinRequest.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
                    <div class="form-wizard-header">
                        <ul class="list-unstyled form-wizard-steps clearfix">
                            <li class="active"><h1>Join type</h1><span>1</span></li>
                            <li><h1>Personal information</h1><span>2</span></li>
                            <li><h1>Experience</h1><span>3</span></li>
                        </ul>
                    </div>
                    <fieldset class="wizard-fieldset show">
                        <div class="form-group">
                            Join as
                            <div class="wizard-form-radio">
                                <input name="type" id="radio1" type="radio" value="mentor" class="wizard-required" checked required>
                                <label for="radio1" >Mentor</label>
                            </div>
                            <div class="wizard-form-radio">
                                <input name="type" id="radio2" type="radio" value="coach" class="wizard-required" required>
                                <label for="radio2">Coach</label>
                            </div>
                           
                        </div>
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                        </div>
                    </fieldset>	
                    <fieldset class="wizard-fieldset ">
                        <div class="row">
                            <div class="col-sm-4 col-lg-4  pl-0 ">
                                    <label>First Name</label>
                                    <input type="text" name="first_name" maxlength="60" class=" wizard-required" id="fname" >
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Middle Name</label>
                                    <input type="text" maxlength="60" name="middle_name" class=" wizard-required" >
                                    <div class="wizard-form-error"></div>
                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Last Name</label>
                                    <input type="text" maxlength="60" name="last_name" class=" wizard-required" >
                                </div>

                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Date of Birth</label>
                                    <input type="date" name="Date_Birth" max="2010-1-1" >
                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Nationality</label>
                                    <select name="Nationality" class="wizard-required">
                                    @foreach ($co as $c)
                                        <option value="{{ $c->id }}">{{ $c->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
{{--                                <div class="col-sm-4 col-lg-4  pl-0">--}}
{{--                                    <label>Visa Status</label>--}}
{{--                                    <select name="visa_status">--}}
{{--                                        <option value="1">Active</option>--}}
{{--                                        <option value="0">In-active</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
{{--                                <div class="col-sm-4 col-lg-4  pl-0">--}}
{{--                                    <label>Visa Expire Date</label>--}}
{{--                                    <input  type="date" name="visa_ex_date">--}}
{{--                                </div>--}}
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Gender</label>
                                    <select name="gender" class="wizard-required">
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Phone #</label>
                                    <input type="text" name="Phone" class="wizard-required"  maxlength="15" placeholder="+971 50 000 0000" required>
                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Email</label>
                                    <input type="email" class="wizard-required" name="Email">
                                </div>
                        </div>
                        <div class="form-group clearfix">
                            <a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
                            <a href="javascript:;" class="form-wizard-next-btn float-right">Next</a>
                        </div>
                    </fieldset>	
                    <fieldset class="wizard-fieldset">
                        <div class="row">
                            <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Languages</label>
{{--                                    <input type="text" maxlength="60"name="languages" placeholder="Arabic/ English/ Russian" class=" wizard-required" required  >--}}


                                <select id="languages" name="languages" class="wizard-required">
                                    <option>Select Language</option>
                                    <option value="af">Afrikaans</option>
                                    <option value="sq">Albanian - shqip</option>
                                    <option value="am">Amharic - አማርኛ</option>
                                    <option value="ar">Arabic - العربية</option>
                                    <option value="an">Aragonese - aragonés</option>
                                    <option value="hy">Armenian - հայերեն</option>
                                    <option value="ast">Asturian - asturianu</option>
                                    <option value="az">Azerbaijani - azərbaycan dili</option>
                                    <option value="eu">Basque - euskara</option>
                                    <option value="be">Belarusian - беларуская</option>
                                    <option value="bn">Bengali - বাংলা</option>
                                    <option value="bs">Bosnian - bosanski</option>
                                    <option value="br">Breton - brezhoneg</option>
                                    <option value="bg">Bulgarian - български</option>
                                    <option value="ca">Catalan - català</option>
                                    <option value="ckb">Central Kurdish - کوردی (دەستنوسی عەرەبی)</option>
                                    <option value="zh">Chinese - 中文</option>
                                    <option value="zh-HK">Chinese (Hong Kong) - 中文（香港）</option>
                                    <option value="zh-CN">Chinese (Simplified) - 中文（简体）</option>
                                    <option value="zh-TW">Chinese (Traditional) - 中文（繁體）</option>
                                    <option value="co">Corsican</option>
                                    <option value="hr">Croatian - hrvatski</option>
                                    <option value="cs">Czech - čeština</option>
                                    <option value="da">Danish - dansk</option>
                                    <option value="nl">Dutch - Nederlands</option>
                                    <option value="en">English</option>
                                    <option value="en-AU">English (Australia)</option>
                                    <option value="en-CA">English (Canada)</option>
                                    <option value="en-IN">English (India)</option>
                                    <option value="en-NZ">English (New Zealand)</option>
                                    <option value="en-ZA">English (South Africa)</option>
                                    <option value="en-GB">English (United Kingdom)</option>
                                    <option value="en-US">English (United States)</option>
                                    <option value="eo">Esperanto - esperanto</option>
                                    <option value="et">Estonian - eesti</option>
                                    <option value="fo">Faroese - føroyskt</option>
                                    <option value="fil">Filipino</option>
                                    <option value="fi">Finnish - suomi</option>
                                    <option value="fr">French - français</option>
                                    <option value="fr-CA">French (Canada) - français (Canada)</option>
                                    <option value="fr-FR">French (France) - français (France)</option>
                                    <option value="fr-CH">French (Switzerland) - français (Suisse)</option>
                                    <option value="gl">Galician - galego</option>
                                    <option value="ka">Georgian - ქართული</option>
                                    <option value="de">German - Deutsch</option>
                                    <option value="de-AT">German (Austria) - Deutsch (Österreich)</option>
                                    <option value="de-DE">German (Germany) - Deutsch (Deutschland)</option>
                                    <option value="de-LI">German (Liechtenstein) - Deutsch (Liechtenstein)</option>
                                    <option value="de-CH">German (Switzerland) - Deutsch (Schweiz)</option>
                                    <option value="el">Greek - Ελληνικά</option>
                                    <option value="gn">Guarani</option>
                                    <option value="gu">Gujarati - ગુજરાતી</option>
                                    <option value="ha">Hausa</option>
                                    <option value="haw">Hawaiian - ʻŌlelo Hawaiʻi</option>
                                    <option value="he">Hebrew - עברית</option>
                                    <option value="hi">Hindi - हिन्दी</option>
                                    <option value="hu">Hungarian - magyar</option>
                                    <option value="is">Icelandic - íslenska</option>
                                    <option value="id">Indonesian - Indonesia</option>
                                    <option value="ia">Interlingua</option>
                                    <option value="ga">Irish - Gaeilge</option>
                                    <option value="it">Italian - italiano</option>
                                    <option value="it-IT">Italian (Italy) - italiano (Italia)</option>
                                    <option value="it-CH">Italian (Switzerland) - italiano (Svizzera)</option>
                                    <option value="ja">Japanese - 日本語</option>
                                    <option value="kn">Kannada - ಕನ್ನಡ</option>
                                    <option value="kk">Kazakh - қазақ тілі</option>
                                    <option value="km">Khmer - ខ្មែរ</option>
                                    <option value="ko">Korean - 한국어</option>
                                    <option value="ku">Kurdish - Kurdî</option>
                                    <option value="ky">Kyrgyz - кыргызча</option>
                                    <option value="lo">Lao - ລາວ</option>
                                    <option value="la">Latin</option>
                                    <option value="lv">Latvian - latviešu</option>
                                    <option value="ln">Lingala - lingála</option>
                                    <option value="lt">Lithuanian - lietuvių</option>
                                    <option value="mk">Macedonian - македонски</option>
                                    <option value="ms">Malay - Bahasa Melayu</option>
                                    <option value="ml">Malayalam - മലയാളം</option>
                                    <option value="mt">Maltese - Malti</option>
                                    <option value="mr">Marathi - मराठी</option>
                                    <option value="mn">Mongolian - монгол</option>
                                    <option value="ne">Nepali - नेपाली</option>
                                    <option value="no">Norwegian - norsk</option>
                                    <option value="nb">Norwegian Bokmål - norsk bokmål</option>
                                    <option value="nn">Norwegian Nynorsk - nynorsk</option>
                                    <option value="oc">Occitan</option>
                                    <option value="or">Oriya - ଓଡ଼ିଆ</option>
                                    <option value="om">Oromo - Oromoo</option>
                                    <option value="ps">Pashto - پښتو</option>
                                    <option value="fa">Persian - فارسی</option>
                                    <option value="pl">Polish - polski</option>
                                    <option value="pt">Portuguese - português</option>
                                    <option value="pt-BR">Portuguese (Brazil) - português (Brasil)</option>
                                    <option value="pt-PT">Portuguese (Portugal) - português (Portugal)</option>
                                    <option value="pa">Punjabi - ਪੰਜਾਬੀ</option>
                                    <option value="qu">Quechua</option>
                                    <option value="ro">Romanian - română</option>
                                    <option value="mo">Romanian (Moldova) - română (Moldova)</option>
                                    <option value="rm">Romansh - rumantsch</option>
                                    <option value="ru">Russian - русский</option>
                                    <option value="gd">Scottish Gaelic</option>
                                    <option value="sr">Serbian - српски</option>
                                    <option value="sh">Serbo-Croatian - Srpskohrvatski</option>
                                    <option value="sn">Shona - chiShona</option>
                                    <option value="sd">Sindhi</option>
                                    <option value="si">Sinhala - සිංහල</option>
                                    <option value="sk">Slovak - slovenčina</option>
                                    <option value="sl">Slovenian - slovenščina</option>
                                    <option value="so">Somali - Soomaali</option>
                                    <option value="st">Southern Sotho</option>
                                    <option value="es">Spanish - español</option>
                                    <option value="es-AR">Spanish (Argentina) - español (Argentina)</option>
                                    <option value="es-419">Spanish (Latin America) - español (Latinoamérica)</option>
                                    <option value="es-MX">Spanish (Mexico) - español (México)</option>
                                    <option value="es-ES">Spanish (Spain) - español (España)</option>
                                    <option value="es-US">Spanish (United States) - español (Estados Unidos)</option>
                                    <option value="su">Sundanese</option>
                                    <option value="sw">Swahili - Kiswahili</option>
                                    <option value="sv">Swedish - svenska</option>
                                    <option value="tg">Tajik - тоҷикӣ</option>
                                    <option value="ta">Tamil - தமிழ்</option>
                                    <option value="tt">Tatar</option>
                                    <option value="te">Telugu - తెలుగు</option>
                                    <option value="th">Thai - ไทย</option>
                                    <option value="ti">Tigrinya - ትግርኛ</option>
                                    <option value="to">Tongan - lea fakatonga</option>
                                    <option value="tr">Turkish - Türkçe</option>
                                    <option value="tk">Turkmen</option>
                                    <option value="tw">Twi</option>
                                    <option value="uk">Ukrainian - українська</option>
                                    <option value="ur">Urdu - اردو</option>
                                    <option value="ug">Uyghur</option>
                                    <option value="uz">Uzbek - o‘zbek</option>
                                    <option value="vi">Vietnamese - Tiếng Việt</option>
                                    <option value="wa">Walloon - wa</option>
                                    <option value="cy">Welsh - Cymraeg</option>
                                    <option value="fy">Western Frisian</option>
                                    <option value="xh">Xhosa</option>
                                    <option value="yi">Yiddish</option>
                                    <option value="yo">Yoruba - Èdè Yorùbá</option>
                                    <option value="zu">Zulu - isiZulu</option>
                                </select>


                                <div class="wizard-form-error"></div>

                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Academic Qualifications</label>
                                    <select name="academic_qualifications" class="wizard-required">
                                    @foreach ($aq as $a)
                                        <option value="{{ $a->id }}">{{ $a->name }}</option>
                                    @endforeach>
                                    </select>
                                    <div class="wizard-form-error"></div>

                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Current Job Title</label>
                                    <input type="text" maxlength="60" name="current_Job_Title" class="wizard-required" >
                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Current Work Type</label>
                                    <select name="current_work_type" class="wizard-required">
                                        <option value="full-time">Full-Time Employee</option>
                                        <option value="part-time">Part-Time Employee</option>
                                        <option value="temporary">Temporary Employee</option>
                                        <option value="seasonal">Seasonal Employee</option>
                                        <option value="independent-contractor">Independent Contractor</option>
                                        <option value="freelancer">Freelancer</option>
                                        <option value="consultant">Consultant</option>
                                    </select>
                                    <div class="wizard-form-error"></div>

                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label> Number of years of relevant experience </label>
                                    <input type="number" maxlength="60" name="years_experience" class="wizard-required"  maxlength="2" placeholder="1" required>

                                </div>
                                <div class="col-sm-4 col-lg-4 pl-0">
                                    <label>What is your strongest field of knowledge?</label>
                                    <select name="institution" class="w-100">
                                    @foreach ($industry as $industry)
                                        <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                    @endforeach
                                    </select>
                                </div>
                            <div class="col-sm-12 col-lg-12 pl-0">
                            <div class="row">
                            <div class="col-lg-6">
                            <label>Upload Personal Photo<br></label>
                            <input type="file" name="personal_photo" />
                             <small class="pt-2 font-weight-bols d-block">(Allowed: Formats: JPG, PNG, GIF. Maximum file size:10MB)<br></small>
                            </div>
                            
                                <div class="col-lg-6">
                             <label >Attach a video file</label>
                            <input type="file" name="video" />
                             <small class="pt-2 font-weight-bols d-block">Please, submit an introductory video about yourself, your experience, and why do you think you are the best in mentoring and / or coaching, not more than 2 mins.<br></small>
                            </div> </div>   <br>

                            <div class="row">
                            <div class="col-lg-6">
                            <label>Attach a CV file<br></label>
                            <input type="file" name="cv_file" />
                             </div>
                            
                                <div class="col-lg-6">
                            <label>OR, paste a link to your CV<br></label>
                            
                            <input type="text" maxlength="160" name="cv_link" placeholder="LINK" />
                            </div> </div>   <br>

                            <div class="row">
                            <div class="col-lg-6">
                            <label>Attach your portfolio file <br></label>
                            <input type="file" name="portfolio_file" />
                             </div>
                            
                                <div class="col-lg-6">
                            <label>OR, paste a link to your portfolio <br></label>
                            
                            <input type="text" maxlength="160" name="portfolio_link" placeholder="LINK" />
                            </div> </div>   <br>
                            </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Your Facebook</label>
                                    <input type="text" maxlength="160" name="Facebook_link" placeholder="https://www.facebook.com/user">
                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Your Linkedin</label>
                                    <input type="text" maxlength="160" name="Linkedin" placeholder="https://www.linkedin.com/user">
                                </div>
                                <div class="col-sm-4 col-lg-4  pl-0">
                                    <label>Your Website</label>
                                    <input type="text" maxlength="160" name="Website" placeholder="https://www.mywebsite.com">
                                </div>

                        </div>

                            <div class="form-group clearfix">
								<a href="javascript:;" class="form-wizard-previous-btn float-left">Previous</a>
								<!--<a href="javascript:;" class="form-wizard-submit float-right">Submit</a>-->
                                <button class="form-wizard-submit float-right"  type="submit">Submit</button>

							</div>
                    </fieldset>	

                </form>
            </div>
        </div>
      </div>
   </div>
</section>

@endsection @push('js')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    jQuery(document).ready(function () {
        // click on next button
        jQuery(".form-wizard-next-btn").click(function () {
            var parentFieldset = jQuery(this).parents(".wizard-fieldset");
            var currentActiveStep = jQuery(this).parents(".form-wizard").find(".form-wizard-steps .active");
            var next = jQuery(this);
            var nextWizardStep = true;
            parentFieldset.find(".wizard-required").each(function () {
                var thisValue = jQuery(this).val();

                if (thisValue == "") {
                    jQuery(this).css("border","1px solid red");
                    //jQuery(this).siblings(".wizard-form-error").slideDown();
                    nextWizardStep = false;
                } else {
                    jQuery(this).siblings(".wizard-form-error").slideUp();
                }
            });
            if (nextWizardStep) {
                next.parents(".wizard-fieldset").removeClass("show", "400");
                currentActiveStep.removeClass("active").addClass("activated").next().addClass("active", "400");
                next.parents(".wizard-fieldset").next(".wizard-fieldset").addClass("show", "400");
                jQuery(document)
                    .find(".wizard-fieldset")
                    .each(function () {
                        if (jQuery(this).hasClass("show")) {
                            var formAtrr = jQuery(this).attr("data-tab-content");
                            jQuery(document)
                                .find(".form-wizard-steps .form-wizard-step-item")
                                .each(function () {
                                    if (jQuery(this).attr("data-attr") == formAtrr) {
                                        jQuery(this).addClass("active");
                                        var innerWidth = jQuery(this).innerWidth();
                                        var position = jQuery(this).position();
                                        jQuery(document).find(".form-wizard-step-move").css({ left: position.left, width: innerWidth });
                                    } else {
                                        jQuery(this).removeClass("active");
                                    }
                                });
                        }
                    });
            }
        });
        //click on previous button
        jQuery(".form-wizard-previous-btn").click(function () {
            var counter = parseInt(jQuery(".wizard-counter").text());
            var prev = jQuery(this);
            var currentActiveStep = jQuery(this).parents(".form-wizard").find(".form-wizard-steps .active");
            prev.parents(".wizard-fieldset").removeClass("show", "400");
            prev.parents(".wizard-fieldset").prev(".wizard-fieldset").addClass("show", "400");
            currentActiveStep.removeClass("active").prev().removeClass("activated").addClass("active", "400");
            jQuery(document)
                .find(".wizard-fieldset")
                .each(function () {
                    if (jQuery(this).hasClass("show")) {
                        var formAtrr = jQuery(this).attr("data-tab-content");
                        jQuery(document)
                            .find(".form-wizard-steps .form-wizard-step-item")
                            .each(function () {
                                if (jQuery(this).attr("data-attr") == formAtrr) {
                                    jQuery(this).addClass("active");
                                    var innerWidth = jQuery(this).innerWidth();
                                    var position = jQuery(this).position();
                                    jQuery(document).find(".form-wizard-step-move").css({ left: position.left, width: innerWidth });
                                } else {
                                    jQuery(this).removeClass("active");
                                }
                            });
                    }
                });
        });
        //click on form submit button
        jQuery(document).on("click", ".form-wizard .form-wizard-submit", function () {
            var parentFieldset = jQuery(this).parents(".wizard-fieldset");
            var currentActiveStep = jQuery(this).parents(".form-wizard").find(".form-wizard-steps .active");
            parentFieldset.find(".wizard-required").each(function () {
                var thisValue = jQuery(this).val();
                if (thisValue == "") {
                    jQuery(this).siblings(".wizard-form-error").slideDown();
                } else {
                    jQuery(this).siblings(".wizard-form-error").slideUp();
                }
            });
        });
        // focus on input field check empty or not
        jQuery(".form-control")
            .on("focus", function () {
                var tmpThis = jQuery(this).val();
                if (tmpThis == "") {
                    jQuery(this).parent().addClass("focus-input");
                } else if (tmpThis != "") {
                    jQuery(this).parent().addClass("focus-input");
                }
            })
            .on("blur", function () {
                var tmpThis = jQuery(this).val();
                if (tmpThis == "") {
                    jQuery(this).parent().removeClass("focus-input");
                    jQuery(this).siblings(".wizard-form-error").slideDown("3000");
                } else if (tmpThis != "") {
                    jQuery(this).parent().addClass("focus-input");
                    jQuery(this).siblings(".wizard-form-error").slideUp("3000");
                }
            });
    });
</script>
@endpush
