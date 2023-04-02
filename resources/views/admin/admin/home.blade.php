@extends('layout.adminLayout')

@section('title') {{ucwords(__('cp.title_admin'))}}

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



                         
                            
                    @if(has_permission('admin.admins.create') == true)
                        <a href="{{ route('admin.admins.create') }}" style="margin-right: 5px" class="btn btn-primary">
                            {{ __('cp.add') }}
                            <i class="fa fa-plus"></i>
                        </a>
                    @endif


                    @if(has_permission('admin.admins.edit') == true)
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
                    

                    @if(has_permission('admin.admins.destroy') == true)
                    <button class="btn btn-warning event" id="delete_all" href="#deleteAll" role="button" data-toggle="modal">
                        {{__('cp.delete')}}
                        <i class="fa fa-times"></i>
                    </button>
                    @endif                           
                  


                        </div>

                    </div>



                </div>


            </div>


            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">

                <thead>

                    <tr>

                    <th>



                    </th>

                    <th> {{ucwords(__('cp.full_name'))}}</th>

                    <th> {{ucwords(__('cp.email'))}}</th>

                    <th> {{ucwords(__('cp.mobile'))}}</th>
                    
                    <th> {{ucwords(__('cp.status'))}}</th>

                    <th> {{ucwords(__('cp.created'))}}</th>

                    <th> {{ucwords(__('cp.action'))}}</th>

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

                        <td> {{$item->name}}</td>

                        <td><a href="mailto:{{$item->email}}">{{$item->email}}</a></td>

                        <td> {{$item->mobile}}</td>

                        <td> <span class="label label-sm <?php echo ($item->status == "active")
                                ? "label-info" : "label-danger"?>" id="label-{{$item->id}}">
                                @php
                                    $status = $item->status
                                @endphp

                                {{__('cp.'.$status)}}
                            </span>
                        </td>

                        <td class="center">{{$item->created_at->format('d-m-Y')}}</td>

                        <td>

                            <div class="btn-group btn-action">

                        
                                @if(has_permission('admin.admins.edit') == true)
                        <a href="{{ route('admin.admins.edit', $item->id) }}" class="btn btn-xs tooltips"
                           data-container="body" data-placement="top" data-original-title="{{__('cp.edit')}}">
                            <i class="fa fa-edit text-primary fs-2"></i>
                        </a>

                        <a href="{{ route('admin.admins.edit_password', $item->id) }}" class="btn btn-xs tooltips"
                           data-container="body" data-placement="top" data-original-title="{{__('cp.edit_password')}}">
                            <i class="fa fa-unlock-alt text-info fs-2"></i>
                        </a>
                        @endif

                 





                                <!--<a data-placement="top" data-original-title="{{__('cp.delete')}} "-->

                                <!--   href="#myModal{{$item->id}}" role="button" data-toggle="modal"-->

                                <!--   class="btn btn-xs red tooltips">-->

                                <!--    &nbsp;&nbsp;<i class="fa fa-times" aria-hidden="true"></i>-->

                                <!--</a>-->



                                <div id="myModal{{$item->id}}" class="modal fade" tabindex="-1" role="dialog"

                                     aria-labelledby="myModalLabel1" aria-hidden="true">

                                    <div class="modal-dialog">

                                        <div class="modal-content">

                                            <div class="modal-header">

                                                <button type="button" class="close" data-dismiss="modal"

                                                        aria-hidden="true"></button>

                                                <h4 class="modal-title">{{__('cp.delete')}}</h4>

                                            </div>

                                            <div class="modal-body">

                                                <p>{{__('cp.confirm')}} </p>

                                            </div>

                                            <div class="modal-footer">

                                                <button class="btn default" data-dismiss="modal"

                                                        aria-hidden="true">{{__('cp.cancel')}}</button>

                                                <a href="#" onclick="delete_adv('{{$item->id}}','{{$item->id}}',event)">

                                                    <button class="btn btn-danger">{{__('cp.delete')}}</button>

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                            </div>









                        </td>

                    </tr>



                @empty


                @endforelse

                </tbody>

            </table>

        </div>

    </div>

@endsection



@section('js')

@endsection

@section('script')

    <script>





        function delete_adv(id, iss_id, e) {

            //alert(id);

            e.preventDefault();

            console.log(id);

            console.log(iss_id);

            var url = '{{url(getLocal()."/admin/admins")}}/' + id;

            var csrf_token = '{{csrf_token()}}';

            $.ajax({

                type: 'delete',

                headers: {'X-CSRF-TOKEN': csrf_token},

                url: url,

                data: {_method: 'delete'},

                success: function (response) {

                    console.log(response);

                    if (response === 'success') {

                        $('#tr-' + id).hide(500);

                        $('#myModal' + id).modal('toggle');

                        //swal("القضية حذفت!", {icon: "success"});

                    } else {

                        // swal('Error', {icon: "error"});

                    }

                },

                error: function (e) {

                    // swal('exception', {icon: "error"});

                }

            });



        }

    </script>

@endsection

