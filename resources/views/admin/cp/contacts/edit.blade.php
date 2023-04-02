@extends('layout.adminLayout')
@section('title')
    {{ __('cp.contact') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.contact.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">

            <div class="form-group">
                <label class="col-sm-3 control-label" for="answer">
                    <b>{{ __('cp.name') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->name }}
                </div>
            </div>
            <br>


            <div class="form-group">
                <label class="col-sm-3 control-label" for="answer">
                    <b>{{ __('cp.email') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->email }}
                </div>
            </div>
            <br>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="answer">
                    <b>{{ __('cp.phone') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->phone }}
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="answer">
                    <b>{{ __('cp.subject') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->subject }}
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="answer">
                    <b>{{ __('cp.message') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->message }}
                </div>
            </div>
            <br>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="answer">
                    <b>{{ __('cp.answer') }} </b>
                </label>
                <div class="col-md-6">
                                    <textarea rows="4" class="form-control" name="answer"
                                              placeholder="{{ __('cp.answer') }}" id="answer" required=""
                                              aria-required="true">{{ old('cp.answer', $item->answer) }}</textarea>
                </div>
            </div>


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.contact.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
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
    </script>

@endsection

