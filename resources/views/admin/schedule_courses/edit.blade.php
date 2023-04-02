@extends('layout.adminLayout')
@section('title')
    {{ __('cp.schedule_courses') }}

@endsection
@section('css')
@endsection
@section('content')


    <form method="post" action="{{ route('admin.schedule_courses.update',$item->id) }}" enctype="multipart/form-data"
          class="form-horizontal" role="form" id="form">
        {{ csrf_field() }}
        {{ method_field('PATCH')}}


        <div class="form-body">

            <div class="form-group" id="course_category_id">
                <label class="col-sm-2 control-label">{{__('cp.category')}} </label>
                <div class="col-md-6 input-field">
                    <select class="form-control select02" name="course_category_id" id="course_category_id">
                        @isset($courses_categories)
                            @foreach($courses_categories as $one)
                                <option
                                        {{ $item->course_category_id == $one->id ? "selected" : "" }} value="{{ $one->id }}"> {{ $one->name }} </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>

            <div class="form-group" id="course_id">
                <label class="col-sm-2 control-label">{{__('cp.course')}} </label>
                <div class="col-md-6 input-field">
                    <select class="form-control select02" name="course_id"
                            id="course_id">
                        @isset($courses)
                            @foreach($courses as $course)
                                <option
                                        {{ $item->course_id == $course->id ? "selected" : "" }} value="{{ $course->id }}"> {{ $course->title }} </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>


            <div class="form-group" id="location_id">
                <label class="col-sm-2 control-label">{{__('cp.training location')}} </label>
                <div class="col-md-6 input-field">
                    <select class="form-control select02" name="location_id"
                            id="location_id">
                        @isset($locations)
                            @foreach($locations as $location)
                                <option
                                        {{ $item->location_id == $location->id ? "selected" : "" }} value="{{ $location->id }}"> {{ $location->name }} </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>


            <div class="form-group" id="branch_id">
                <label class="col-sm-2 control-label">{{__('cp.branch')}} </label>
                <div class="col-md-6 input-field">
                    <select class="form-control select02" name="branch_id"
                            id="branch_id">
                        @isset($courses)
                            @foreach($branches as $branch)
                                <option
                                        {{ $item->branch_id == $branch->id ? "selected" : "" }} value="{{ $branch->id }}"> {{ $branch->name }} </option>
                            @endforeach
                        @endisset
                    </select>
                </div>
            </div>


            <div class="form-group">
                <label class="col-sm-2 control-label" for="course_date">
                    {{__('cp.course_date')}}
                </label>
                <div class="col-md-6">
                    <input type="date" class="form-control" name="course_date"
                           placeholder="{{__('cp.course_date')}}"
                           id="course_date"
                           value="{{ $item->course_date  ?? ''}}" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="course_duration">
                    {{__('cp.course_duration')}}
                </label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="course_duration"
                               placeholder="{{__('cp.course_duration')}}"
                               id="course_duration"
                               value="{{ $item->course_duration  ?? ''}}" required>
                    </div>
                    <div class="col-md-2 input-field">
                        <select class="form-control select02" name="course_duration_type">
                            <option value="hour" {{ $item->course_duration_type == 'hour' ? 'selected' : '' }}> {{ __('cp.hour') }} </option>
                            <option value="day" {{ $item->course_duration_type == 'day' ? 'selected' : '' }}> {{ __('cp.day') }} </option>
                            <option value="week" {{ $item->course_duration_type == 'week' ? 'selected' : '' }}> {{ __('cp.week') }} </option>
                            <option value="month" {{ $item->course_duration_type == 'month' ? 'selected' : '' }}> {{ __('cp.month') }} </option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label" for="mobile">
                    {{__('cp.course_cost')}}
                </label>
                <div class="row">
                    <div class="col-md-4">
                        <input type="number" class="form-control" name="course_cost"
                               placeholder="{{__('cp.course_cost')}}"
                               id="course_cost"
                               value="{{ $item->course_cost }}" required>
                    </div>
                    <div class="col-md-2 input-field">
                        <select class="form-control select02" name="course_cost_currency">
                            <option value="SR" {{ $item->course_cost_currency == 'SR' ? 'selected' : '' }}> {{ __('cp.SR') }} </option>
                            <option value="dollar" {{ $item->course_cost_currency == 'dollar' ? 'selected' : '' }}> {{ __('cp.dollar') }} </option>
                        </select>
                    </div>
                </div>
            </div>


            @foreach($locales as $locale)
                <div class="form-group">
                    <label class="col-sm-2 control-label" for="notes">
                        {{__('cp.notes_'.$locale->lang)}}
                    </label>
                    <div class="col-md-6">
                        <textarea rows="6" class="form-control" name="notes_{{$locale->lang}}"
                                  aria-required="true"> {{ $item->translate($locale->lang)->notes ?? '' }}</textarea>


                    </div>
                </div>
            @endforeach

            <legend>{{__('cp.image')}}</legend>
            <div class="form-group">
                <div class="col-md-6 col-md-offset-3">
                    <div class="fileinput-new thumbnail"
                         onclick="document.getElementById('edit_image').click()"
                         style="cursor:pointer; max-width:500px;">
                        <img src="{{url($item->image)}}" id="editImage"
                             style="max-width: 600px;">
                    </div>
                    <input type="file" class="form-control" name="image" id="edit_image"
                           style="display:none">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label" for="order">
                    {{__('cp.Status')}}
                </label>
                <div class="col-md-6">
                    <span class="switch">
					    <label>
                            <input type="checkbox"
                                   name="status" <?= $item->status == 'active' ? 'checked' : ''?>>
						    <span></span>
					    </label>
					    </span>
                </div>
            </div>


            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn btn-primary">{{__('cp.submit')}}</button>
                        <a href="{{ route('admin.schedule_courses.index') }}"
                           class="btn btn-warning">{{__('cp.cancel')}}</a>
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

