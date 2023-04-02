@extends('layout.adminLayout')


@section('title')
{{__('cp.coupons')}}
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
                     
                            
                            
                            <a href="{{ route('admin.coupons.create') }}" style="margin-right: 5px"
                               class="btn btn-primary"> {{ __('cp.add') }}
                               <i class="fa fa-plus"></i>
                            </a>

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

                            <button class="btn btn-warning event" id="delete_all" href="#deleteAll" role="button" data-toggle="modal">
                                {{__('cp.delete')}}
                                <i class="fa fa-times"></i>
                            </button>
                            
                        </div>
                    </div>

                </div>




                <div class="box-filter-collapse">
                 
                 <form class="form-horizontal" method="get" action="{{url(getLocal().'/admin/coupons')}}">
                     <div class="row">
                         
                         
                         <!--<div class="col-md-4">-->
                         <!--    <div class="form-group row">-->
                         <!--        <label class="col-md-3 control-label">{{__('cp.city')}}</label>-->
                         <!--        <div class="col-md-9">-->
                         <!--            <input type="text" class="form-control" name="city"-->
                         <!--                   placeholder="{{__('cp.city')}}">-->
                         <!--        </div>-->
                         <!--    </div>-->
                         <!--</div>-->




                         <div class="col-md-4">
                             <div class="form-group row">
                                 <div class="col-md-9">
                            

                                     <button type="submit" class="btn sbold blue">{{__('cp.search')}}
                                         <i class="fa fa-search"></i>
                                     </button>
                                     <a href="{{url('admin/coupons')}}" type="submit"
                                        class="btn sbold btn-default ">{{__('cp.reset')}}
                                         <i class="fa fa-refresh"></i>
                                     </a>
                                 </div>
                             </div>
                         </div>




                     </div>





                  




                 </form>
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
                        <th>{{ucwords(__('cp.name'))}}</th>
                        <th> {{ucwords(__('cp.start'))}}</th>
                        <th> {{ucwords(__('cp.end'))}}</th>
                        <th> {{ucwords(__('cp.discount'))}}</th>
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
                        <td> {{ $item->name }} </td>
               
                        
                        <td> {{ $item->start }} </td>
                        <td> {{ $item->end }} </td>
                        <td> {{ $item->discount }} </td>


                           <td> <span class="label label-sm {{ ($item->status == "active")? "label-primary" : "label-warning"}} " 
                            id="label-{{$item->id}}">
                                {{ __('cp.'.$item->status) }}
                            </span>
                        </td>
                        <td class="center"> {{ substr($item->created_at, 0, 10) }} </td>
                        <td>
                            <div class="btn-group btn-action">
                                <a href="{{url(getLocal().'/admin/coupons/'.$item->id.'/edit')}}"
                                   class="btn btn-xs  tooltips" data-container="body" data-placement="top"
                                   data-original-title="{{__('cp.edit')}}">
                                   <img src="{{ url('uploads/icons/writing.png') }}">
                                </a>
                             
                             
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
