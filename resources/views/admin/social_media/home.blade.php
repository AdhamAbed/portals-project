@extends('layout.adminLayout')
@section('title')
    {{ __('cp.social media') }}

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

                            <a href="{{ route('admin.socials_media.create') }}" style="margin-right: 5px"
                               class="btn btn-primary">
                                {{ __('cp.add') }}
                                <i class="fa fa-plus"></i>
                            </a>
                            <button class="btn btn-warning event" id="delete_all" href="#deleteAll" role="button" data-toggle="modal">
                                {{__('cp.delete')}}
                                <i class="fa fa-times"></i>
                            </button>

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
{{--                    <th> {{ucwords(__('cp.icon'))}} </th>--}}
                    <th> {{ucwords(__('cp.name'))}} </th>
                    <th> {{ucwords(__('cp.created'))}} </th>
                    <th> {{ucwords(__('cp.action'))}} </th>
                </tr>
                </thead>
                <tbody>
                @forelse($items as $one)
                    <tr class="odd gradeX" id="tr-{{$one->id}}">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes chkBox" value="{{$one->id}}" name="chkBox"/>
                                <span></span>
                            </label>
                        </td>
{{--                        <td> <i class="{{ $one->icon }}"></i> </td>--}}

                        <td>{{$one->name}}</td>

                        <td>{{$one->created_at}}</td>

                        <td class="p-0">
                            <div class="btn-group btn-action">


                                <a href="{{ route('admin.socials_media.edit', $one->id) }}" class="btn btn-xs tooltips"
                                   data-container="body" data-placement="top" data-original-title="{{__('cp.edit')}}">
                                    <i class="fa fa-edit text-primary fs-2"></i>
                                </a>

                                <a data-id="{{$one->id}}" data-toggle="tooltip" data-container="body" data-placement="top"
                                   data-original-title="{{__('cp.delete')}}"
                                   class="btn btn-delete tooltips"> <i class="fa fa-trash text-danger fs-2"></i>
                                </a>

                            </div>
                        </td>
                    </tr>
                @empty
                    {{__('cp.no')}}
                @endforelse
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
