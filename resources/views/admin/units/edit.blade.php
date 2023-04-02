@extends('layout.adminLayout')
@section('title')
    {{ __('cp.units') }}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-body form">

                    <form method="post" action="{{ route('admin.units.update',$item->id) }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH')}}

                 
                

                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-2 control-label" for="title_{{$locale->lang}}"> {{__('cp.title_'.$locale->lang)}} </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="title_{{$locale->lang}}" id="title_{{$locale->lang}}" value="{{ old('title_'.$locale->lang, $item->translate($locale->lang)->title) }}" required>
                                    </div>
                                </div>
                            @endforeach

                        
                     

                        
                            <br>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn btn-primary"> {{ __('cp.submit') }} </button>
                                        <a href="{{ route('admin.units.index', ['id' => $item->course_id]) }}" class="btn btn-warning"> {{ __('cp.cancel') }} </a>
                                    </div>
                                </div>
                            </div>
                        
                        
                    </form>
                </div>
            </div>
        </div>
    </div>







@endsection
@section('script')

    <script>
    </script>

@endsection