<?php
$lang_f = lang();
$lang = $lang_f['lang'];
$float = $lang_f['float'];
$float_op = $lang_f['float_op'];
$dir = $lang_f['dir'];
?>

@extends('layout.app')
@section('css')
    <style>
        .form-group {
            height: 100px !important;
        }

        .form-control {
            height: 50px !important;
        }

        .hide {
            display: none;
        }
        .has-error .control-label, .has-error .help-block {
            color: #a94442 !important;
        }
        .has-error .form-control {
            border-color: #a94442 !important;
            -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%) !important;
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 8%) !important;
        }
    </style>

@endsection
@section('content')

    <main class="checkout-page">
        <div class="container mt-5 checkout-block" style="margin-top:130px !important;">
            <h2>Checkout</h2>

            <div class="row mt-5">
                <div class="col-lg-8 col-12 ">
                    <h3>Payment Method</h3>
                    {{--                        <h3 class="mt-5">Payment Method</h3>--}}
                    <div class="accordion  mt-3" id="checkoutAccordion">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading1">
                                <button type="button" class="accordion-button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse1">
                                    <div for="card"
                                         class="w-100 d-flex d-flex justify-content-between align-items-center w-100">
                                        <h4>Credit / Debit Card</h4>
                                        <div>
                                            <img src="{{url(assets('website'))}}/images/130px-Mada_Logo 1.png"
                                                 alt="">
                                            <img src="{{url(assets('website'))}}/images/visa.png" alt="">
                                            <img src="{{url(assets('website'))}}/images/master.png" alt="">
                                        </div>

                                    </div>

                                </button>
                            </h2>
                            <div id="collapse1" class="accordion-collapse collapse show"
                                 data-bs-parent="#checkoutAccordion">
                                <div class="card-body">
                                    <form
                                            role="form"
                                            action="{{ route('stripe.courseStripeCheckout') }}"
                                            method="post"
                                            class="require-validation credit_card_pay"
                                            data-cc-on-file="false"
                                        
                                            id="payment-form">
                                        @csrf
                                        @if($course->discount != '' && $course->price_after_discount != '')
                                        <input type="number" name="price" value="{{  $course->price_after_discount }}" hidden>
                                        @else
                                            <input type="number" name="price" value="{{  $course->price }}" hidden>
                                        @endif
                                        <input type="number" name="course_id" value="{{  $course->id }}" hidden>


                                    @if (Session::has('success'))
                                            <div class="alert alert-success text-center">
                                                <a href="#" class="close" data-bs-dismiss="alert"
                                                   aria-label="close">×</a>
                                                <p>{{ Session::get('success') }}</p>
                                            </div>
                                        @endif

                                        <div class='form-row row'>
                                            <div class='col-md-12 error form-group hide'>
                                                <div class='alert-danger alert'>
                                                    Please correct the errors and try again.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group required'>
                                                    <label class='control-label'>Name on Card</label>
                                                    <input class='form-control' size='4' type='text'
                                                           placeholder='Name on Card'>
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-xs-12 form-group card_number required'>
                                                    <label class='control-label'>Card Number</label>
                                                    <input autocomplete='off'
                                                           class='form-control card-number'
                                                           size='20'
                                                           placeholder='Card Number'
                                                           type='text'>
                                                </div>
                                            </div>

                                            <div class='form-row row'>
                                                <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                    <label class='control-label'>CVC</label>
                                                    <input autocomplete='off'
                                                           class='form-control card-cvc'
                                                           placeholder='ex. 311'
                                                           size='4'
                                                           type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Month</label>
                                                    <input
                                                            class='form-control card-expiry-month' placeholder='MM'
                                                            size='2'
                                                            type='text'>
                                                </div>
                                                <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                    <label class='control-label'>Expiration Year</label>
                                                    <input
                                                            class='form-control card-expiry-year' placeholder='YYYY'
                                                            size='4'
                                                            type='text'>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12">
                                                @if(Auth()->check())
                                                    <button class="btn-filled w-100 py-4 mt-3" type="submit">
                                                        Complete Checkout
                                                    </button>
                                                @else
                                                    <a href="" class="btn-filled w-100 py-4 mt-3" data-bs-toggle="modal" data-bs-target="#SignIn">
                                                        Complete Checkout
                                                    </a>
                                                @endif
                                            </div>
                                        </div>


                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-12">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3 class="mt-2">Summary</h3>
                    </div>
                    <div class="checkout-summary">
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Original price:</span>
                            <span>${{ $course->price }}</span>
                        </div>
                        @if($course->discount != '' && $course->price_after_discount != '')
                        <div class="d-flex justify-content-between align-items-center">
                            <span>Discounts:</span>
                            <span>- %{{ $course->discount }}</span>
                        </div>
                            <hr class="w-100" style="border-top: 1px solid #E4E4E4;">
                            <div class="d-flex justify-content-between align-items-center">
                                <span style="color: #59CCC7;font-weight: 500; ">Total:</span>
                                <span>${{ $course->price_after_discount }}</span>
                            </div>
                        @else
                            <hr class="w-100" style="border-top: 1px solid #E4E4E4;">
                            <div class="d-flex justify-content-between align-items-center">
                                <span style="color: #59CCC7;font-weight: 500; ">Total:</span>
                                <span>${{ $course->price }}</span>
                            </div>
                        @endif



                        <p>By completing your purchase you agree to these <a href="">Terms of Service</a>.
                        </p>
                        {{--                        <button class="btn-filled w-100 py-4 mt-3" style="border-radius: 10px;">--}}
                        {{--                            Complete Checkout--}}
                        {{--                        </button>--}}
                        <p style="text-align: center;">
                            30-Day Money-Back Guarantee
                        </p>

                    </div>


                </div>

            </div>


        </div>


        <div style="height: 200px;"></div>
    </main>


@endsection
@section('script')
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>

    <script type="text/javascript">

        $(function () {

            /*------------------------------------------
            --------------------------------------------
            Stripe Payment Code
            --------------------------------------------
            --------------------------------------------*/

            var $form = $(".require-validation");

            $('form.require-validation').bind('submit', function (e) {
                var $form = $(".require-validation"),
                    inputSelector = ['input[type=email]', 'input[type=password]',
                        'input[type=text]', 'input[type=file]',
                        'textarea'].join(', '),
                    $inputs = $form.find('.required').find(inputSelector),
                    $errorMessage = $form.find('div.error'),
                    valid = true;
                $errorMessage.addClass('hide');

                $('.has-error').removeClass('has-error');
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === '') {
                        $input.parent().addClass('has-error');
                        $errorMessage.removeClass('hide');
                        e.preventDefault();
                    }
                });

                if (!$form.data('cc-on-file')) {
                    e.preventDefault();
                    Stripe.setPublishableKey('{{ $stripeKey }}');
                    Stripe.createToken({
                        number: $('.card-number').val(),
                        cvc: $('.card-cvc').val(),
                        exp_month: $('.card-expiry-month').val(),
                        exp_year: $('.card-expiry-year').val(),
                        name: '{{ auth()->user()->name ?? 'Test name'}}'

                    }, stripeResponseHandler);
                }

            });

            /*------------------------------------------
            --------------------------------------------
            Stripe Response Handler
            --------------------------------------------
            --------------------------------------------*/
            function stripeResponseHandler(status, response) {
                if (response.error) {
                    $('.error')
                        .removeClass('hide')
                        .find('.alert')
                        .text(response.error.message);
                } else {
                    /* token contains id, last4, and card type */
                    var token = response['id'];

                    $form.find('input[type=text]').empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }

        });
    </script>
@endsection