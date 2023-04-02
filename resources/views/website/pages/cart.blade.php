<?php
$lang_f = lang();
$lang = $lang_f['lang'];
$float = $lang_f['float'];
$float_op = $lang_f['float_op'];
$dir = $lang_f['dir'];
//dd(mb_convert_encoding($course->title,'HTML-ENTITIES','UTF-8'));
//dd(iconv('UTF-8', 'WINDOWS-1256', $course->title));
//dd(mb_convert_encoding($course->title, "windows-1256"));
//dd(iconv($course->title, "CP1256"));
//dd(iconv('UTF-8','WINDOWS-1256',  'ÏæÑÉ ãåÇÑÇÊ ÇáÊÝæíÖ æÇáÊæÌíå'));
//dd(mb_convert_encoding($course->title, 'CP1256'));
?>

@extends('layout.app')

@section('css')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        .course-page .course-data span{
            font: normal normal normal 14px/1 FontAwesome !important;
        }
        a{
            text-decoration:none;
        }
        .hh:hover{
            color: #fff !important;
        }
    </style>


@endsection                                    Checkout

@section('content')

    <main class="cart-page" style="margin-top: 100px">

        <div class="container mt-5">
            <div class="cart">
                <h2>Shopping Cart</h2>
                <p><span>
                         @if(session('cart') != '')
                            {{ count(session('cart'))  }}
                        @else
                            0
                        @endif

                    </span> Course in Cart</p>
                <div class="row">
                    @php $total = 0 @endphp
                    @if(session('cart'))

                        <div class="col-lg-8 col-12 ">
                            @foreach(session('cart') as $id => $details)
                                <?php $course = \App\Models\Course::find($details['course_id']); ?>
                                {{--                                @php $total += $details['price'] * $details['quantity'] @endphp--}}
                                <input id="cart_id" type="hidden" value="{{ $id }}" data-id="{{ $id }}">
                                <div class="cart-item col-12 row m-0" id="course_{{ $id }}">
                                    <div  class="col-md-4 col-12 h-100 p-0">
                                        <img src="{{ $course->image }}" alt="">

                                    </div>
                                    <div class="col-md-8 col-12 item-data mt-md-0 mt-3">
                                        <div class="d-flex justify-content-between">
                                            <h3>{{ $course->title }}</h3>
                                            @if($course->discount != '' && $course->price_after_discount != '')
                                                <span>{{ $course->price_after_discount }}$</span>
                                            @else
                                                <span>{{ $course->price }}$</span>
                                            @endif

                                        </div>
                                        <div  class="d-flex justify-content-between">
                                            <p>{{ $course->summary }}</p>
                                            @if($course->discount != '' && $course->price_after_discount != '')
                                                <span>{{ $course->price }}$</span>
                                            @else

                                            @endif

                                        </div>
                                        <div class="d-flex align-items-xl-center mb-2">
                                    <span class="btn-filled" style="height: 26px; font-size: 10px;width: fit-content;
    padding: 5px;; margin-right: 10px;">{{ $course->category->name }}</span>
                                            <span style="margin-right:15px;">5.0</span>
                                            <div class="stars" style="margin-right:15px;">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                            </div>
                                            <p class="m-0" style="opacity: 1;">(<span>1395</span> ratings)</p>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center" >
                                            <p class="m-0"><span>21</span> total hours • <span>110</span> lectures • All Levels</p>
                                            <button class="remove-from-cart" data-id="{{ $id }}" style="border:none;background-color: #fff !important; padding: 0px;">
                                                <svg class="delete-item" width="25" height="26" viewBox="0 0 25 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g clip-path="url(#clip0_874_2288)">
                                                        <path d="M5.30212 10.1292L7.21876 21.06C7.38542 22.035 8.20833 22.75 9.16667 22.75H15.8229C16.7813 22.75 17.6042 22.0458 17.7708 21.06L19.6875 10.1292" stroke="#DCDCDC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M3.15625 6.69507H21.9062" stroke="#DCDCDC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M7.52075 6.69503L9.05203 3.7917C9.22912 3.4667 9.56247 3.26086 9.91664 3.26086H15.0833C15.4478 3.26086 15.7812 3.4667 15.9479 3.7917L17.4791 6.69503" stroke="#DCDCDC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                        <path d="M14.5938 14.0834H10.4062" stroke="#DCDCDC" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                                    </g>
                                                    <defs>
                                                        <clipPath id="clip0_874_2288">
                                                            <rect width="25" height="26" fill="white"/>
                                                        </clipPath>
                                                    </defs>
                                                </svg>

                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="col-lg-8 col-12 cart-item ">
                            <p class="m-0">
                                Cart is epmty

                            </p>
                        </div>
                    @endif

                    <div class="col-lg-4 col-12">
                        <div class="price-block">
                            <div>
                                <span>Total:</span>
                                <span class="price">{{ $cart_total_price }}$</span>
{{--                                <span class="old">84.99$</span>--}}
{{--                                <span class="discount">80$ off</span>--}}
                                <a  href="{{ route('cart_checkout') }}" class="btn-filled w-100 py-4 mt-3 hh" style="border-radius: 10px;">
                                    Checkout
                                </a>
                            </div>
{{--                            <hr class="w-100" style="border-top: 1px solid #E4E4E4;">--}}
{{--                            <div class="promo pt-0 pb-4">--}}
{{--                                <h5>Promotions</h5>--}}
{{--                                <p>ST10MT92622 is applied</p>--}}
{{--                                <form class="d-flex">--}}
{{--                                    <input type="text" name="" placeholder="Enter Coupon" id="" style="border-radius: 10px 0px 0px 10px">--}}
{{--                                    <button class="btn-filled applay-coupon" style="border-radius: 0px 10px 10px 0px">Apply</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
                        </div>


                    </div>

                </div>
            </div>


            <div class="suggestion-block mt-5">
                <h2>
                    {{ __('cp.You might also like') }}

                </h2>

                <div class="row">
                    @foreach($coursesChoose as $oneCourse)
                        <div class="col-lg-3 col-md-6 my-3">
                            <div class="card">
                                <img class="card-img-top" src="{{ $oneCourse->image }}">
                                <div class="card-body">
                                    <a href="" class="tag">{{ $oneCourse->category->name }}</a>
                                    <div>
                                        <h5 class="card-title">{{ $oneCourse->title }}</h5>
                                        <p><span>{{ $oneCourse->price }}</span>$</p>
                                    </div>
                                    <p class="card-text">{{ \Illuminate\Support\Str::limit($oneCourse->summary, 150) }} </p>
                                    <a href="{{ route('view_course' , ['id' => $oneCourse->id]) }}" class="btn-filled">
                                        <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_858_2054)">
                                                <path d="M18.3933 4.40735L13.975 17.1007C13.7605 17.716 12.8799 17.7673 12.589 17.1886L10.1309 12.3178L18.3933 4.41467V4.40735Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                                <path d="M18.3934 4.40735L10.131 12.3105L5.03879 9.952C4.43385 9.67367 4.48745 8.82403 5.13067 8.61894L18.401 4.40002L18.3934 4.40735Z" stroke="white" stroke-width="1.3" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            <defs>
                                                <clipPath id="clip0_858_2054">
                                                    <rect width="23" height="22" fill="white"/>
                                                </clipPath>
                                            </defs>
                                        </svg>

                                        {{ __('cp.Register now') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>


    </main>


@endsection


@section('script')
    <script type="text/javascript">

        $(".update-cart").change(function (e) {
            e.preventDefault();

            var ele = $(this);

            $.ajax({
                url: '{{ route('update_cart') }}',
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("input").attr("data-id"),
                    quantity: ele.parents("tr").find(".quantity").val()
                },
                success: function (response) {
                    window.location.reload();
                }
            });
        });

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);
            var item = $(this).attr("data-id");
            // var item = $('#cart_id').attr('data-id');
            var course_section = '#course_'+item;

            Swal.fire({
                title: '{{ __('cp.Are you sure?') }}',
                text: "{{ __('cp.You won\'t be able to revert this!') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: '{{ __('cp.Yes, delete it!') }}'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '{{ route('remove_from_cart') }}',
                        method: "DELETE",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: item
                            // id: ele.parents("tr").attr("data-id")
                        },
                        success: function (response) {
                            console.log(response);
                            $('#cart_count').html(response.count_cart);
                            $(course_section).remove();
                            Swal.fire({
                                icon: 'success',
                                title: '{{ __('cp.Success') }}',
                                text: '{{ __('cp.The course has been deleted from your cart') }}!',
                                // footer: '<a href="javascript:;">Responderemos assim que possível.</a>',
                                timer: 1500,
                                timerProgressBar: true
                            })
                            // window.location.reload();
                        }
                    });
                }
            })

            {{--if(confirm("Are you sure want to remove?")) {--}}
            {{--    $.ajax({--}}
            {{--        url: '{{ route('remove_from_cart') }}',--}}
            {{--        method: "DELETE",--}}
            {{--        data: {--}}
            {{--            _token: '{{ csrf_token() }}',--}}
            {{--            id: item--}}
            {{--            // id: ele.parents("tr").attr("data-id")--}}
            {{--        },--}}
            {{--        success: function (response) {--}}
            {{--            console.log(response);--}}
            {{--            $(course_section).remove();--}}
            {{--            Swal.fire({--}}
            {{--                icon: 'success',--}}
            {{--                title: '{{ __('cp.Success') }}',--}}
            {{--                text: '{{ __('cp.The course has been deleted from your cart') }}!',--}}
            {{--                // footer: '<a href="javascript:;">Responderemos assim que possível.</a>',--}}
            {{--                timer: 1500,--}}
            {{--                timerProgressBar: true--}}
            {{--            })--}}
            {{--            // window.location.reload();--}}
            {{--        }--}}
            {{--    });--}}
            {{--}--}}
        });

    </script>
@endsection