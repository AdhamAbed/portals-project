@extends('layout.adminLayout')

@section('title')
    المحاضرات
@endsection


@section('css')

@endsection


@section('content')
    <div class="row">


        <fieldset style="padding: 10px;">
            <div class="form-group">
                <label class="col-sm-3 control-label"> <b> {{ __('cp.title') }} </b> </label>
                <div class="col-md-9 bold"> {{ @$item->title }} </div>
            </div>
        </fieldset>
        
        
        <fieldset style="padding: 10px;">
            <div class="form-group">
                <label class="col-sm-3 control-label"> <b> {{ __('cp.details') }} </b> </label>
                <div class="col-md-9 bold"> {!! @$item->details !!} </div>
            </div>
        </fieldset>


        @isset($item->file)
        <fieldset style="padding: 10px;">
            <div class="form-group ">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="{{ @$item->file }}"></iframe>
                </div>
            </div>
        </fieldset>
        @endif



        @if(count($item->files))
                
        <fieldset style="padding: 10px;">
            <div class="form-group">
                <div class="col-md-12 bold"> الملفات </div>
            </div>
        </fieldset>                
                
        @foreach($item->files as $file)
            <a href="{{ $file->file }}" target="_blank">
                {{ $file->title }} 
            </a>
            <br>
            @endforeach
        @endif

            
        
        @if(count($item->links))
            <fieldset style="padding: 10px;">
                <div class="form-group">
                    <div class="col-md-12 bold"> الروابط </div>
                </div>
            </fieldset>                
        
            @foreach($item->links as $link)
                <a href="{{ $link->url }}" target="_blank">
                    {{ $link->title }} 
                </a>
                <br>
            @endforeach
        @endif
        


    </div>

@endsection



@section('js')
@endsection



@section('script')
@endsection
