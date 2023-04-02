@extends('layout.adminLayout')

@section('title')
<img src="{{ url('uploads/icons/languages.png') }}"> {{__('cp.languages')}}
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
                        <span class="caption-subject font-dark sbold uppercase"
                              style="color: #e02222 !important;">{{__('cp.add')}} {{__('cp.languages')}}</span>
                    </div>
                </div>
                <div class="portlet-body form">
                    <form method="post" action="{{url(app()->getLocale().'/admin/languages')}}"
                          enctype="multipart/form-data" class="form-horizontal" role="form" id="form">
                        {{ csrf_field() }}

                        <div class="form-body">
                             

                            <fieldset>
                                @foreach($locales as $locale)
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label" for="order">
                                            {{__('cp.title_'.$locale->lang)}} <span class="symbol">*</span>
                                        </label>

                                        <div class="col-md-6">
                                                <textarea class="form-control" name="title_{{$locale->lang}}" id="order" required>{{ old('title_'.$locale->lang) }}</textarea>
                                        </div>
                                    </div>
                                @endforeach
                            </fieldset>



                            

 


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button type="submit" class="btn green">{{__('cp.add')}}</button>
                                        <a href="{{url(getLocal().'/admin/languages')}}" class="btn default">{{__('cp.cancel')}}</a>
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





    <script>



          $('#type').on('change', function() {

            var gover = this.value ;

            sessionStorage.setItem("type",  this.value);



            if(gover == 1){

                $('#gover_option').removeClass('hidden');

                $('#options').prop('required',true);

            }else{

                $('#gover_option').addClass('hidden');

                $('#options').prop('required',false);

            }



           

        });







   


    </script>

@endsection

