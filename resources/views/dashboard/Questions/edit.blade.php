@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.quizzes')}}
@stop
@endsection
{{
    $title = trans('quizzes_trans.edit_quizze'),
  
    $dashboard =  trans('main_trans.dashboard'


),
     
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
                   
                       
                    <form action="{{route('questions.update' , 'test')}}" method="post">
                            {{ method_field('patch') }}
                         @csrf
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('questions_trans.title_question_ar')}}</label>
                                <input type="text" name="title_ar" value="{{ $question->getTranslation('title', 'ar') }}" class="form-control">
                                <input type="hidden" name="id" value="{{ $question->id }}" class="form-control">
                                @error('title_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="title">{{trans('questions_trans.title_question_en')}}</label>
                                <input type="text" name="title_en" value="{{ $question->getTranslation('title', 'en') }}" class="form-control">
                                @error('title_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        
                        </div>
                        <br>
                        
   
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('questions_trans.answers')}} : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="answers"  rows="6">{{$question->answers}}</textarea>
                                
                                    @error('answers')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('questions_trans.right_answer')}} : <span class="text-danger">*</span></label>
                                    <textarea class="form-control" style="color: orange" name="right_answer" >{{$question->right_answer}}</textarea>
                                    
                                    @error('right_answer')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                    
                                </div>
                            </div>

                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('questions_trans.quizzes')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="quizze_id">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @foreach($quizzes as $quizze)
                                            <option  value="{{ $quizze->id }}" {{$question->quizze_id ==  $quizze->id ? 'selected' : ''}}>{{ $quizze->name}}</option>
                                        @endforeach

                                        @error('quizze_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('questions_trans.score')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="score">
                                        <option>{{$question->score}}</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="15">15</option>
                                        <option value="20">20</option>
                                        @error('score')
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