@extends('layout.adminLayout')

@section('title')
    {{ __('cp.notifications') }}
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

                            <a href="{{ route('admin.notifications.create') }}" style="margin-right: 5px"
                               class="btn btn-primary">
                                {{ __('cp.add') }}
                                <i class="fa fa-plus"></i>
                            </a>


                        </div>
                        <br><br>
                    </div>

                </div>
           
            </div>
            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                <thead>
                    <tr>
                        <th></th>
                    <th> {{ucwords(__('cp.msg'))}}</th>
                    <th> {{ucwords(__('cp.created'))}}</th>
                    <th> {{ucwords(__('cp.action'))}}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($items as $item)
                    <tr class="odd gradeX" id="tr-{{$item->id}}">
                        <td>
                                <span> {{ $loop->iteration + pageNum()}} </span>
                        </td>
                        <td>{{$item->message}}</td>
                        <td>{{ $item->created_at->format('d-m-Y') }}</td>
                        <td>
                            <div class="btn-group btn-action">
                            
                                <a href="{{ route('admin.notifications.deleteByRandomKey', $item->random_key) }}" title="{{__('cp.delete')}}"
                                    class="btn btn-delete tooltips"><i class="fa fa-trash text-danger fs-2"></i>
                                </a>

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
