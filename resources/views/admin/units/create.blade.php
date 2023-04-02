@extends('layout.adminLayout')

@section('title')
    {{ __('cp.units') }}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="portlet light bordered">
                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.units.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
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


              
           
                                      
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.units.index', ['id' => $course_id]) }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
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
    </script>
@endsection

