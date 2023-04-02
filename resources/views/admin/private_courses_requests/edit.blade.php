@extends('layout.adminLayout')
@section('title')
    {{ __('cp.private_courses_requests') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.private_courses_requests.update',$item->id) }}" enctype="multipart/form-data"
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
                <label class="col-sm-3 control-label" for="company">
                    <b>{{ __('cp.company') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->company }}
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
                <label class="col-sm-3 control-label" for="mobile">
                    <b>{{ __('cp.mobile') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->mobile }}
                </div>
            </div>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="location">
                    <b>{{ __('cp.location') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->location }}
                </div>
            </div>
            <br>
            <br>
            <div class="form-group">
                <label class="col-sm-3 control-label" for="details">
                    <b>{{ __('cp.details') }}</b>
                </label>
                <div class="col-md-6">
                    {{ @$item->details }}
                </div>
            </div>
            <br>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="details">
                    <b>{{ __('cp.replay') }} </b>
                </label>
                <div class="col-md-6">
                                    <textarea rows="4" class="form-control" name="replay"
                                              placeholder="{{ __('cp.replay') }}" id="replay" required
                                              aria-required="true">{{ old('cp.replay', $item->replay) }}</textarea>
                </div>
            </div>

            <div class="form-group" id="status">
                <label class="col-sm-2 control-label">{{__('cp.status')}} </label>
                <div class="col-md-6 input-field">
                    <select class="form-control select02" name="status">
                        <option
                                value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}> {{ __('cp.pending') }} </option>
                        <option
                                value="replayed"{{ $item->status == 'replayed' ? 'selected' : '' }}> {{ __('cp.replayed') }} </option>
                        <option
                                value="canceled"{{ $item->status == 'canceled' ? 'selected' : '' }}> {{ __('cp.canceled') }} </option>
                    </select>
                </div>
            </div>


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.private_courses_requests.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
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

