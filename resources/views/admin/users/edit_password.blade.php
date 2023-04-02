@extends('layout.adminLayout')

@section('title')
    {{ucwords(__('cp.users'))}}
@endsection

@section('css')
@endsection


@section('content')

    <form method="post" action="{{ route('admin.users.edit_password', $item->id)}}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}

        <div class="form-body">


            <div class="form-group">
                <label class="col-sm-2 control-label" for="order">
                    {{__('cp.password')}} <span class="symbol">*</span>
                </label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="password" value="" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="order">
                    {{__('cp.confirm_password')}} <span class="symbol">*</span>
                </label>
                <div class="col-md-6">
                    <input type="password" class="form-control" name="confirm_password" value="" required>
                </div>
            </div>


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.users.index') }}" class="btn btn-warning">
                            {{ __('cp.cancel') }}
                        </a>
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
