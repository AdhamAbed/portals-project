@extends('layout.adminLayout')

@section('title')
    {{__('cp.courses comments')}}
@endsection


@section('css')

@endsection


@section('content')
    <div class="row">


        @isset($item->video)
                        <div class="form-group ">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="{{ @$item->video }}"></iframe>
                                </div>
                            </div>
        @endif


        <div class="col-md-12">
            <div class="portlet light bordered">


                <div class="portlet-body form">






                    @isset($item->image)
                    <fieldset style="padding: 10px;">
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="fileinput-new thumbnail">
                                    <img src="{{ $item->image }}" id="editImage" style="max-width:600px;">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    @endisset


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.type') }} </b> </label>
                            <div class="col-md-9 bold"> {{ __('cp.' . $item->type) }} </div>
                        </div>
                    </fieldset>
                        <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.course language') }} </b> </label>
                            <div class="col-md-9 bold"> {{ __('cp.' . $item->course_language) }} </div>
                        </div>
                    </fieldset>



                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.course_date_time') }} </b> </label>
                            <div class="col-md-9 bold"> {{ $item->course_date_time }} </div>
                        </div>
                    </fieldset>



                                      <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.public_private') }} </b> </label>
                            <div class="col-md-9 bold">@if(isset($item->public_private)) {{ __('cp.' . $item->public_private) }} @endif</div>
                        </div>
                    </fieldset>



                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.category') }} </b> </label>
                            <div class="col-md-9 bold"> {{ @$item->category->name }} </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.title') }} </b> </label>
                            <div class="col-md-9 bold"> {{ @$item->title }} </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.summay') }} </b> </label>
                            <div class="col-md-9 bold"> {!! @$item->summary !!} </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.details')}} </b> </label>
                            <div class="col-md-9 bold"> {!! @$item->details !!} </div>
                        </div>
                    </fieldset>



                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.course_link') }} </b> </label>
                            <div class="col-md-9 bold"> <a href="{{ $item->course_link }}" target="_blank"> {{ $item->course_link }} </a> </div>
                        </div>
                    </fieldset>



                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.share_post')}} </b> </label>
                            <div class="col-md-9 bold"> {{ __('cp.' . $item->share_post) }} </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.price')}} </b> </label>
                            <div class="col-md-9 bold"> {{ $item->price . __('cp.dollar') }} </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.discount')}} </b> </label>
                            <div class="col-md-9 bold"> {{  $item->discount }}% </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.price_after_discount')}} </b> </label>
                            <div class="col-md-9 bold"> {{ $item->price_after_discount .  __('cp.dollar') }} </div>
                        </div>
                    </fieldset>


                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{ __('cp.hours')}} </b> </label>
                            <div class="col-md-9 bold"> {{ $item->hours . __('cp.hour') }} </div>
                        </div>
                    </fieldset>



                    <fieldset style="padding: 10px; border-bottom:1px dotted #ccc;">
                        <div class="form-group">
                            <label class="col-sm-3 control-label"> <b> {{__('cp.accept_comments')}} </b> </label>
                            <div class="col-md-9 bold"> {{ __('cp.' .  $item->accept_comments) }} </div>
                        </div>
                    </fieldset>





                </div>
            </div>
        </div>
    </div>

@endsection



@section('js')
@endsection



@section('script')
@endsection
