@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.exams')}}
@stop
@endsection
{{
    $title = trans('exams_trans.edit_exam'),
  
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
                   
                       
                    <form action="{{route('exams.update' , 'test')}}" method="post">
                            {{ method_field('patch') }}
                         @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('exams_trans.name_exam_ar')}}</label>
                                <input type="text" name="name_ar" value="{{ $exam->getTranslation('name', 'ar') }}" class="form-control">
                                <input type="hidden" name="id" value="{{ $exam->id }}" class="form-control">
                                @error('name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="title">{{trans('exams_trans.name_exam_en')}}</label>
                                <input type="text" name="name_en" value="{{ $exam->getTranslation('name', 'en') }}" class="form-control">
                                @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="col">
                                <label for="title">{{trans('exams_trans.term')}}</label>
                                <input type="number" name="term" value="{{$exam->term}}" class="form-control">
                                @error('term')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                           @php
                                               $current_year = date("Y");
                                           @endphp
                                           @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                               <option value="{{ $year}}" {{$year == $exam->academic_year ? 'selected' : ''}}>{{ $year }}</option>
                                           @endfor
   
    
                                        @error('academic_year')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
    
                                    </select>
                                </div>
                               </div>

                        </div>
                       
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

    <script>
     
    </script>
@endsection