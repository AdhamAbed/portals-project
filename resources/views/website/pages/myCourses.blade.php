@extends('layout.app')

@section('content')

    <!-- section 1-->
    <div class="courses-header-section">
        <div class="container">
            <div class="row">
                <div class="col-md-5 text-right">
                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}</a>
                    /
                    <a href="{{ route('user.my_courses') }}" class="link-page active">{{ __('cp.my courses') }}</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5 text-right courses-title">
                    <h3>
                        {{ __('cp.my courses') }}
                    </h3>
                </div>
            </div>
        </div>
    </div>
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="my-courses-section">
        <div class="container">
{{--            <form action="{{ route('user.my_course.search') }}" method="GET" role="search">--}}
            <div class="row">
                <div class="col-md-12 text-right">
                    <div class="input-group md-form form-sm form-1 pl-0">
                        <input class="form-control my-0 py-1 course_search" id="course-search-input" type="text"
                               placeholder="ابحث عن الدورات" name="search"
                               aria-label="Search">
                        <div class="input-group-prepend">
                          <span class="input-group-text purple lighten-3" id="basic-text1">
                              <i class="fas fa-search text-white" aria-hidden="true"></i>
                          </span>
                        </div>
                    </div>
                </div>
            </div>
{{--            </form>--}}
            <div class="row courses-list">
                @isset($courses)
                    @foreach($courses as $course)
                        <input type="text" value="{{ $course->course->id }}" name="course_id" style="display: none">

                        <div class="card">
                            <div class="my_course_links">
                                <button type="button" id="my_course_option_list" data-toggle="dropdown"
                                        aria-haspopup="true" aria-expanded="false">
                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="my_course_option_list">
                                    <p class="text-right"> {{ __('cp.lists') }}</p>
                                    <a class="dropdown-item"
                                       onclick="setClipboard('{{ route('view_course' , ['id' =>$course->course->id]) }}')"><i
                                            class="fa fa-share"></i> {{ __('cp.share') }}</a>
                                    <form action="{{ route('user.add_favorite' , ['id' =>$course->course->id]) }}"
                                          method="post">
                                        @csrf
                                        @if(count($course->course->favorite) > 0)
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-heart" style="color:red !important"></i> {{ __('cp.favorite') }}</button>
                                        @else
                                            <button type="submit" class="dropdown-item">
                                                <i class="fas fa-heart"></i> {{ __('cp.favorite') }}</button>
                                        @endif
                                    </form>
                                </div><!-- dropdown-menu -->
                            </div><!-- user_links -->
                            @if($course->discount != '')
                                <div class="sale-course"> {{ __('cp.discount_v') }}{{$course->course->discount }}%</div>
                            @endif
                            <img src="{{$course->course->image }}" class="card-img-top"
                                 alt="{{$course->course->title }}">
                            <div class="card-body">
                                <h5 class="card-title course-title">{{$course->course->title }}</h5>
                                <?php
                                $courses_rate = \App\Models\CourseComments::where('course_id', $course->course->id)->get()
                                ?>
                                <div class="course-rate">
                                    @if(count($courses_rate) > 0 )
                                        <?php $rating = number_format($course->avg_rating, 2) ?>
                                        @if($rating == 1 || $rating< 1.5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @elseif($rating > 1.5 && $rating < 2)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-half-empty"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @elseif($rating == 2 || $rating< 2.5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @elseif($rating > 2.5 && $rating< 3)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-half-empty"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @elseif($rating == 3 || $rating< 3.5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @elseif($rating > 3.5 && $rating< 4)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-half-empty"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @elseif($rating == 4 || $rating< 4.5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @elseif($rating > 4.5 && $rating< 5)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star-half-empty"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @elseif($rating == 5 || $rating < 6)
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="fa fa-star checked"></span>
                                            <span class="user-rate-count"> <small>{{ $rating }} ({{ count($courses_rate) }})</small></span>
                                        @endif
                                    @else
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="user-rate-count"> <small>0 (0)</small></span>
                                    @endif
                                </div>
                                @if($course->discount != '' &&$course->course->price_after_discount != '')
                                    <p class="card-text course-price">
                                        {{$course->course->price_after_discount }} {{ __('cp.dollars') }}
                                        <span class="old-price">
                                              <del> <small>{{$course->course->price }} {{ __('cp.dollars') }}</small></del>
                                        </span>
                                    </p>
                                @else
                                    <p class="card-text course-price">
                                        {{$course->course->price ?? '0'}} {{ __('cp.dollars') }}
                                    </p>
                                @endif
                                <a href="{{ route('view_course' , ['id' =>$course->course->id]) }}"
                                   class="btn btn-primary course-register">{{ __('cp.go to course') }}</a>
                            </div>
                        </div>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
    <!-- #End section 2-->

@endsection

@section('script')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script type="application/javascript">
        function copyToClipboard(id) {
            document.getElementById(id).select();
            document.execCommand('copy');
        }

        function setClipboard(value) {
            var tempInput = document.createElement("input");
            tempInput.style = "position: absolute; left: -1000px; top: -1000px";
            tempInput.value = value;
            document.body.appendChild(tempInput);
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);

            alert('{{ __('cp.share link') }}');

        }

    </script>

@endsection



