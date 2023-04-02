@extends('layout.adminLayout')

@section('title')
    {{ __('cp.ads') }}
@endsection

@section('css')
@endsection

@section('content')

    <form method="post" action="{{ route('admin.ads.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">


            <!--<fieldset>-->
            <!--    <div class="form-group">-->
            <!--        <label class="col-sm-2 control-label" for="type">-->
        <!--            {{ __('cp.ads_place') }}-->
            <!--            <span class="symbol">*</span>-->
            <!--        </label>-->
            <!--        <div class="col-md-6">-->
            <!--            <select name="type" id="type" class="form-control">-->
        <!--                <option {{ $item->type == 'home'? "selected" : "" }} value="home"> {{ __('cp.home') }} </option>-->
        <!--                <option {{ $item->type == 'inside'? "selected" : "" }} value="inside"> {{ __('cp.inside') }} </option>-->
            <!--            </select>-->
            <!--        </div>-->
            <!--    </div>-->
            <!--</fieldset>-->


            <!--<div class="form-group">-->
            <!--    <label class="col-sm-2 control-label" for="image_video">-->
            <!--        {{ __('cp.type') }}-->
            <!--        <span class="symbol">*</span>-->
            <!--    </label>-->
            <!--    <div class="col-md-6">-->

            <!--        <select name="image_video" id="image_video" class="form-control">-->
            <!--            <option {{ $item->image_video == 'image'? "selected" : "" }} value="image"> {{ __('cp.image') }}  </option>-->
            <!--            <option {{ $item->image_video == 'video'? "selected" : "" }} value="video"> {{ __('cp.video') }}  </option>-->
            <!--        </select>-->
            <!--    </div>-->
            <!--</div>-->


            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="order">
                        {{__('cp.details_'.$locale->lang)}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="name_{{$locale->lang}}"
                               placeholder="{{__('cp.title_'.$locale->lang)}}"
                               id="name_{{$locale->lang}}"
                               value="{{ @$item->translate($locale->lang)->name}}" required>
                    </div>
                </div>
            @endforeach



            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.details_'.$locale->lang)}}
                    </label>
                    <div class="col-md-6">
                                <textarea class="form-control" name="details_{{$locale->lang}}" rows="6"
                                          placeholder="{{__('cp.details_'.$locale->lang)}}">{{ @$item->translate($locale->lang)->details}}</textarea>
                    </div>
                </div>
            @endforeach


            <div class="form-group">
                <label class="col-sm-2 control-label" for="order">
                    {{__('cp.ads_url')}}
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="url" value="{{ $item->url }}" id="url"
                           placeholder=" {{__('cp.ads_url')}}">
                </div>
            </div>


            <!--<div class="video form-group display-hide">-->
            <!--    <label class="col-sm-2 control-label" for="file">-->
            <!--        {{__('cp.videoFile')}}-->
            <!--    </label>-->

            <!--    <div class="col-md-6">-->
            <!--        <input type="file" class="form-control" id="file" name="file">-->
            <!--    </div>-->
            <!--</div>-->


            <Br><Br>
            <div class="img display-hide">
                <legend>{{__('cp.image')}}</legend>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer">
                            <img src="{{url($item->image)}}" id="editImage" style="max-width:100%;">
                        </div>
                        <div class="btn red" onclick="document.getElementById('edit_image').click()">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                    </div>
                </div>
            </div>

            <Br><Br>

            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.ads.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>

@endsection

@section('js')

@endsection

@section('script')

    <script>

        $('#edit_image').on('change', function (e) {

            readURL(this, $('#editImage'));

        });

        $("#image_video").change(function () {
            var selected = $(this).children("option:selected").val();
            if (selected == 'image')//img
            {
                $('.img').removeClass('display-hide');
                $('.video').addClass('display-hide');

            } else if (selected == 'video')//video
            {
                $('.img').addClass('display-hide');
                $('.video').removeClass('display-hide');
            }
        });


        if ($("#image_video").val() == 'image') {
            $('.img').removeClass('display-hide');
            $('.video').addClass('display-hide');
        } else if ($("#image_video").val() == 'video') {
            $('.img').addClass('display-hide');
            $('.video').removeClass('display-hide');
        }

    </script>

@endsection

