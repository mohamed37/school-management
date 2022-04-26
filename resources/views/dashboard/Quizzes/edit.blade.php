@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.quizzes')}}
@stop
@endsection
{{
    $title = trans('quizzes_trans.edit_quizze'),
  
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
                   
                       
                    <form action="{{route('quizzes.update' , 'test')}}" method="post">
                            {{ method_field('patch') }}
                         @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('quizzes_trans.name_quizze_ar')}}</label>
                                <input type="text" name="name_ar" value="{{ $quizze->getTranslation('name', 'ar') }}" class="form-control">
                                <input type="hidden" name="id" value="{{ $quizze->id }}" class="form-control">
                                @error('name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="title">{{trans('quizzes_trans.name_quizze_en')}}</label>
                                <input type="text" name="name_en" value="{{ $quizze->getTranslation('name', 'en') }}" class="form-control">
                                @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('students_trans.grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option  value="{{ $grade->id }}" {{$quizze->grade_id == $grade->id ? 'selected' : ''}}>{{ $grade->name }}</option>
                                        @endforeach

                                        @error('grade_id')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">
                                        <option  value="{{ $quizze->classroom_id }}">{{ $quizze->classroom->name }}</option>

                                    </select>
                                    @error('classroom_id')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="section_id">{{trans('students_trans.section')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="section_id">
                                        <option  value="{{ $quizze->section_id }}">{{ $quizze->section->name }}</option>

                                    </select>
                                    @error('section_id')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="teacher_id">{{trans('subjects_trans.teachers')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="teacher_id">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @foreach($teachers as $teacher)
                                            <option  value="{{ $teacher->id }}"{{$quizze->teacher_id == $teacher->id ? 'selected' : ''}}>{{ $teacher->name ."[". $teacher->specializations->name ."]"}}</option>
                                        @endforeach

                                        @error('teacher_id')
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
        $(document).ready(function () {
            $('select[name="grade_id"]').on('change', function () {
                var grade_id = $(this).val();
               
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('/admin/Get_classrooms') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id"]').empty();
                            $('select[name="classroom_id"]').append('<option selected disabled >{{trans('parent_trans.choose')}}...</option>');
                            $.each(data, function (key, value) {
                               
                                $('select[name="classroom_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
   
        $(document).ready(function () {
            $('select[name="classroom_id"]').on('change', function () {
                var Classroom_id = $(this).val();
                
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/Get_sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id"]').empty();
                            $('select[name="section_id"]').append('<option selected disabled >{{trans('parent_trans.choose')}}...</option>');

                            $.each(data, function (key, value) {
                                $('select[name="section_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                }
                else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>
@endsection