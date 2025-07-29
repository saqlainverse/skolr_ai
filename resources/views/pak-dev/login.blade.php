@extends('pak-dev.layouts.main')
@section('content')
    <section class="section-page-login login-wrap tf-spacing-4">
        <div class="tf-container user-form-container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="img-left wow fadeInLeft" data-wow-delay="0s">
                        <img class=" ls-is-cached lazyloaded"
                            data-src="{{ static_asset('pak-dev/images/page-title/page-title-home2-1.jpg') }}"
                            src="{{ static_asset('pak-dev/images/page-title/page-title-home2-1.jpg') }}" alt="">
                        <div class="blockquite wow fadeInLeft" data-wow-delay="0.1s">
                            <p>
                                Happiness prosperous impression had
                                conviction For every delay <br> in they
                            </p>
                            <p class="author">Ali Tufan</p>
                            <p class="sub-author">Founder &amp; CEO</p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-6">
                    <div class="content-right ">
                        <h2 class="login-title fw-7 wow fadeInUp" data-wow-delay="0s">
                            {{ __('log_in_to_your_account') }}
                        </h2>
                        <div class="register">
                            <p class="fw-5 fs-15 wow fadeInUp" data-wow-delay="0s"> {{__('new_user') }}?</p>
                            <a href="{{ route('student.sign_up') }}" class="fw-5 fs-15 wow fadeInUp" data-wow-delay="0s">{{__('create_an_account') }}</a>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="form-login form ajax_form">
                            @csrf
                            <div class="cols">
                                <fieldset class="tf-field field-username wow fadeInUp" data-wow-delay="0s">
                                    <input class="tf-input style-1" id="email" type="email"
                                        placeholder="{{ __('email') }}" name="email" tabindex="2" value=""
                                        aria-required="true" required="">
                                    <label class="tf-field-label fs-15" for="email">{{ __('email') }}</label>
                                </fieldset>
                            </div>
                            <div class="nk-block-des text-danger mb-4">
                               <p class="email_error error">{{ $errors->first('email') }}</p>
                           </div>
                            <div class="cols">
                                <fieldset class="tf-field field-pass wow fadeInUp" data-wow-delay="0s">
                                    <input class="tf-input style-1" id="password" type="password"
                                        placeholder="{{ __('enter_password') }}" data-lpignore="true" name="password"
                                        tabindex="2" value="" aria-required="true" required="">
                                    <label class="tf-field-label fs-15" for="password">{{ __('password') }}</label>
                                    {{-- <span id="#password" class="fa fa-fw fa-eye toggle-password"></span> --}}
                                </fieldset>
                            </div>
                            <div class="nk-block-des text-danger mb-4">
                               <p class="password_error error">{{ $errors->first('password') }}</p>
                           </div>
                            <div class="checkbox-item">
                                <label class="wow fadeInUp" data-wow-delay="0s">
                                    <p class="fs-15">{{ __('stay_logged_in') }}</p>
                                    <input id="stayLoggedIn" name="remember" type="checkbox">
                                    <span class="btn-checkbox"></span>
                                </label>
                                <a href="{{ route('password.forgot') }}" class="fs-15 wow fadeInUp" data-wow-delay="0.1s">
                                    {{__('forgot_password') }}    
                                </a>
                            </div>
                            @if (setting('is_recaptcha_activated') && setting('recaptcha_Site_key') && setting('recaptcha_secret'))
                                <input type="hidden" class="recaptcha" name="recaptcha" value="0">
                                <div class="mb-30">
                                    <div id="html_element" data-callback="imNotARobot" class="g-recaptcha"
                                        data-sitekey="{{ setting('recaptcha_Site_key') }}"></div>
                                </div>
                                <div class="nk-block-des text-danger">
                                    <p class="recaptcha_error error">{{ $errors->first('recaptcha') }}</p>
                                </div>
                            @endif
                            <button class=" button-submit tf-btn w-100 wow fadeInUp" data-wow-delay="0s" type="submit">
                                {{__('login') }}<i class="icon-arrow-top-right"></i>
                            </button>
                             @include('components.frontend_loading_btn',['class' => 'template-btn m-b-25'])
                        </form>
                        <p class="fs-15 wow fadeInUp" data-wow-delay="0s">OR</p>
                        <ul class="login-social">
                            <li class="login-social-icon">
                                <a href="#" class="tf-btn wow fadeInUp" data-wow-delay="0s"><i
                                        class="flaticon-facebook-1"></i>
                                    Facebook</a>
                            </li>
                            <li class="login-social-icon">
                                <a href="#" class="tf-btn wow fadeInUp" data-wow-delay="0.1s"><i
                                        class="icon-google"></i>Google</a>
                            </li>
                            <li class="login-social-icon">
                                <a href="#" class="tf-btn wow fadeInUp" data-wow-delay="0.2s"><i
                                        class="icon-apple"></i>Apple</a>
                            </li>
                        </ul>
                         @if(config('app.demo_mode'))
                            <div class="login-as">
                                <h6>{{ __('login_as') }}</h6>
                                <ul class="login-BTN ">
                                    <li>
                                        <a href="javascript:void(0)" class="input_filler template-btn bordered-btn-secondary" data-type="admin">{{ __('admin') }}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="input_filler template-btn bordered-btn-secondary" data-type="instructor">{{ __('instructor') }}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="input_filler template-btn bordered-btn-secondary" data-type="staff">{{ __('admin_staff') }}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="input_filler template-btn bordered-btn-secondary" data-type="organization">{{ __('organization') }}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="input_filler template-btn bordered-btn-secondary" data-type="student">{{ __('student') }}</a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0)" class="input_filler template-btn bordered-btn-secondary" data-type="organization-staff">{{ __('organization_staff') }}</a>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="login-wrap-content"></div> -->
    </section>
