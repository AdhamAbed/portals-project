

@extends('layout.app')



@section('content')

    <main>

        <div class="container d-flex justify-content-center mt-5">
            <div class="auth-block">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Log in to your Udemy account</h5>

                    </div>
                    <div class="modal-body d-flex flex-column align-items-center justify-content-center">
{{--                        <button class="moadl-btn modal-btn-center">--}}
{{--                            <svg style="margin-right: 10px;" width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M27.1997 14.3227C27.1997 13.4134 27.1117 12.4747 26.965 11.5947H14.2637V16.7867H21.5383C21.245 18.4587 20.277 19.9254 18.8397 20.8641L23.181 24.2374C25.733 21.8614 27.1997 18.4001 27.1997 14.3227Z" fill="#4280EF"/>--}}
{{--                                <path d="M14.264 27.4641C17.9013 27.4641 20.952 26.2614 23.1813 24.2081L18.84 20.8641C17.6373 21.6854 16.0826 22.1547 14.264 22.1547C10.744 22.1547 7.7813 19.7787 6.69597 16.6107L2.2373 20.0427C4.5253 24.5894 9.15997 27.4641 14.264 27.4641Z" fill="#34A353"/>--}}
{{--                                <path d="M6.69579 16.5814C6.13846 14.9094 6.13846 13.0907 6.69579 11.4187L2.23713 7.9574C0.330462 11.7707 0.330462 16.2587 2.23713 20.0427L6.69579 16.5814Z" fill="#F6B704"/>--}}
{{--                                <path d="M13.9261 6.13923C15.8327 6.10989 17.7101 6.84323 19.0887 8.16323L22.9314 4.29123C20.4967 2.00323 17.2701 0.771227 13.9261 0.800561C8.82208 0.800561 4.18741 3.67523 1.89941 8.2219L6.35808 11.6832C7.44341 8.48589 10.4061 6.13923 13.9261 6.13923Z" fill="#E54335"/>--}}
{{--                            </svg>--}}

{{--                            Continue with Google--}}
{{--                        </button>--}}
{{--                        <button class="moadl-btn modal-btn-center">--}}
{{--                            <svg style="margin-right: 10px;" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <g clip-path="url(#clip0_946_1788)">--}}
{{--                                    <path d="M23.1111 0H2.88889C1.2934 0 0 1.2934 0 2.88889V23.1111C0 24.7066 1.2934 26 2.88889 26H23.1111C24.7066 26 26 24.7066 26 23.1111V2.88889C26 1.2934 24.7066 0 23.1111 0Z" fill="#4460A0"/>--}}
{{--                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.8344 4.84516V8.20728L19.839 8.21247C18.2749 8.21247 17.9735 8.95557 17.9735 10.0416V12.4476H21.6993L21.2161 16.2099H17.9735V26H14.087V16.2099H10.8335V12.4476H14.087V9.67268C14.087 6.45087 16.0508 4.69446 18.9296 4.69446C20.302 4.69446 21.4863 4.79839 21.8344 4.84516Z" fill="white"/>--}}
{{--                                </g>--}}
{{--                                <defs>--}}
{{--                                    <clipPath id="clip0_946_1788">--}}
{{--                                        <rect width="26" height="26" fill="white"/>--}}
{{--                                    </clipPath>--}}
{{--                                </defs>--}}
{{--                            </svg>--}}


{{--                            Continue with Facebook--}}
{{--                        </button>--}}
{{--                        <button class="moadl-btn modal-btn-center">--}}
{{--                            <svg style="margin-right: 10px;" width="25" height="32" viewBox="0 0 25 32" fill="none" xmlns="http://www.w3.org/2000/svg">--}}
{{--                                <path d="M20.7912 16.84C20.753 12.9926 23.9287 11.1473 24.0706 11.0541C22.2859 8.44453 19.5053 8.08646 18.5156 8.04572C16.1511 7.80556 13.8996 9.43848 12.7001 9.43848C11.503 9.43848 9.64973 8.08091 7.68899 8.11548C5.10966 8.15376 2.73221 9.61567 1.40488 11.9246C-1.27384 16.5715 0.719612 23.4581 3.32981 27.2296C4.60589 29.073 6.12769 31.1473 8.12423 31.0714C10.0485 30.9955 10.7746 29.8268 13.1008 29.8268C15.427 29.8268 16.0802 31.0714 18.1156 31.0325C20.185 30.9948 21.4969 29.1539 22.7625 27.303C24.2275 25.1614 24.8306 23.0877 24.8664 22.9827C24.8214 22.9618 20.8326 21.4338 20.7912 16.84Z" fill="black"/>--}}
{{--                                <path d="M16.9666 5.54968C18.0253 4.26434 18.7427 2.47831 18.5476 0.700317C17.0197 0.762053 15.17 1.71587 14.073 2.99998C13.0902 4.13963 12.2308 5.95405 12.4611 7.69995C14.1656 7.83206 15.9041 6.83256 16.9666 5.54968Z" fill="black"/>--}}
{{--                            </svg>--}}


{{--                            Continue with Apple--}}
{{--                        </button>--}}
                        <form method="post" action="{{ route('loginUsers') }}" class="w-100" enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative w-100">
                                <input  class="moadl-btn @error('email') is-invalid @enderror" style="    padding-left: 50px;" type="email" name="email" id="" placeholder="email"  >
                                <svg class="input-icon" width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_874_3152)">
                                        <path d="M15.5742 3.20837H6.41667C4.39162 3.20837 2.75 4.85 2.75 6.87504V15.125C2.75 17.1501 4.39162 18.7917 6.41667 18.7917H15.5742C17.5992 18.7917 19.2408 17.1501 19.2408 15.125V6.87504C19.2408 4.85 17.5992 3.20837 15.5742 3.20837Z" stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M2.75 9.61584C2.75 10.1933 3.0525 10.725 3.5475 11.0183L9.72582 14.7033C10.505 15.1708 11.495 15.1708 12.2742 14.7033L18.4525 11.0183C18.9475 10.725 19.25 10.1933 19.25 9.61584" stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_874_3152">
                                            <rect width="22" height="22" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>

                            </div>

                            <div class="position-relative w-100">
                                <input  class="moadl-btn  @error('password') is-invalid @enderror" type="password" style="    padding-left: 50px;" name="password" id="" placeholder="password">
                                <svg class="input-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <g clip-path="url(#clip0_874_3156)">
                                        <path d="M7.75977 9.75V7.24C7.75977 4.9 9.65976 3 11.9998 3C14.3398 3 16.2397 4.9 16.2397 7.24V9.75" stroke="#59CCC7" stroke-width="1.5" stroke-linejoin="round"/>
                                        <path d="M12 15.6V17.4" stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M12.0009 15.59C12.6194 15.59 13.1208 15.0885 13.1208 14.47C13.1208 13.8514 12.6194 13.35 12.0009 13.35C11.3823 13.35 10.8809 13.8514 10.8809 14.47C10.8809 15.0885 11.3823 15.59 12.0009 15.59Z" stroke="#59CCC7" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M16 9.29999H8C5.79086 9.29999 4 11.0908 4 13.3V17C4 19.2091 5.79086 21 8 21H16C18.2091 21 20 19.2091 20 17V13.3C20 11.0908 18.2091 9.29999 16 9.29999Z" stroke="#59CCC7" stroke-width="1.5" stroke-linejoin="round"/>
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_874_3156">
                                            <rect width="24" height="24" fill="white"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            <button class="btn-filled w-100" style="border-radius: 8px; height: 55px;margin: 5px 0;">Log In</button>

                        </form>
                        <span style="margin-top: 16px;">or <a href="{{route('user.resetPassword')}}"  data-bs-toggle="modal" data-bs-target="#forget" style="color: #59CCC7;">{{ __('cp.forget password') }}</a></span>
                        <hr class="w-100" style="border-top: 1px solid #E2E2E2;">
                        <span>Don't have an account? <a href="{{ route('user.register.form') }}" style="color: #59CCC7;" data-bs-toggle="modal" data-bs-target="#SignUp">SignUp</a></span>

                    </div>
                </div>
            </div>
        </div>


    </main>


    <!--<img class="backgroundShape" src="{{url(asset('website'))}}/images/backimg.png" alt="">-->

@endsection

