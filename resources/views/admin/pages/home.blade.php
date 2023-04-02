@extends('layout.adminLayout')

@section('title')
    {{ucwords(__('cp.pages'))}}
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


                        </div>
                    </div>
                </div>


            </div>

            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                <thead>
                <tr>
                    <th></th>
                    <th> {{ ucwords(__('cp.page')) }} </th>
                    <th> {{ ucwords(__('cp.edit')) }} </th>
                </tr>
                </thead>

                <tbody>
                @foreach($pages as $item)
                    <tr class="odd gradeX" id="tr-{{$item->id}}">
                        <td> <img src="{{ $item->header_image }}" style="max-width:70px;"> </td>
                        <td> {{ @$item->title }} </td>


                        <td>
                            <div class="btn-group btn-action">




                        @if(has_permission('admin.pages.edit') == true)
                        <a href="{{ route('admin.pages.edit', $item->id) }}" class="btn btn-xs tooltips"
                           data-container="body" data-placement="top" data-original-title="{{__('cp.edit')}}">
                            <i class="fa fa-edit text-primary fs-2"></i>
                        </a>
                        @endif





                            </div>
                        </td>
                    </tr>

                @endforeach

                </tbody>
            </table>
        </div>

    </div>
@endsection

@section('js')
@endsection


@section('script')
@endsection
