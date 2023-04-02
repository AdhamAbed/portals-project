@extends('layout.adminLayout')


@section('title')
{{__('cp.cities_managment')}}
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


@if(has_permission('admin.cities.create') == true)
                        <a href="{{ route('admin.cities.create') }}" style="margin-right: 5px" class="btn btn-primary">
                            {{ __('cp.add') }}
                            <i class="fa fa-plus"></i>
                        </a>
                    @endif


                    @if(has_permission('admin.cities.edit') == true)
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


                    @if(has_permission('admin.cities.destroy') == true)
                    <button class="btn btn-warning event" id="delete_all" href="#deleteAll" role="button" data-toggle="modal">
                        {{__('cp.delete')}}
                        <i class="fa fa-times"></i>
                    </button>
                    @endif




                        </div>
                    </div>
                </div>


            </div>

            <input type="hidden" id="url" value="{{url(app()->getLocale()."/admin/changeStatus/roles")}}">


            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                <thead>
                    <tr>
                        <th>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" value="" id="checkboxall" name="client" class="chkBox checkboxes">
                                <span></span>
                            </label>
                        </th>
                        <th>{{ucwords(__('cp.city'))}}</th>
                        <th>{{ucwords(__('cp.country'))}}</th>
                        <th> {{ucwords(__('cp.status'))}}</th>
                        <th>{{ucwords(__('cp.created'))}}</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                @forelse($items as $item)
                    <tr class="odd gradeX" id="tr-{{$item->id}}">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes chkBox" value="{{$item->id}}" name="chkBox"/>
                                <span></span>
                            </label>
                        </td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->country->name}}</td>


                    <td> <span class="label label-sm {{ ($item->status == "active")? "label-primary" : "label-warning"}} "
                            id="label-{{$item->id}}">
                                {{ __('cp.'.$item->status) }}
                            </span>
                        </td>

                        <td class="center">{{$item->created_at}}</td>
                        <td>
                            <div class="btn-group btn-action">



                        @if(has_permission('admin.cities.edit') == true)
                        <a href="{{ route('admin.cities.edit', $item->id) }}" class="btn btn-xs tooltips"
                           data-container="body" data-placement="top" data-original-title="{{__('cp.edit')}}">
                            <i class="fa fa-edit text-primary fs-2"></i>
                        </a>
                        @endif



                        @if(has_permission('admin.cities.destroy') == true)
                        <a data-id="{{$item->id}}" data-toggle="tooltip" data-container="body" data-placement="top"
                           data-original-title="{{__('cp.delete')}}"
                           class="btn btn-delete tooltips"> <i class="fa fa-trash text-danger fs-2"></i>
                        </a>
                        @endif


                            </div>
                        </td>
                    </tr>



                @empty
                    {{__('cp.no')}}
                @endforelse
                </tbody>
            </table>
        </div>
    </div>


@endsection


@section('js')
@endsection


@section('script')
@endsection
