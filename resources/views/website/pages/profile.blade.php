@extends('layout.app')

@section('content')

    <!-- section 1-->
{{--    <div class="courses-header-section">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-5 text-right">--}}
{{--                    <a href="{{ route('home') }}" class="link-page"> {{ __('cp.home') }}--}}
{{--                    </a>--}}
{{--                    /--}}
{{--                    <a href="{{ route('user.profile') }}" class="link-page active">{{ __('cp.profile') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="row">--}}
{{--                <div class="col-md-5 text-right projects-title">--}}
{{--                    <h3>--}}
{{--                        {{ __('cp.profile') }}--}}
{{--                    </h3>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
    <!-- #End section 1-->
    <!-- section 2-->
    <div class="profile-data  " style="margin-top:120px;">
        <div class="container edit-profile">
            @if ($errors->any())
                <div class="alert alert-warning text-right" style="background-color: #f55a5a;color: #ffffff" role="alert">
                    {!! implode('', $errors->all('<div>- :message</div>')) !!}
                </div>
            @endif
            <form action="{{ route('user.profileData.update' , [auth()->user()->id]) }}" method="post"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="d-flex justify-content-between align-items-center course-data my-4">
                        <div class="profile-image d-flex justify-content-center align-items-center">
                            <img class="img-circle " id="user_img"
                                 src="{{ url('uploads/users/'.auth()->user()->image) ??  url('assets/images/user_image.jpg')}}">

                            <input id="imgupload" name="image" class="border-0 d-none" style="border-radius:0px; width:auto; height:auto; margin-left:50px"  type="file" onchange="readURL(this);"/>

                        </div>


                        <div>
                            <button type="submit" id="edit-button" class="btn btn-primary update-profile-info">
                                <i class="fa fa-pen-to-square"></i>
                                Edit Profile
                            </button>

                        </div>
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="name" class="form-label">{{ __('cp.user name') }}</label>
                        <input disabled type="text" name="name" value="{{ auth()->user()->name ?? ''}}"
                               class="form-control text-right" id="name"
                               placeholder="{{ __('cp.user name') }}">
                    </div>

                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="jop" class="form-label">{{ __('cp.Jop Title') }}</label>
                        <input disabled type="text" name="job_title" value="{{ auth()->user()->job_title ?? ''}}"
                               class="form-control text-right" id="jop"
                               placeholder="{{ __('cp.job title') }}">
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="email" class="form-label">{{ __('cp.email') }}</label>
                        <input disabled type="email" name="email" value="{{ auth()->user()->email ?? ''}}"
                               class="form-control text-right" id="email"
                               placeholder="{{ __('cp.email') }}">
                    </div>


                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <label for="number"
                               class="form-label">{{ __('cp.Phone Number') }}</label>
                        <input disabled type="text" name="phone" value="{{ auth()->user()->phone ?? ''}}"
                               class="form-control text-right" id="number"
                               placeholder="">
                    </div>


{{--                    <div class="form-group col-md-12 col-sm-12 col-xs-12">--}}
{{--                        <label for="description"--}}
{{--                               class="form-label">description</label>--}}
{{--                        <textarea disabled type="text" name="company_name"--}}
{{--                                  value="description"--}}
{{--                                  class="form-control text-right" id="description"--}}
{{--                                  placeholder="Description"></textarea>--}}
{{--                    </div>--}}



                    <div class="form-group col-md-6 col-sm-6 col-xs-12" style="display: none" id="saveBtn">

                        <button type="submit" class="btn btn-primary" >{{ __('cp.Save') }} </button>
                    </div>
                    
                    
                </div>
            </form>
        </div>
    </div>
    <!-- #End section 2-->
    <!-- section 3-->





@endsection

@section('script')
    <script>

        function deleteImage() {
            document.getElementById("user_img").setAttribute("src", "http://localhost/lifeIndustry/public/website/assets/img/user_image.jpg");
        }

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#user_img')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }

        function enableInputsOnEdit() {
            // Get the edit button
            const editButton = document.querySelector('#edit-button');



            // Add a click event listener to the edit button
            editButton.addEventListener('click', (event) => {
                // Prevent the default action of the button (refreshing the page)
                event.preventDefault();
                $('#saveBtn').css("display" , "block");
                // Get all the input elements on the page
                const inputElements = document.querySelectorAll('input');
                const areaElements = document.querySelectorAll('textarea');

                // Remove the disabled attribute from each input element
                inputElements.forEach((input) => {
                    input.removeAttribute('disabled');
                });
                areaElements.forEach((input) => {
                    input.removeAttribute('disabled');
                });

                $('#imgupload').removeClass("d-none")
                $('#imgupload').addClass("d-block")

            });
        }
        enableInputsOnEdit();
    </script>
@endsection



