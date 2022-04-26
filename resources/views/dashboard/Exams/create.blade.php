@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.exams')}}
@stop
@endsection
{{
    $title = trans('exams_trans.add_exam'),
  
    $dashboard =  trans('main_trans.dashboard'),
     
 }}
@section('title')     {{ $title }}  @stop
@section('content')
    <!-- row -->

<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="col-xs-12">
                    <form action="{{route('exams.store')}}" method="post">
                         @csrf
                        <div class="form-row">
                           
                            <div class="col">
                                <label for="title">{{trans('exams_trans.name_exam_ar')}}</label>
                                
                                <select class="custom-select mr-sm-2" name="name_ar">
                                    <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                    @foreach($subjects as $subject)
                                        <option  value="{{ $subject->name }}">{{ $subject->name }}</option>
                                    @endforeach

                                    @error('name_ar')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </select>

                                
                            </div>
                          
                            <div class="col">
                                <label for="title">{{trans('exams_trans.name_exam_en')}}</label>

                                <select class="custom-select mr-sm-2" name="name_en">
                                    <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                    @foreach($subjects as $subject)
                                        <option  value="{{ $subject->getTranslation('name', 'en') }}">{{ $subject->getTranslation('name', 'en') }}</option>
                                    @endforeach

                                    @error('name_en')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </select>
                                
                                
                            </div>

                           
                            <div class="col">
                                <label for="title">{{ trans('exams_trans.term') }}</label>
                                <input type="number" name="term" class="form-control">
                            </div>
                        </div>
                        <br>

                    <div class="form-row">
                       

                        <div class="form-group col">
                            <label for="academic_year">{{trans('Students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                            <select class="custom-select mr-sm-2" name="academic_year">
                                <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                @php
                                    $current_year = date("Y");
                                @endphp
                                @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                    <option value="{{ $year}}">{{ $year }}</option>
                                @endfor
                            </select>
                        </div>
                    </div>
                    <br>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.submit')}}</button>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
   

  
@endsection