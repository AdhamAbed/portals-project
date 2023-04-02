@extends('layout.adminLayout')


@section('title')
    {{ ucwords(__('cp.faqs')) }}
@endsection


@section('css')
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN SAMPLE FORM PORTLET-->
            <div class="portlet light bordered">

                <div class="portlet-title">
                    <div class="caption">
                        <i class="icon-settings font-dark"></i>
                        <span class="caption-subject font-dark sbold uppercase" style="color: #e02222 !important;">
                            {{ __('cp.add') }}
                        </span>
                    </div>
                </div>

                <div class="portlet-body form">
                    <form method="post" action="{{ route('admin.faqs.store') }}" enctype="multipart/form-data" class="form-horizontal" role="form" id="form_category">
                    {{ csrf_field() }}
                        <div class="form-body">
                       
                      

                        <fieldset>
                            @foreach($locales as $locale)
                                <div class="form-group">
                                    <label class="col-sm-3 control-label" for="question">
                                        {{ __('cp.question') }} {{ $locale->name }} <span class="symbol">*</span>
                                    </label>
                                    <div class="col-md-6">
                                        <input type="text" class="form-control" name="question_{{$locale->lang}}"
                                            placeholder="{{__('cp.question')}}" id="question"
                                            value="{{ old('question_'.$locale->lang) }}" required>
                                    </div>
                                </div>
                            @endforeach
                        </fieldset>


                        @foreach($locales as $locale)
                        <div class="form-group">
                            <label class="col-sm-3 control-label" for="answer">
                                {{ __('cp.answer') }} {{ $locale->name }} <span class="symbol">*</span>
                            </label>
                            <div class="col-md-6">
                                <textarea rows="4" class="form-control" name="answer_{{$locale->lang}}" 
                                    placeholder="{{__('cp.answer')}}" id="answer" required="" 
                                    aria-required="true"></textarea>
                            </div>
                        </div>
                    @endforeach



        


                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-9">
                                    <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                                    <a href="{{ route('admin.faqs.index') }}" class="btn btn-warning">
                                        {{__('cp.cancel')}}
                                    </a>
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

        $('#all_images').on('change', function (e) {
            readURLMultiple(this, $('.imageupload'));
        });        

        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });

    </script>
@endsection
