@extends('layout.adminLayout')
@section('title')
    {{ __('cp.course comments') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.courseComments.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">


            <div class="form-group" id="course_id">
                <label class="col-sm-2 control-label">{{__('cp.Course')}} </label>
                <div class="col-md-6 input-field">
                    <select class="form-control select02" name="course_id"
                            id="course_id">
                        <option value=""></option>
                        @isset($courses)
                            @foreach($courses as $one)
                                <option value="{{ $one->id }}" {{ $item->course_id == $one->id ? 'selected' : '' }}> {{ $one->title }} </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="comment"> {{__('cp.comment')}} </label>
                <div class="col-md-6">
                   <textarea rows="6" class="form-control" name="comment"
                             required aria-required="true">{{ $item->comment }}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="user_name"> {{__('cp.user_name')}} </label>
                <div class="col-md-6">
                <input type="text" class="form-control" name="user_name"
                       placeholder="{{__('cp.user_name')}}"
                       id="user_name" value="{{ $item->user_name }}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="user_specialization"> {{__('cp.user_specialization')}} </label>
                <div class="col-md-6">
                <input type="text" class="form-control" name="user_specialization"
                       placeholder="{{__('cp.user_specialization')}}"
                       id="user_specialization" value="{{ $item->user_specialization }}" required>
                </div>
            </div>

            <div class="form-group" id="rate">
                <label class="col-sm-2 control-label" for="discount"> {{__('cp.rate')}} </label>
                <div class="col-md-6">
                    <input type="number" class="form-control" name="rate"
                           value="{{ $item->rate }}">
                </div>
            </div>

            <div class="form-group" id="file_type">
                <label class="col-sm-2 control-label">{{__('cp.file type')}} </label>
                <div class="col-md-6 input-field">
                    <select class="form-control select02 fileType" name="file_type">
                        <option value="">{{__('cp.select')}}</option>
                        <option  {{ $item->file_type == 'image' ? 'selected' : '' }}
                                 value="image"> {{ __('cp.image') }} </option>
                        <option  {{ $item->file_type == 'video' ? 'selected' : '' }}
                                 value="video"> {{ __('cp.video') }} </option>
                    </select>
                </div>
            </div>


            <div class="form-group" id="type_video" @if($item->file_type == 'image' && $item->file_type != 'video' || $item->file_type == '') style="display: none;" @endif>
                <label class="col-sm-2 control-label">{{__('cp.video')}} </label>
                <div class="col-md-6 input-field">
                    <input type="file" class="form-control" name="video">
                </div>
            </div>


      <div class="img display-hide" id="type_image" @if($item->file_type == 'video' && $item->file_type != 'image' || $item->file_type == '') style="display: none;" @endif>
      <legend>{{__('cp.image')}}</legend>
                <div class="form-group">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="fileinput-new thumbnail" onclick="document.getElementById('edit_image').click()" style="cursor:pointer">
                            <img src="{{url($item->file)}}" id="editImage" style="max-width:100%;">
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
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.courseComments.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
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

        $(document).on('change','.fileType',function(e){
            var file_type = $(this).val();

            if(file_type == 'image'){
                $('#type_image').show(1000);
                $('#type_video').hide(1000);
                return false;
            }
            if(file_type == 'video'){
                $('#type_image').hide(1000);
                $('#type_video').show(1000);
                return false;
            }
            else{
                $('#type_image').hide(1000);
                $('#type_video').hide(1000);
                return false;
            }
        });


        $('#edit_image').on('change', function (e) {

            readURL(this, $('#editImage'));

        });

    </script>

@endsection

