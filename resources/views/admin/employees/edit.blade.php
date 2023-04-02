@extends('layout.adminLayout')

@section('title')
    {{ ucwords(__('cp.employees')) }}
@endsection




@section('css')
    <style>
        #map-canvas {
            width: 800px;
            height: 350px;
        }
    </style>
@endsection


@section('content')

    <form method="post" action="{{ route('admin.employees.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}



                <div class="form-group" id="type">
                    <label class="col-sm-2 control-label" >{{__('cp.type')}}
                        <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6 input-field">
                        <select class="form-control select02" name="type">
                            <option value="department_manager" {{$item->type == 'department_manager'? 'selected': '' }} > {{__('cp.department_manager')}} </option>
                            <option value="department_employee" {{$item->type == 'department_employee'? 'selected': '' }} > {{__('cp.department_employee')}} </option>
                        </select>
                    </div>
                </div> 
                
                

                <div class="form-group" id="category_id">
                    <label class="col-sm-2 control-label" >{{__('cp.category')}}
                        <span class="symbol">*</span>
                    </label>
                    <div class="col-md-6 input-field">
                        <select class="form-control select02" name="category_id" >
                            <option value=""> {{__('cp.select')}} </option>
                            @foreach($categories as $one)
                            <option value="{{ $one->id }}" {{$item->category_id == $one->id? 'selected': '' }}>
                                {{ $one->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div> 


        <div class="form-group">
            <label class="col-sm-3 control-label" for="name">
                {{__('cp.name')}} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $item->name) }}"
                       required>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-3 control-label" for="mobile">
                {{__('cp.mobile')}} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input onkeyup="if (/\D/g.test(this.value)) this.value = this.value.replace(/\D/g,'')" id="mobile"
                       type="text" class="form-control" name="mobile" value="{{ old('mobile', $item->mobile) }}"
                       required>
            </div>
        </div>
        
        
        <div class="form-group">
            <label class="col-sm-3 control-label" for="email">
                {{__('cp.email')}} <span class="symbol">*</span>
            </label>
            <div class="col-md-6">
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email', $item->email) }}">
            </div>
        </div>
        
        

        <legend>{{__('cp.IDPhoto')}}</legend>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <div class="fileinput-new thumbnail"
                     onclick="document.getElementById('edit_image1').click()"
                     style="cursor:pointer">
                    <img src="{{url($item->id_image)}}" id="editImage1" style="max-width:100%;">
                </div>
                <div class="btn red"
                     onclick="document.getElementById('edit_image1').click()">
                    <i class="fa fa-pencil"></i>
                </div>
                <input type="file" class="form-control" name="image_profile1" id="edit_image1" style="display:none">
            </div>
        </div>
        
        
        <legend>{{__('cp.image')}}</legend>
        <div class="form-group">
            <div class="col-md-6 col-md-offset-3">
                <div class="fileinput-new thumbnail"
                     onclick="document.getElementById('edit_image').click()"
                     style="cursor:pointer">
                    <img src="{{url($item->image)}}" id="editImage" style="max-width:100%;">
                </div>
                <div class="btn red"
                     onclick="document.getElementById('edit_image').click()">
                    <i class="fa fa-pencil"></i>
                </div>
                <input type="file" class="form-control" name="image_profile" id="edit_image" style="display:none">
            </div>
        </div>
        
        
        <br><br>


        <div class="form-actions" style="margin-top: 10px;">
            <div class="row">
                <div class="col-md-offset-3 col-md-9">
                    <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                    <a href="{{ route('admin.employees.index') }}" class="btn btn-warning">{{__('cp.cancel')}}</a>
                </div>
            </div>
        </div>

    </form>

@endsection



@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key={{env('APIGoogleKey')}}&libraries=places"
            type="text/javascript"></script>
@endsection



@section('script')
    <script>
        $('#edit_image').on('change', function (e) {
            readURL(this, $('#editImage'));
        });
        
        $('#edit_image1').on('change', function (e) {
            readURL(this, $('#editImage1'));
        });
    </script>
@endsection
