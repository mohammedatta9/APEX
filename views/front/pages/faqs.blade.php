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

        .notificaton-icon, .avater {
            display: inline-block;
        }

    </style>

    <!---------------- banner section --------------------->

    <div class="bg-white align-items-center padding-top position-relative">
        <div class="horizental-line"></div>
        <div class="mentor-searcg-wrapper pl-0">
            <h4>FAQs</h4>
            <h1 class="mb-3">Top Most Frequently Asked Questions</h1>
            <p>Dear TELCCA user, here are the top most frequently asked questions.<br>
                In case you did not find the answer you are looking for, then you are highly encouraged to <br> write
                directly for us on the “Help & Support” page.
            </p>
        </div>
    </div>

    <section class="bg-white">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-lg-12">
                    <div class="accordion my-account-accordian" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse1"
                                   aria-expanded="true">
                                    Where is TELCCA located?
                                </a>
                            </div>
                            <div id="collapse1" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">A: TELCCA is located in the United Arab Emirates, in Dubai.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse2"
                                   aria-expanded="true">
                                    How to join TELCCA as a mentor or as a coach?
                                </a>
                            </div>
                            <div id="collapse2" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">To join TELCCA as a mentor and/or as a coach, you first need to click on the “Let’s Collaborate!” button found in the footer or the bottom of the TELCCA website. Once you click on it, you will have to fill-out the application form to become either a mentor or a coach. Once you are done answering all the required questions in the “3 steps” application form, click on the “Submit” button. After that, our TELCCA team will review your application within 5-7 working days. If accepted, your unique username and password will be sent to your email so you can sign up in the TELCCA platform. Now, you have a 3-months FREE trial period in which you can start offering your paid mentoring and/or coaching services for clients and get paid through TELCCA. However, after your trial period gets expired, to continue to offer coaching sessions for clients on the TELCCA platform, you first have to pay a small yearly subscription fee, ranging between 299-499AED per year, this is only after your free 3 months trial period is already over.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse3"
                                   aria-expanded="true">
                                    How to create a Learner account in TELCCA?
                                </a>
                            </div>
                            <div id="collapse3" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">To create a Learner account, which allows you to enroll and participate in any career- related opportunities available in TELCCA, schedule mentoring and coaching sessions with mentors and coaches, join communities and discussions, take quizzes and exercises, and much more, you need to first click on the “Register” button found in the top-right side on TELCCA website, on in the menu (if you are viewing from a smartphone). A window that says “Register As” will appear, click on the dropdown list and select “As Learner” then click “Next”. After that, you will be led to the Learner Registration page. Enter the email you want to sign up with, enter a unique password of at least 8 characters, and then check the “Terms & Conditions” as well as the “Privacy Policy” before clicking on the “Sign Me Up” button. Now, you have registered as a Learner account in TELCCA, and you can start building your profile and enjoy our services!</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse4"
                                   aria-expanded="true">
                                    What are the subscription plans and payment plans available in TELCCA?
                                </a>
                            </div>
                            <div id="collapse4" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Since TELCCA is still a new platform, so far, we have one “Basic Plan” for each type of users we have, those are Mentors, Coaches, Learners, Companies, and Institutions. The “Basic Plan” for Learner, Company, and Institution accounts are FREE subscription plans. Mentor “Basic Plan” is a yearly paid plan, around 499AED. Coach “Basic Plan” is a yearly paid plan, around 299AED. However, in near future, we will add more paid subscription plans options, including “Premium Plans” for all of our types of users. You can access the “Subscription Plans” options as a mentor and as a coach only after you submit your “Let’s Collaborate!” application form and get the acceptance email with your unique username and password, then you will find the “Subscription Plan” option in your profile menu. For other types of users (Learner, Company, Institutions) you will be able to view your “subscription Plan” options in your profile menu once you Register in TELCCA.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse5"
                                   aria-expanded="true">
                                    How can I subscribe to the “Premium Plan” and become a premium member?
                                </a>
                            </div>
                            <div id="collapse5" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">This option is closed for now. We will send a notification to our subscribed users who have a “Basic Plan” subscription with TELCCA as soon as our “Premium Plan” option is available so they can purchase it if wanted.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse6"
                                   aria-expanded="true">
                                    How can I edit my profile information, settings, and payment?
                                </a>
                            </div>
                            <div id="collapse6" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">All these options and more can be found on your “Settings” page. You can access the “Settings” page by going to your profile page, on the left-side of the page you will find a list of buttons. The last button is the “Settings” button. Click on the “Settings” button found on your profile page and you will be redirected to your account settings page. On your settings page, on the left-side, you can choose any options to edit. Once you’re done, make sure to click “Update” at the end of the page to save your new edits.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse7"
                                   aria-expanded="true">
                                    How can I receive TELCCA’s newsletters?
                                </a>
                            </div>
                            <div id="collapse7" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can do so by going to the bottom of the TELCCA website, in the footer, you will see a text bar on the right-side of the footer. Enter your email address and click “Send”. You will start receiving our newsletters. If you would like to unsubscribe in the future, you can do so by clicking the word “unsubscribe” found at the end of any of our TELCCA newsletters emails.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse8"
                                   aria-expanded="true">
                                    How can I change my email on TELCCA?
                                </a>
                            </div>
                            <div id="collapse8" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can change your email, as well as other account information, from the “Settings” page found in your profile. On the settings page, on the left-side, click “Account Settings” and you will be able to change your email by typing your new email in the “Email” text bar found on the page. Once you entered your new email, click “Update” to save your new changes.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse9"
                                   aria-expanded="true">
                                    How can I change my account password in TELCCA?
                                </a>
                            </div>
                            <div id="collapse9" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can change your password, as well as other account information, from the “Settings” page found in your profile. On the settings page, on the left-side, click “Account Settings” and you will be able to change your password by first typing your “Old Password”, then typing your “New Password”, then typing the same password again in the “Confirm New Password”. If the new password is valid and the typed password in all of the three text bars matches, your old password will be changed to the new password you have chosen once you click “Update” to save your new password.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse10"
                                   aria-expanded="true">
                                    How can I deactivate my TELCCA account temporarily?
                                </a>
                            </div>
                            <div id="collapse10" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Any type of user in TELCCA can deactivate their TELCCA account by going to their profile page, then clicking on the “Settings” button found on their profile page. On the “Settings” page, on the left-side, click on the “Account Settings” button. On the “Account Settings” page, you will find a slide-button for “Deactivate my account”. Click on the slide-button if you are sure you want to deactivate your TELCCA account. Once you choose the deactivation option, an “Are you sure?” pop-up window will ask you to confirm the deactivation by entering your password and clicking “Deactivate Now”. After this, you will be signed out from your TELCCA account, and your profile will no longer be searchable on the TELCCA website. To re-activate your TELCCA account again, just sign in again with your username and password.</label>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse11"
                                   aria-expanded="true">
                                    How can I delete my TELCCA account forever?
                                </a>
                            </div>
                            <div id="collapse11" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Any type of user in TELCCA can permanently delete their TELCCA account by going to their profile page, then clicking on the “Settings” button found on their profile page. On the “Settings” page, on the left-side, click on the “Account Settings” button. On the “Account Settings” page, you will find a slide-button for “Delete my account forever”. Click on the slide-button if you are sure you want to permanently delete your TELCCA account, your profile, your data, your history, your progress, your communities, your calendar, your files, and everything related to you that is found on the TELCCA website. Once you choose the delete option, an “Are you sure?” pop-up window will ask you to confirm the deletion by entering your password and clicking “Delete Now”. After this, you will be signed out from your TELCCA account, and your profile will no longer be searchable and will no longer exist on the TELCCA website. Make sure you understand that once you decide to delete your TELCCA account, you will not be able to retrieve it at all or any of the data found in it, they all will be completely erased from our TELCCA database forever. Also, if you delete your website, you will not be able to have any refund of any remaining period that still exists on your TELCCA paid subscription plan. If you have any money in your TELCCA account balance (whether paid for you by other users or charged by you to pay for any services on TELCCA), a refund of the exact amount in your TELCCA profile will be sent to your bank account within 50 days max (not including weekends and holidays).</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse12"
                                   aria-expanded="true">
                                    Can I have a Mentor account and a Coach account using the same email?
                                </a>
                            </div>
                            <div id="collapse12" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">No. Such an option is not available. To register as a mentor and as a coach (to have two TELCCA accounts, one as a mentor and the other as a coach), you will have to have two different emails for both of them. As a general rule, you cannot register in any two or more of the users’ types found in TELCCA using the same email, each account you are going to create must have a different email address.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse13"
                                   aria-expanded="true">
                                     Can I have a Mentor and/or a Coach account and a Learner account using the same email?
                                </a>
                            </div>
                            <div id="collapse13" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">No. Such an option is not available. As a general rule, you cannot register in any two or more of the users’ types found in TELCCA using the same email, each account you are going to create must have a different email address.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse14"
                                   aria-expanded="true">
                                    How do I edit my privacy settings?
                                </a>
                            </div>
                            <div id="collapse14" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can edit your privacy settings by going to your TELCCA profile page and clicking on the “Settings” button found on the left-side of the page. on the “Settings” page, on the left- side, click on “Privacy Settings”, You will be able to edit your privacy on TELCCA using the options found on the “Privacy Settings” page.</label>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse15"
                                   aria-expanded="true">
                                    How can I edit my credit card information and my bank account information?
                                </a>
                            </div>
                            <div id="collapse15" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">TELCCA uses a third-party online safe payment partner that you can access and make payments through it using your credit card or your bank account once you click on any payment-related buttons found in TELCCA, for example, “Enrollment”, “Book a Session”, “Subscribe” buttons and others. Therefore, you can edit, change, and delete your credit card and bank account information only once you are on the payment page itself. However, you can choose the option to keep using the same credit card information and the same bank account information by clicking on the “Settings” button found on your TELCCA profile page, and then choosing “Payments & Wallet”, from there you can click on the slide-button next to the options you want to activate. Also, you can make a deposit by clicking the “Make a Deposit” button, and you can see your TELCCA balance on the screen. Make sure you click “Update” to save your changes.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse16"
                                   aria-expanded="true">
                                    How do I stop TELCCA from accessing my credit card and/or my bank account information?
                                </a>
                            </div>
                            <div id="collapse16" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3"> You can do this by clicking on the “Settings” button found on your TELCCA profile page, then on the left-side of the page click on “Payments & Wallet”. You can now click on the slide-button option next to “Stop TELCCA from using my current credit card information and my bank account information”. Click “Update” to save your changes.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse17"
                                   aria-expanded="true">
                                    How do I stop receiving emails from TELCCA?
                                </a>
                            </div>
                            <div id="collapse17" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can edit and stop receiving any type of emails sent to you by TELCCA by clicking on the “Settings” button found on your TELCCA profile page, then clicking on the “Notifications, SMS, & Emails” option found on the left-side of the page. You can now turn on/off any of the emails options by clicking on the slide-buttons. Click “Update” to save your changes.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse18"
                                   aria-expanded="true">
                                    How do I edit my notification settings on TELCCA?
                                </a>
                            </div>
                            <div id="collapse18" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can edit and stop receiving any type of notifications sent to you by TELCCA by clicking on the “Settings” button found on your TELCCA profile page, then clicking on the “Notifications, SMS, & Emails” option found on the left-side of the page. You can now turn on/off any of the notifications options by clicking on the slide-buttons. Click “Update” to save your changes.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse19"
                                   aria-expanded="true">
                                    How do I start a “Sessions Plan” on TELCCA?
                                </a>
                            </div>
                            <div id="collapse19" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Only Learner accounts can start and edit a “Sessions Plan” on TELCCA. This plan is designed to help you build a plan for your sessions in order to achieve your goals. You can start a “Session Plan” by clicking on the “Start Sessions Plan” button found on your TELCCA profile page. Or, you can start it by clicking on the “Settings” option found on your TELCCA profile page, then clicking on the “Sessions Plan” option. Now, at the “Sessions Plan Settings” page, click on the “New Sessions Plan” button”. A pop-up window will open up for you to add the details of your new sessions plan, once you are done, click on “Save”, and then you will be redirected to your “Sessions Plan” building page where you can continue adding your sessions’ details, your objectives, your mentors and coaches, and send notifications for them and get approvals. Your new sessions will automatically get integrated with your “Calendar” on TELCCA.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse20"
                                   aria-expanded="true">
                                    How do I edit the date & time of a session?
                                </a>
                            </div>
                            <div id="collapse20" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can edit the date & time of any session you have, whether it is a solo session or a session that is a part of a “Sessions Plan”, by clicking on the “My Calendar” button found on your TELCCA profile page. On the calendar, you can find the session you want to edit, click on it to start editing it, then click “Save” to save your changes.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse21"
                                   aria-expanded="true">
                                    How can I cancel a session?
                                </a>
                            </div>
                            <div id="collapse21" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can cancel any session you have, whether it is a solo session or a session that is a part of a “Sessions Plan”, by clicking on the “My Calendar” button found on your TELCCA profile page. On the calendar, you can find the session you want to edit, click on it to start editing it, click on “Cancel Session” then click “Save” to save your changes. A cancellation notification will be automatically sent to the mentor or coach associated with the session(s) you have cancelled. Any payments for any of the cancelled sessions will be refunded back to your bank account within 30 days max.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse22"
                                   aria-expanded="true">
                                    How do I view all the “Sessions Plans” I have?
                                </a>
                            </div>
                            <div id="collapse22" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can view all the “Sessions Plans” you have finished and/or still ongoing by clicking on the “Settings” button found on your TELCCA profile page, then clicking on the “Sessions Plan” button found on the left-side of the page. On this page, you will have a list record of all the “Sessions Plans” you have on TELCCA, as well as the option to edit their name and industry.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse23"
                                   aria-expanded="true">
                                    How do I view all my reviews submitted to my coaches and mentors?
                                </a>
                            </div>
                            <div id="collapse23" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Any review you have submitted will be saved and displayed on the profile page of the mentor and/or the coach you have submitted it to them.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse24"
                                   aria-expanded="true">
                                    How can I edit a review I have submitted for a mentor and/or for a coach?
                                </a>
                            </div>
                            <div id="collapse24" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Any review you have submitted will be saved and displayed on the profile page of the mentor and/or the coach you have submitted it to them. To edit any review, you have to go to the mentor’s or the coach’s profile page, scroll down to the “Reviews” section, find your submitted review, and then click on “Edit” so you can edit your review, then click “Submit” so the new edited review will be displayed, instead.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse25"
                                   aria-expanded="true">
                                    How can I print-out my “Sessions Plan” and/or my “Personal Development Plan”?
                                </a>
                            </div>
                            <div id="collapse25" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can choose to print-out any of your “Sessions Plans” or your “Personal Development Plans” by clicking on the “Settings" button found on your TELCCA profile page, then click on either the “Sessions Plan” button or the “Personal Development Plan” button so you can display all the plans you have under each of these categories. From the list of the plans, click on the one that you wish to print-out. You will be redirected to this specific plan’s page itself, and from there you can click on the “Print” button to start printing out your plan.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse26"
                                   aria-expanded="true">
                                   How to access the record of all the sessions I have given as a mentor/a coach with TELCCA?
                                </a>
                            </div>
                            <div id="collapse26" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can get a list record of all the sessions you have given through the TELCCA website, whether they were mentoring or coaching sessions, by clicking on the “Settings” option found on your TELCCA profile page, then click on the “Sessions Record” on the left-side of the page.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse27"
                                   aria-expanded="true">
                                    How do I start a “Personal Development Plan” (a “P.D.Plan”)?
                                </a>
                            </div>
                            <div id="collapse27" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Only Learner accounts can start and edit a “Personal Development Plan” on TELCCA. This plan is designed to help you build a plan for your personal goals and sub-goals. You can start a “Personal Development Plan” by clicking on the “Start Personal Development Plan” button found on your TELCCA profile page. Or, you can start it by clicking on the “Settings” option found on your TELCCA profile page, then clicking on the “Personal Development Plan” option. Now, at the “Personal Development Plan Settings” page, click on the “New Personal Development Plan” button”. A pop-up window will open up for you to add the details of your new personal development plan, once you are done, click on “Save”, and then you will be redirected to your “Personal Development Plan” building page where you can continue adding your goals and sub-goals details and all the other related details.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse28"
                                   aria-expanded="true">
                                    How do I edit and/or update my progress on my ongoing “Personal Development Plan”?
                                </a>
                            </div>
                            <div id="collapse28" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can edit and/or update your goals and sub-goals progress on any of your “Personal Development Plans” by clicking on the “Settings” button found on your TELCCA profile page, then click on “Personal Development Plans”. You will have now a list of all the ongoing “Personal Development Plans” that you have started. To edit and/or update your progress on any of these plans, click on the name of the plan that you wish to edit and/or update its progress, then you will be redirected to this specific plan’s page itself. From there, you can scroll down to see all the goals and sub-goals you have on this exact “Personal Development Plan” and then you can edit each goal, sub-goal, and also click on “Done” next to each goal and sub-goal you have accomplished so that you can update and see your progress percentage.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse29"
                                   aria-expanded="true">
                                    How do I view all the “Personal Development Plans” I have?
                                </a>
                            </div>
                            <div id="collapse29" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can view all the “Personal Development Plans” you have finished and/or still ongoing by clicking on the “Settings” button found on your TELCCA profile page, then clicking on the “Personal Development Plan” button found on the left-side of the page. On this page, you will have a list record of all the “Personal Development Plans” you have on TELCCA, as well as the option to edit their name and industry.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse30"
                                   aria-expanded="true">
                                    How can I start a video session as a mentor or as a coach with one of my clients on TELCCA registered in a Learner account?
                                </a>
                            </div>
                            <div id="collapse30" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Before you can start a video session with any Learner on TELCCA, first the Learner must send you a “Session Request’ from their profile. As a mentor or as a coach, you will receive all the “Sessions Requests” on your profile, and you can view them and accept or refuse them by clicking on the “Sessions Requests” button found on the left-side of your TELCCA profile page. The sessions you have chosen to accept by clicking “Accept” will be saved on your ”Calendar” and will also be saved on your client’s “Calendar” so both of you will have access to this session, along with all the other sessions, on your personal calendars. 5- minutes before the time of the session starts, all sides who have this same session scheduled on their calendar will receive a notification that their session is about to start, and you can click on the notification to join the video session. Or, to join the video session directly, you will have to go to your “Calendar”, view the session you want to join, and you will see a “Join Session” button has now appeared. Click on the “Join Session” button to get redirected to the actual video session page to start.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse31"
                                   aria-expanded="true">
                                    How do I build a new community on TELCCA?
                                </a>
                            </div>
                            <div id="collapse31" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">Any type of user can build or start a new community on TELCCA. You can build a new community by clicking on the “Settings” option found on your TELCCA profile page, then click on the “Communities & Discussions” option on the left-side. Then, click on “New Community” so you can enter the details of your new community in the pop-up window. Click “Save” when you are done to publish your new community for other users on TELCCA to join. By default, you will be the admin of any new community you start.</label>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle green-color font-weight-bold mb-3 d-block shwo"
                                   data-toggle="collapse" data-parent="#accordion2" href="#collapse32"
                                   aria-expanded="true">
                                    How do I join or leave a community that I am a member of?
                                </a>
                            </div>
                            <div id="collapse32" class="accordion-body collapse" style="">
                                <div class="accordion-inner form-style d-flex">
                                    <label class="custom-radio mr-3">You can find any community you wish to join, or you can search for all the communities available on TELCCA, by clicking on the “Communities” button found on the header of the website (the menu buttons). This is the communities’ search page, you can use the available filters to filter out the communities you want to join, or you can type in the name/title of any exact community in the search bar to view it. You can send a “Join Request” to any community, and once approved by the admin you will be notified.</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

{{--                <div class="col-lg-12 faqs-row">--}}

{{--                  --}}
{{--                 --}}
{{--                    <a href="#">How do I start a session plan?</a>--}}
{{--                    <a href="#">How do I start a new discussion?</a>--}}
{{--                    <a href="#">How do I join and / or leave a discussion?</a>--}}
{{--                    <a href="#">How do I view my list of communities?</a>--}}
{{--                    <a href="#">How do I view my list of discussions?</a>--}}
{{--                    <a href="#">How do I add / remove members to / from my community?</a>--}}
{{--                    <a href="#">How do I add / remove members to / from my discussions?</a>--}}
{{--                    <a href="#">How can I edit my already submitted application for mentoring and / or coaching?</a>--}}
{{--                    <a href="#">How do I apply for courses, internships, and programs?</a>--}}
{{--                    <a href="#">How do I participate in a seminar, a workshop, or an event?</a>--}}
{{--                    <a href="#">Where can I download the TELCCA app from?</a>--}}
{{--                    <a href="#">What are the accepted payment methods in TELCCA?</a>--}}
{{--                    <a href="#">How do I send a complaint and / or a suggestion to TELCCA team?</a>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>


@endsection