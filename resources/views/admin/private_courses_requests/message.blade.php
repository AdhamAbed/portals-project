@extends('layout.adminLayout')


@section('title')
 {{ __('cp.contact') }}
 @endsection


@section('css')
@endsection


@section('content')
<div class="portlet light bordered">
    <form class="form-horizontal" method="post" action=""  enctype="multipart/form-data" id="driver_create">
    
    <div class="box-body">
        <div class="form-group">
            <label class="col-sm-2 control-label"> {{ __('cp.full_name') }} </label>
            <div class="col-sm-10">
                <input type="text" value="{{ $item->user_id > 0? $item->user->name : $item->name }}" class="form-control" disabled>
            </div>
        </div>




        <div class="form-group">
            <label class="col-sm-2 control-label"> {{ __('cp.mobile') }} </label>
            <div class="col-sm-10">
                <input type="text"  value="{{ $item->user_id > 0? $item->user->mobile : $item->phone }}" class="form-control" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"> {{ __('cp.created') }} </label>
            <div class="col-sm-10">
                <input type="text"  value="{{$item->created_at}}" class="form-control" disabled>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2 control-label"> {{ __('cp.msg') }} </label>
            <div class="col-sm-10">
                <div style="border: 1px solid #d2d6de;padding: 10px;">
                    <p>{!! $item->message !!}</p>
                </div>
            </div>
        </div>
        <br>
        <div class="form-actions">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <a href="{{ route('admin.contact.index') }}" class="btn btn-warning">
                        {{__('cp.cancel')}}
                    </a>
                </div>
            </div>
        </div>

    </div>
</form>
</div>
@endsection


@section('js')
@endsection


@section('script')
@endsection
