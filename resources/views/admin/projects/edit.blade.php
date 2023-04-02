@extends('layout.adminLayout')
@section('title')
    {{ __('cp.projects') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.projects.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">


            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}">
                        {{__('cp.title_'.$locale->lang)}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="title_{{$locale->lang}}"
                               placeholder="{{__('cp.title_'.$locale->lang)}}"
                               id="name_{{$locale->lang}}"
                               value="{{ @$item->translate($locale->lang)->title}}" required>
                    </div>
                </div>
            @endforeach
                @foreach($locales as $locale)
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="description_{{$locale->lang}}">
                            {{__('cp.description_'.$locale->lang)}} <span class="symbol">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea rows="6" class="form-control" name="description_{{$locale->lang}}" id="description_{{$locale->lang}}" required aria-required="true">
                                 {{ @$item->translate($locale->lang)->description}}
                            </textarea>

                        </div>
                    </div>
                @endforeach
                @foreach($locales as $locale)
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="subdescription_{{$locale->lang}}">
                            {{__('cp.subdescription_'.$locale->lang)}} <span class="symbol">*</span>
                        </label>
                        <div class="col-md-6">
                            <textarea rows="6" class="form-control" name="subdescription_{{$locale->lang}}" id="subdescription_{{$locale->lang}}" required aria-required="true">
                                 {{ @$item->translate($locale->lang)->subdescription}}
                            </textarea>

                        </div>
                    </div>
                @endforeach
                @foreach($locales as $locale)
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="customer_name_{{$locale->lang}}">
                            {{__('cp.customer_name_'.$locale->lang)}} <span class="symbol">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="customer_name_{{$locale->lang}}"
                                   placeholder=" {{__('cp.customer_name')}} {{$locale->lang}}" id="customer_name_{{$locale->lang}}"
                                   value="{{ @$item->translate($locale->lang)->customer_name}}" required>
                        </div>
                    </div>
                @endforeach

                <div class="form-group">
                    <label class="col-sm-2 control-label" for="date">
                        {{ __('cp.date') }} <span class="symbol">*</span>
                    </label>
                    <div class="col-md-3" >
                        <input type="text" class="form-control" name="date"
{{--                        <input type="date" class="form-control" name="date"--}}
                               placeholder=" {{__('cp.date')}}" id="date"
                               value="{{ $item->date }}" style="height: 50px">
                    </div>
                </div>

            <div class="img display-hide">
                <legend>{{__('cp.featured_image')}}</legend>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()"
                             style="cursor:pointer">
                            <img src="{{url($item->image)}}" id="editImage" style="max-width:100%;">
                        </div>
                        <div class="btn red" onclick="document.getElementById('edit_image').click()">
                            <i class="fa fa-pencil"></i>
                        </div>
                        <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                    </div>
                </div>
            </div>

                <legend>{{__('cp.images')}}</legend>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="imageupload" style="display:flex;flex-wrap:wrap">
                            @foreach($item->photos as $one)
                                <div class="imageBox text-center" style="width:150px; height:190px; margin:5px;">
                                    <img src="{{$one->image}}" style="width:150px;height:150px; padding:5px;">
                                    <button class="btn btn-danger deleteImage" type="button">{{__("cp.remove")}}</button>
                                    <input class="attachedValues form-control" type="hidden" name="oldImages[]" value="{{$one->id}}">
                                </div>
                            @endforeach
                        </div>
                        <div class="file-field input-field input-group control-group increment" >
                            <div class="btn amber" onclick="document.getElementById('all_images').click()">
                                <span> {{__("cp.addImages")}} </span>
                                <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i> {{__("cp.addImages")}}</button>
                                <input type="file" class="form-control hidden"  style="display:none;"  accept="image/*" id="all_images"  multiple />
                            </div>

                        </div>
                    </div>
                </div>


                <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.projects.index') }}"
                           class="btn btn-warning">{{__('cp.cancel')}}</a>
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
        $('#edit_image1').on('change', function (e) {
            readURL(this, $('#editImage1'));
        });
    </script>

@endsection

