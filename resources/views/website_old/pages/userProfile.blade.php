@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')


<!-- page content -->
<div class="sec-padd container"><div class="row">

  <!--<div class="p-1  mb-2 bg-success text-white">حسابك مكتمل بنسبه ١٠٠٪</div>-->
      <!-- col -->
      <div class="col-md-12">
        <div class="tit mb-60 right-tit mt-5">
        الملف الشخصي
        <a class="main-btn light-btn" href="{{ route('editProfile') }}" style="float: left;font-size: 14px;"> <i class="fa fa-edit"> </i> تعديل بيانات الحساب</a></div>

    </div>


    <!-- #col -->

     <!-- col -->
    <div class="col-md-5">
      <!-- <img src="img/inner-logo1.png" height="80"> -->
      <!-- partial:index.partial.html -->

     <div class="circle">



        <img class="profile-pic" src="{{ Auth::user()->image }}">

     </div>


    <form method="post" action="{{ route('change_profile_img') }}" class="form" id="change_profile_img_form" enctype="multipart/form-data">
    {{ csrf_field() }}

        <div class="p-image">
            <i class="fa fa-camera upload-button"></i>
            <input class="file-upload" type="file" accept="image/*" name="image" onchange="getElementById('submit_profile_avatar').click()"  />
            <button type="submit" style="display: none" id="submit_profile_avatar"></button>
        </div>
    </FORM>




<!-- partial -->


    </div>
    <!-- #col -->
    <div class="col-md-7">
      <h5 class="bold "> {{ @Auth::user()->name }}  </h5>
      <table class="table table-borderless ">
          <tbody>
             <tr class="text-right">

                <td>
                    @isset(Auth::user()->country_id)
                        <i class="fa fa-map-marker green-color ml-5"></i> <span class="gray"> {{ @Auth::user()->country->name }} {{ @Auth::user()->city->name }} </span>
                    @endisset
                </td>


                <td>
                    @if(Auth::user()->mobile != null)
                        <i class="fa fa-phone green-color ml-5"></i><a href="tel:{{ Auth::user()->mobile }}" class="gray"> {{ @Auth::user()->mobile }} </a>
                    @endif
                </td>
             </tr>
             <tr class="text-right">
               <td>
                   @isset(Auth::user()->url)
                        <i class="fa fa-globe green-color ml-5"></i> <a href="{{ @Auth::user()->url }}" class="gray"> {{ @Auth::user()->url }} </a>
                    @endisset
                </td>
               <td><i class="fa fa-envelope green-color ml-5"></i> <a href="mailto:{{ @Auth::user()->email }}" class="gray"> {{ @Auth::user()->email }}
 </a></td>
             </tr>

            </tbody>
          </table>

    </div>

    <div class="col-md-12">
      <h5 class="bold ">النبذه</h5>
      <p class="l-32">

        {{ @Auth::user()->bio }}

      </p>
    </div>

    <!-- #col -->

    </div></div>


@endsection
