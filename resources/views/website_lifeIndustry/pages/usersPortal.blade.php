@extends('layout.app')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

    <div class="container sec-padd">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8 box-login box-shadow">
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="tab-login" data-bs-toggle="tab" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">تسجيل الدخول</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="tab-register" data-bs-toggle="tab" href="#pills-register" role="tab" aria-controls="pills-register" aria-selected="false">حساب جديد</a>
                    </li>
                </ul>

                <div class="tab-content">
                    <div class="tab-pane fade active show" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <form id="loginUsers" method="post" action="{{ route('loginUsers') }}" enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}

                            <div class="form-outline  mb-4">
                                <label class="form-label" for="loginName">البريد الالكتروني</label>
                                <input type="email" id="loginName" name="email" value="{{ old('email') }}" class="form-control" required>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginPassword">كلمه المرور</label>
                                <input type="password" id="loginPassword" name="password" class="form-control" required>
                            </div>
                            <div class="row mb-4">
                                <div class="col-md-6 d-flex justify-content-right">
                                    <div class="form-check mb-3 mb-md-0">
                                        <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked="">
                                        <label class="form-check-label" for="loginCheck">تذكرني</label>
                                    </div>
                                </div>
                                <div class="col-md-6 d-block text-left">
                                    <a href="#!">نسيت كلمه المرور</a>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn search-btn light-btn" style="float: none;">دخول</button>
                            </div>
                            <!--<div class="text-center mt-3">-->
                            <!--    <p>لست عضوا ؟ <a href="#!">حساب جديد</a></p>-->
                            <!--</div>-->
                        </form>
                    </div>


                    <div class="tab-pane fade" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <form id="storeNewUser" method="post" action="{{ route('storeNewUser') }}" enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="registerName">الاسم</label>
                                <input type="text" id="registerName" name="name" value="{{ old('name') }}" class="form-control" required>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="registerEmail">البريد الالكتروني</label>
                                <input type="email" id="registerEmail" name="email"value="{{ old('email') }}" class="form-control" required>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="registerPassword">كلمه المرور</label>
                                <input type="password" id="registerPassword" name="password" class="form-control" required>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="registerRepeatPassword">تآكيد كلمه المرور</label>
                                <input type="password" id="registerRepeatPassword" name="confirm_password" class="form-control" required>
                            </div>
                            <div>
                                <label class="form-label">النوع</label>
                            </div>
                            <div class="accordion" id="accordionExample">
                                <div class="mb-3">
                                    <div class="form-check  mb-1">
                                        <input class="form-check-input" type="radio" name="type" value="user" id="type1" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <label class="form-check-label" for="type1">مستخدم</label>
                                    </div>
                                    <div style="height: 0 !important; display: none;">
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                    </div>
                                </div>
                                </div>
                                <div class="mb-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input collapsed" type="radio" name="type" value="ambassador" id="type2" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <label class="form-check-label" for="type2">سفير</label>
                                    </div>
                                    <div style="height: 0 !important; display: none;">
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample" style="">
                                    </div>
                                </div>
                            </div>
                                <div class="mb-3">
                                    <div class="form-check mb-2">
                                        <input class="form-check-input collapsed" type="radio" name="type" id="type3" value="association" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        <label class="form-check-label" for="type3">جمعيه</label>
                                    </div>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample" style="">
                                        <div class="accordion-body">
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="association_name">اسم الجمعيه</label>
                                                <input type="text" id="association_name" name="association_name" value="{{ old('association_name') }}" class="form-control">
                                            </div>
                                            <div class="form-outline mb-4">
                                                <label class="form-label" for="association_id">رقم هويه الجميعه</label>
                                                <input type="text" id="association_id" name="association_id" value="{{ old('association_id') }}" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="association_image" class="form-label">صوره الجميعه</label>
                                                <input class="form-control" type="file" id="association_image" name="association_image">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center"><button type="submit" class="btn search-btn light-btn  mb-5">تسجيل </button></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


@endsection
