@extends('layout.adminLayout')


@section('title')
    {{ __('cp.faqs') }}
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

                            <a href="{{ route('admin.faqs.create') }}" style="margin-right: 5px"
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

                            <button type="submit" class="btn btn-primary" onclick="getElementById('reOrdered').click()">{{__('cp.reOrdered')}}</button>


                        </div>
                    </div>

                </div>
            </div>


            <form method="post" action="{{ route('admin.reorderedFaqs') }}"
                enctype="multipart/form-data" class="form-horizontal" role="form">
              {{ csrf_field() }}


            <table class="table table-striped table-bordered table-hover table-checkable order-column" id="toolsTable">

                <thead>
                    <tr>
                        <th>

                        </th>
                        <th> {{ __('cp.ordered') }}</th>
                        <th> {{ __('cp.question') }} </th>
                        <th> {{ __('cp.status') }} </th>
                        <th> {{ __('cp.created') }} </th>
                        <th style="width: 80px;"> </th>
                    </tr>
                </thead>

                <tbody>
                @foreach($items as $item)
                    <tr class="odd gradeX" id="tr-{{$item->id}}">
                        <td>
                            <label class="mt-checkbox mt-checkbox-single mt-checkbox-outline">
                                <input type="checkbox" class="checkboxes chkBox" value="{{$item->id}}" name="chkBox"/>
                                <span></span>
                            </label>
                        </td>

                        <td style="width: 70px;">
                            <input type="number" class="form-control" min="0" name="ordered[]" value="{{@$item->ordered}}"  required>
                            <input type="hidden" name="cats[]" value="{{$item->id}}">
                        </td>

                        <td> {{ @$item->question }} </td>
                        <td> <span class="label label-sm <?php echo ($item->status == "active")? "label-primary" : "label-warning"?>" id="label-{{$item->id}}">

                               {{ __('cp.' . $item->status) }}
                            </span></td>
                        <td class="center"> {{ $item->created_at->format('d-m-Y') }} </td>
                        <td>
                            <div class="btn-group btn-action">
                                <a href="{{ route('admin.faqs.edit', $item->id) }}"
                                   class="btn btn-xs  tooltips" data-container="body" data-placement="top"
                                   data-original-title="{{ __('cp.edit') }}">
                                   <img src="{{ url('uploads/icons/writing.png') }}">
                                </a>

                                <a data-id="{{ @$item->id }}" data-toggle="tooltip" data-container="body" data-placement="top" data-original-title="{{__('cp.delete')}}"
                                    class="btn-delete tooltips"><img src="{{ url('uploads/icons/delete.png') }}">
                                </a>

                            </div>
                        </td>
                    </tr>

                @endforeach
                </tbody>
            </table>

            <button type="submit" class="btn green" style="display: none;" id="reOrdered">{{__('cp.submit')}}</button>

            </form>

        </div>
    </div>

@endsection

@section('js')
@endsection

@section('script')
@endsection
