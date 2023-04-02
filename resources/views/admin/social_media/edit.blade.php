@extends('layout.adminLayout')
@section('title')
    {{ __('cp.social media') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.socials_media.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">


            <div class="form-group">
                <label class="col-sm-2 control-label" for="name">
                    {{__('cp.name')}}
                    <span class="symbol">*</span>
                </label>
                <div class="col-md-6">
                    <input type="text" class="form-control" name="name"
                           placeholder=" {{__('cp.name')}}"
                           id="name"
                           value="{{ @$item->name}}" required>
                </div>
            </div>

           <div class="form-group">
                    <label class="col-sm-2 control-label" for="url">
                        {{__('cp.url')}}
                    </label>
                    <div class="col-md-6">
                        <input type="url" class="form-control" name="url"
                               placeholder="{{__('cp.url')}}"
                               id="url"
                               value="{{ @$item->url}}" required>
                    </div>
            </div>
           <div class="form-group">
                    <label class="col-sm-2 control-label" for="icon">
                        {{__('cp.social icon')}}
                    </label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="icon"
                               placeholder="{{__('cp.icon')}}"
                               id="icon"
                               value="{{ @$item->icon}}" required>
                    </div>
            </div>




            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.socials_media.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
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

    </script>

@endsection

