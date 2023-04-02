@extends('layout.adminLayout')

@section('title')
    {{ __('cp.statistics') }}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.course_statistics.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        <div class="form-body">

                            <input type="hidden" name="course_id" value="{{ $course_id }}">

                            @foreach($locales as $locale)
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="title_{{$locale->lang}}"> {{__('cp.title_'.$locale->lang)}} </label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="title_{{$locale->lang}}" id="title_{{$locale->lang}}"value="{{ old('title_'.$locale->lang) }}" required>
                                </div>
                            </div>
                            @endforeach

                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="count"> {{__('cp.count')}} </label>
                                <div class="col-md-6">
                                    <input type="number" class="form-control" name="count" id="count" value="{{ old('count') }}" required>
                                </div>
                            </div>


                            <div class="img">
                                <legend>{{__('cp.image')}}</legend>
                                <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                                    <div class="col-md-6 col-md-offset-3">
                                        <div class="fileinput-new thumbnail"
                                             onclick="document.getElementById('edit_image').click()"
                                             style="cursor:pointer">
                                            <img src=" {{url(admin_assets('/images/ChoosePhoto.png'))}}" id="editImage"
                                                 style="max-width:600px;">

                                        </div>
                                        <div class="btn red" onclick="document.getElementById('edit_image').click()">
                                            <i class="fa fa-pencil"></i>
                                        </div>
                                        <input type="file" class="form-control" name="image" id="edit_image" style="display:none">
                                    </div>
                                </div>
                            </div>
           
                                      
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.course_statistics.index', ['id' => $course_id]) }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
                                    </div>
                                </div>
                            </div>
                            
                            
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
@endsection


@section('script')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });
    </script>
@endsection

