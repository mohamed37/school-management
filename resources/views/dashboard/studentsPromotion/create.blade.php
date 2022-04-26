@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students_trans.promotion_students')}}
@stop
@endsection
{{
    $title = trans('students_trans.promotion_students'),
  
    $dashboard =  trans('main_trans.Dashboard'),
     
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
                
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('promotion.store')}}" method="post">
                         @csrf
                         <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('promotion_trans.grade_old')}}</h6><br>
                       
                         <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('students_trans.grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
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

                                    </select>
                                    @error('classroom_id')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="section_id">{{trans('students_trans.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id">

                                    </select>
                                    @error('section_id')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
    
                                        @error('academic_year')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
    
                                    </select>
    
                                 </div>
                                </div>
                         </div>

                         <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('promotion_trans.grade_new')}}</h6><br>

                         <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('students_trans.grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id_new">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option  value="{{ $grade->id }}">{{ $grade->name }}</option>
                                        @endforeach

                                        @error('grade_id_new')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Classroom_id_new">{{trans('students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id_new">

                                    </select>
                                    @error('classroom_id_new')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="section_id_new">{{trans('students_trans.section')}} : </label>
                                    <select class="custom-select mr-sm-2" name="section_id_new">

                                    </select>
                                    @error('section_id_new')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                  @enderror
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('students_trans.academic_year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="academic_year_new">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @php
                                            $current_year = date("Y");
                                        @endphp
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                            <option value="{{ $year}}">{{ $year }}</option>
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



        /* NEW */
        $(document).ready(function () {
            $('select[name="grade_id_new"]').on('change', function () {
                var grade_id = $(this).val();
             
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('/admin/Get_classrooms') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="classroom_id_new"]').empty();
                            $('select[name="classroom_id_new"]').append('<option selected disabled >{{trans('parent_trans.choose')}}...</option>');
                            $.each(data, function (key, value) {
                               
                                $('select[name="classroom_id_new"]').append('<option value="' + key + '">' + value + '</option>');
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
            $('select[name="classroom_id_new"]').on('change', function () {
                var Classroom_id = $(this).val();
                
                if (Classroom_id) {
                    $.ajax({
                        url: "{{ URL::to('admin/Get_sections') }}/" + Classroom_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="section_id_new"]').empty();
                            $('select[name="section_id_new"]').append('<option selected disabled >{{trans('parent_trans.choose')}}...</option>');

                            $.each(data, function (key, value) {
                                $('select[name="section_id_new"]').append('<option value="' + key + '">' + value + '</option>');
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