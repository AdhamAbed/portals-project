<?php
$lang_f=lang();
$lang =$lang_f['lang'];
$float=$lang_f['float'];
$float_op=$lang_f['float_op'];
$dir=$lang_f['dir'];
?>


@extends('layout.app')



@section('content')

    <main>

        <div class="container d-flex justify-content-center mt-5">
            <div class="auth-block">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Sign up and start learning</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true"><svg width="28" height="28" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_876_1553)">
                                <path d="M7 21L21 7" stroke="black" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 21L7 7" stroke="black" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_876_1553">
                                <rect width="28" height="28" fill="white"/>
                                </clipPath>
                                </defs>
                                </svg>
                            </span>
                        </button>
                    </div>
                    <div class="modal-body d-flex flex-column align-items-center justify-content-center">
                        @if ($errors->any())
                            <div class="alert alert-warning text-{{ $float }}" style="background-color: #f55a5a;color: #ffffff" role="alert">
                                {!! implode('', $errors->all('<div>- :message</div>')) !!}
                            </div>
                        @endif
                        <form class="w-100" method="POST" action="{{ route('user.register') }}"
                              enctype="multipart/form-data">
                            @csrf
                            <div class="position-relative w-100">
                                <input  class="moadl-btn" style="padding-left: 15px"  type="text" name="first_name" id="" placeholder="Full Name">

                            </div>
                            <div class="position-relative w-100">
                                <input  class="moadl-btn" style="padding-left: 15px" type="email" name="email" id="" placeholder="Email">

                            </div>

                            <div class="position-relative w-100">
                                <input  class="moadl-btn " style="padding-left: 15px"  type="password" name="password" id="" placeholder="Password">

                            </div>
                            <div class="position-relative w-100">
                                <input  class="moadl-btn " style="padding-left: 15px"  type="password" name="password_confirmation" id="" placeholder="password confirmation">

                            </div>
                            <label for="" class="my-3 d-flex">
                                <input type="checkbox" name="" id="" >
                                <span style="padding-left: 10px; text-align: left;" >
                                        Send me special offers, personalized recommendations, and learning tips.
                                    </span>
                            </label>

                            <button class="btn-filled w-100" style="border-radius: 8px; height: 55px;">Checkout</button>
                        </form>
                        <span style="margin-top: 16px;">By signing up, you agree to our <a href="">Terms of Use</a> and
                                <a href="">Privacy Policy.</a></span>
                        <hr class="w-100" style="border-top: 1px solid #E2E2E2;">
                        <span>Already have an account? <a href="" style="color: #59CCC7;" data-bs-toggle="modal" data-bs-target="#SignIn">log in</a></span>

                    </div>
                </div>
            </div>
        </div>


    </main>


@endsection

