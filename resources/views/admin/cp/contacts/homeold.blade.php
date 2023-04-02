@extends('layout.adminLayout')


@section('title')
{{ __('cp.contact') }}
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


                            <button class="btn btn-warning event"  id="delete_all" href="#deleteAll" role="button" data-toggle="modal">
                                {{__('cp.delete')}}
                                <i class="fa fa-times"></i>
                            </button>

                        </div>
                        <br><br>

                    </div>
                </div>


            </div>
            <input type="hidden" id="url" value="">

             <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">
                <thead>
                    <tr>

                        <th>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" value="" id="checkboxall" name="client" class="chkBox checkboxes">
                                <span></span>
                            </label>
                        </th>

                        <th>{{ucwords(__('cp.full_name'))}}</th>
                        {{-- <th>{{ucwords(__('cp.email'))}}</th> --}}
                        <th>{{ucwords(__('cp.mobile'))}}</th>
                        <th>{{ucwords(__('cp.status'))}}</th>
                        <th>{{ucwords(__('cp.created'))}}</th>
                        <th>{{ucwords(__('cp.actions'))}}</th>
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
{{--                        <td> {{ $item->user_id > 0? $item->user->name : $item->name }} </td>--}}
                         <td> {{ @$item->name}} </td>
                         <td> {{ @$item->phone}} </td>
{{--                        <td> {{ $item->user_id > 0? $item->user->mobile : $item->phone }} </td>--}}


                        <td class="p-0"><span class="btn label-sm <?php echo ($item->read == 1)
                                    ? "btn-light-info" : "btn-light-danger"?>" id="label-{{$item->id}}">
                                @if($item->read == 1)
                                    {{__('cp.read')}}
                                @else
                                    {{__('cp.new')}}
                                @endif
                                </span>
                        </td>





                        <td> {{$item->created_at}}</td>

                        <td class="p-0">
                            <div class="btn-group btn-action">


                                <a href="{{url(getLocal().'/admin/viewMessage/'.$item->id)}}" class="btn btn-xs tooltips"
                                   data-container="body" data-placement="top" data-original-title="{{__('cp.show')}}">
                                    <i class="fa fa-eye text-success fs-2"></i>
                                </a>

                                <a data-id="{{$item->id}}" data-toggle="tooltip" data-container="body" data-placement="top"
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
            {{$items->links()}}
        </div>
    </div>
@endsection


@section('js')
@endsection


@section('script')
@endsection
