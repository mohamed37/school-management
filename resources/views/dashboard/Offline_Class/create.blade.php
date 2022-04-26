@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.online_classes')}}
@stop
@endsection
{{
    $title = trans('online_class_trans.add_offline_class'),
  
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
                    <form action="{{route('offline_store')}}" method="post">
                         @csrf
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('online_class_trans.grades')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option  value="{{ $grade->id }}">{{ $grade->name}}</option>
                                        @endforeach

                                        @error('grade_id')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">

                                    </select>
                                    @error('classroom_id')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="section_id">{{trans('students_trans.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">

                                    </select>
                                    @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('online_class_trans.topic') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="topic" type="text">
                                </div>
                            </div>
    
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('online_class_trans.meeting_num') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="meeting_id" type="number">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('online_class_trans.meeting_pas') }}: <span class="text-danger">*</span></label>
                                    <input class="form-control" name="password" type="text">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ trans('online_class_trans.start_at') }}  : <span class="text-danger">*</span></label>
                                    <input class="form-control" type="datetime-local" name="start_at">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label> {{ trans('online_class_trans.duration') }}  : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="duration" type="text">
                                </div>
                            </div>

                           
    
                        </div>

                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{ trans('online_class_trans.start_time') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="start_url" type="text">
                                </div>
                            </div>
    
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label>{{ trans('online_class_trans.join_stu') }} : <span class="text-danger">*</span></label>
                                    <input class="form-control" name="join_url" type="text">
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