@endsection

{{-- Previous Code --}}
@if (
    (setting('api_key') &&
        setting('api_key') &&
        setting('project_id') &&
        setting('storage_bucket') &&
        setting('messaging_sender_id') &&
        setting('app_id') &&
        setting('measurement_id')) ||
        (setting('is_google_login_activated') == 1 ||
            setting('is_facebook_login_activated') == 1 ||
            setting('is_twitter_login_activated') == 1))
    @push('css')
        <link type="text/css" rel="stylesheet" href="{{ static_asset('frontend/css/firebase-ui-auth.css') }}" />
    @endpush
    @push('js')
        <script src="{{ static_asset('frontend/js/firebase-app.js') }}"></script>
        <script src="{{ static_asset('frontend/js/firebase-auth.js') }}"></script>
        <script src="{{ static_asset('frontend/js/firebase-ui-auth.js') }}"></script>
    @endpush
    @push('js')
        <script>
            const firebaseConfig = {
                apiKey: "{{ setting('api_key') }}",
                authDomain: "{{ setting('auth_domain') }}",
                projectId: "{{ setting('project_id') }}",
                storageBucket: "{{ setting('storage_bucket') }}",
                messagingSenderId: "{{ setting('messaging_sender_id') }}",
                appId: "{{ setting('app_id') }}",
                measurementId: "{{ setting('measurement_id') }}"
            };

            // Initialize Firebase
            firebase.initializeApp(firebaseConfig);

            var ui = new firebaseui.auth.AuthUI(firebase.auth());
            var uiConfig = {
                callbacks: {
                    signInSuccessWithAuthResult: function(authResult, redirectUrl) {
                        let response = authResult.additionalUserInfo.profile;
                        if (authResult.additionalUserInfo.providerId == 'facebook.com') {
                            var data = {
                                uid: authResult.user.uid,
                                name: response.name,
                                birthday: response.birthday,
                                gender: response.gender,
                                email: response.email,
                                image: response.picture.data.url,
                                phone: authResult.user.phoneNumber,
                                _token: '{{ csrf_token() }}',
                            };
                        } else if (authResult.additionalUserInfo.providerId == 'google.com') {
                            var data = {
                                uid: authResult.user.uid,
                                name: response.name,
                                email: response.email,
                                image: response.picture,
                                phone: authResult.user.phoneNumber,
                                _token: '{{ csrf_token() }}',
                            };
                        } else {
                            var data = {
                                uid: authResult.user.uid,
                                name: authResult.user.displayName,
                                email: authResult.user.email,
                                image: authResult.user.photoURL,
                                phone: authResult.user.phoneNumber,
                                _token: '{{ csrf_token() }}',
                            };
                        }

                        $.ajax({
                            url: "{{ route('social.login') }}",
                            type: 'POST',
                            data: data,
                            success: function(response) {
                                window.location.href = response.route;
                                toastr.success(response.success);
                            }
                        });
                        return true;
                    }
                },
                signInFlow: 'popup',
                signInSuccessUrl: '#',
                signInOptions: [
                    @if (setting('is_google_login_activated') == 1)
                        {
                            provider: firebase.auth.GoogleAuthProvider.PROVIDER_ID,
                            scopes: [
                                'https://www.googleapis.com/auth/contacts.readonly',
                                'https://www.googleapis.com/auth/user.birthday.read',
                                'https://www.googleapis.com/auth/user.gender.read',
                                'https://www.googleapis.com/auth/user.phonenumbers.read'
                            ],
                        },
                    @endif
                    @if (setting('is_facebook_login_activated') == 1)
                        {
                            provider: firebase.auth.FacebookAuthProvider.PROVIDER_ID,
                            scopes: [
                                'public_profile',
                                'email',
                                'user_likes',
                                'user_friends'
                            ],
                        },
                    @endif
                    @if (setting('is_twitter_login_activated') == 1)
                        {
                            provider: firebase.auth.TwitterAuthProvider.PROVIDER_ID,
                        }
                    @endif
                ]
            };
            ui.start('#firebaseui-auth-container', uiConfig);
        </script>
    @endpush
@endif

@push('js')
    @if (setting('is_recaptcha_activated') && setting('recaptcha_Site_key') && setting('recaptcha_secret'))
        <script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit" async defer></script>
    @endif
    @if (setting('is_recaptcha_activated') && setting('recaptcha_Site_key') && setting('recaptcha_secret'))
        <script>
            var onloadCallback = function() {
                grecaptcha.render('html_element', {
                    'sitekey': '{{ setting('recaptcha_Site_key') }}',
                    'size': 'md'
                });
            };
            var imNotARobot = function() {
                $('.recaptcha').val(1);
            };
        </script>
    @endif
    <script>
        $(document).ready(function() {
            $(document).on('click', '.login-as a', function() {
                var type = $(this).data('type');
                if (type == 'admin') {
                    $('#email').val('admin@spagreen.net');
                    $('#password').val('123456');

                } else if (type == 'instructor') {
                    $('#email').val('instructor@spagreen.net');
                    $('#password').val('123456');
                } else if (type == 'student') {
                    $('#email').val('student@spagreen.net');
                    $('#password').val('123456');
                } else if (type == 'staff') {
                    $('#email').val('staff@spagreen.net');
                    $('#password').val('123456');
                } else if (type == 'organization') {
                    $('#email').val('org_staff@spagreen.net');
                    $('#password').val('123456');
                } else if (type == 'organization-staff') {
                    $('#email').val('org_staff@spagreen.net');
                    $('#password').val('123456');
                }
                $('.login-as').addClass('d-none');
                $('.user-form-container .ajax_form').submit();

            });
        });
    </script>
@endpush
