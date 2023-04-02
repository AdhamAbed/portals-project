@extends('layout.siteLayout')

@section('title')
@endsection

@section('css')
@endsection

@section('content')


    <section class="container" id="startchange"> 
        <div class="row sec-padd">
            <div class="col-sm-12">
                <h4 class="text-right green-color bold"> {{ __('website.research_studies') }} </h4>
            </div>
            <div><p class="gray mb-3">البحوث والدراسات التي تقوم عليها الجمعيات</p></div>
        </div>
    </section>


    <section>
        <div class="container mb-5">
            <form class="row g-3">
                <div class="col">
                    <label for="staticEmail2" class="form-label">عنوان الدراسة</label>
                    <input type="text" class="form-control" id="staticEmail2" name="txt" placeholder="عنوان الف عالية">
                </div>
                <div class="col">
                    <label for="staticEmail2" class="form-label">نوع الدراسة</label>
                    <input type="text" class="form-control" id="staticEmail2" placeholder="الدراسة الاستطلاعية">
                </div>
                <div class="col">
                   <button type="submit" class="btn search-btn light-btn">  {{ __('website.search') }} </button>
                </div>
            </form>
        </div>
    </section>


    <section class="mt-4 mb-5">
        <div class="container">
            <div class="row dir-box">
                
                @isset($items)
                @foreach($items as $one)
                <div class="col-md-3">
                    <div class="card search-card h-100">
                        <img src="{{ $one->image }}" class="card-img-top" alt="{{ @$one->title }}">
                        <div class="card-body">
                            <div>
                                <div class="">
                                    <h6 class="bold"> <a href="{{ route('researchStudyDetails', $one->id) }}"> {{ @$one->title }} </a> </h6>
                                    <p class="text-right"> {{ \Illuminate\Support\Str::words($one->summary, 7) }} </p>
                                </div>
                            </div>
                        </div>
                        <a href="" class="card-footer text-right" style="MARGIN:0;">
                            <small class="text-muted" style="font-size: 12px;">
                                <img src="{{ url('frontend/img/edit.png') }}" height="15" class="pl-5"> {{ @$one->association->name }} </small>
                            <small class="text-muted" style="font-size: 12px; margin-right: 8px;">
                                <img src="{{ url('frontend/img/calender.png') }}" height="15" class="pl-5"> {{ @$one->created_at->format('Y/m/d') }}
                            </small>
                        </a>
                    </div>
                </div>
                @endforeach
                @endisset
                
                
            </div>
        </div>
    </section>



@endsection
  