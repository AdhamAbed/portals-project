@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')

    
    <section class="container sec-padd" id="startchange">
        <div class="row">
            <div class="col-sm-12 mb-3">
                <p class="text-right  inner-tit1 bold"> {{ __('website.research_studies') }} </p>
                <h5 class="text-right  mb-4"> {{ @$item->title }} </h5>
            </div>
        </div>

        <div class="row single-orphans">
      
            <div class="col-md-5">
                <img src="{{ @$item->image }}" style="width: 100%;" class="cover-fit rounded" height="300">
                <table class="table table-borderless ">
                    <tbody>
                        <tr class="text-right">
                            <td>
                                <i class="fa fa-phone green-color ml-5"></i>
                                <span class="gray"> {{ @$item->writer }} </span>
                            </td>
                            <td>
                                <i class="fa fa-phone green-color ml-5"></i>
                                <span class="gray"> {{ @$item->mobile }} </span>
                            </td>
                            <td>
                                <i class="fa fa-envelope green-color ml-5"></i> <span class="gray"> {{ @$item->email }} </span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-7 mt-4">
                <h5 class="bold  mt-4"> {{ @$item->title }} </h5>
                <p class="l-32"> {!! @$item->details !!} </p>
            </div>
        </div>
    </section>

  
@endsection
  