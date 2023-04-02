@extends('layout.siteLayout')

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
                        
                        
                        <a class="nav-link active" id="tab-login" data-bs-toggle="tab" href="#pills-login" role="tab" aria-controls="pills-login" aria-selected="true">
                            تعديل بيانات الحساب  
                             </a>
                    </li>
        
        
                </ul>
                
                <div class="tab-content">
                    <div class="tab-pane fade active show" id="pills-login" role="tabpanel" aria-labelledby="tab-login">


                        <form id="storeNewUser" method="post" action="{{ route('updateProfile') }}" enctype="multipart/form-data" class="form-horizontal" role="form">
                        {{ csrf_field() }}
                            <div class="form-outline mb-4">
                                <label class="form-label" for="registerName">الاسم</label>
                                <input type="text" id="registerName" name="name" value="{{ @Auth::user()->name }}" class="form-control" required>
                            </div>
                            <div class="form-outline mb-4">
                                <label class="form-label" for="registerEmail">البريد الالكتروني</label>
                                <input type="email" id="registerEmail" name="email"value="{{ @Auth::user()->email }}" class="form-control" disabled>
                            </div>
                          
                          <div class="form-outline mb-4">
                                <label class="form-label" for="mobile">الموبايل</label>
                                <input type="text" id="mobile" name="mobile" value="{{ @Auth::user()->mobile }}" class="form-control" >
                            </div>
                            
                            
                                    <fieldset>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="country_id"> {{ __('cp.country') }} </label>
                                    <div class="col-md-6">  
                                        <select name="country_id" id="country_id" class="form-control">
                                            @foreach($countries as $one)
                                                <option {{Auth::user()->country_id == $one->id? "selected" : ""}} value="{{$one->id}}">{{$one->name}}</option>
                                            @endforeach   
                                        </select>           
                                    </div>
                                </div>
                            </fieldset> 


                            <fieldset>
                                <div class="form-group" style="margin-top: 10px;">
                                    <label class="col-sm-2 control-label" for="city_id"> {{ __('cp.city') }} </label>
                                    <div class="col-md-6">  
                                        <select name="city_id" id="city_id" class="form-control ">
                                            @foreach($cities as $one)
                                                <option {{Auth::user()->city_id == $one->id? "selected" : ""}} value="{{$one->id}}">{{$one->name}}</option>
                                            @endforeach   
                                        </select>           
                                    </div>
                                </div>
                            </fieldset> 
                            
                 
                            
                             <div class="form-outline mb-4" style="margin-top: 10px;">
                                <label class="form-label" for="url">الموقع الالكتروني</label>
                                <input type="text" id="url" name="url" value="{{ @Auth::user()->url }}" class="form-control" >
                            </div>
                            
                            
                            <div class="form-outline mb-4">
                                <label class="form-label" for="bio"> نبذة </label>
                                  <textarea rows="4" class="form-control" name="bio" id="bio" required="" aria-required="true"> {{ @Auth::user()->bio }} </textarea>
                            </div>
                   
                            <div class="text-center"><button type="submit" class="btn search-btn light-btn  mb-5">تعديل </button></div>
                        </form>


                    </div>
            
            
               
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>


@endsection
  