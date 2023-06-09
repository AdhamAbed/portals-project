@extends('layout.adminLayout')
@section('title')
    {{ __('cp.consultations') }}

@endsection
@section('css')
@endsection

@section('content')

    <div class="portlet light bordered">
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="btn-group">



                    <!--@if(has_permission('admin.consultations_categories.create') == true)-->
                    <!--    <a href="{{ route('admin.consultations_categories.create') }}" style="margin-right: 5px" class="btn btn-primary">-->
                    <!--        {{ __('cp.add') }}-->
                    <!--        <i class="fa fa-plus"></i>-->
                    <!--    </a>-->
                    <!--@endif-->


                    @if(has_permission('admin.consultations.edit') == true)
                    <button class="btn btn-success event" id="active" style="margin-right: 5px" data-action="active"
                            href="#activation" role="button" data-toggle="modal">
                        {{ __('cp.active') }}
                        <i class="fa fa-check"></i>
                    </button>

                    <button class="btn btn-danger event" id="not_active" style="margin-right: 5px" href="#cancel_activation"
                            role="button" data-toggle="modal" data-action="not_active">
                        {{ __('cp.not_active') }}
                        <i class="fa fa-minus"></i>
                    </button>
                    @endif


                    @if(has_permission('admin.consultations.destroy') == true)
                    <button class="btn btn-warning event" id="delete_all" href="#deleteAll" role="button" data-toggle="modal">
                        {{__('cp.delete')}}
                        <i class="fa fa-times"></i>
                    </button>
                    @endif



                        </div>
                        <br><br>
                    </div>

                </div>
            </div>


            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                <thead>
                <tr>

                    <th>
                        <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                            <input type="checkbox" value="" id="checkboxall" name="client" class="chkBox checkboxes">
                            <span></span>
                        </label>
                    </th>
                    <th> {{ucwords(__('cp.name'))}} </th>
                    <th> {{ucwords(__('cp.question'))}} </th>
                    <th> مقروءة </th>
{{--                    <th> {{ucwords(__('cp.status'))}} </th>--}}
                    <th> {{ucwords(__('cp.created'))}} </th>
                    <th> {{ucwords(__('cp.action'))}} </th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $one)
                    <tr class="odd gradeX" id="tr-{{$one->id}}">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes chkBox" value="{{$one->id}}" name="chkBox"/>
                                <span></span>
                            </label>
                        </td>
                        <td>{{$one->name}}</td>
                        <td>{{$one->question}}</td>


                        <td class="p-0"><span class="btn label-sm <?php echo ($one->read == 1)
                                    ? "btn-light-info" : "btn-light-danger"?>" id="label-{{$one->id}}">
                                @if($one->read == 1)
                                    نعم
                                @else
                                    لا
                                @endif
                                </span>
                        </td>


{{--                             <td><span style="font-size: 12px;padding: 8px;"--}}
{{--                                  class="btn  {{ ($one->status == "active")? "btn-light-success" : "btn-light-danger"}} "--}}
{{--                                  id="label-{{$one->id}}">--}}
{{--                                {{ __('cp.'.$one->status) }}--}}
{{--                            </span>--}}
{{--                        </td>--}}

                        <td>{{$one->created_at}}</td>

                        <td class="p-0">
                            <div class="btn-group btn-action">




                        @if(has_permission('admin.consultations.edit') == true)
                        <a href="{{ route('admin.consultations.edit', $one->id) }}" class="btn btn-xs tooltips"
                           data-container="body" data-placement="top" data-original-title="{{__('cp.edit')}}">
                            <i class="fa fa-edit text-primary fs-2"></i>
                        </a>
                        @endif


                        @if(has_permission('admin.consultations.destroy') == true)
                        <a data-id="{{$one->id}}" data-toggle="tooltip" data-container="body" data-placement="top"
                           data-original-title="{{__('cp.delete')}}"
                           class="btn btn-delete tooltips"> <i class="fa fa-trash text-danger fs-2"></i>
                        </a>
                        @endif



                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

            {{ $items->links() }}

        </div>
    </div>
@endsection

@section('js')
@endsection


@section('script')
@endsection
