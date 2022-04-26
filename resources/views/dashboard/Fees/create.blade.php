@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.fees')}}
@stop
@endsection
{{
    $title = trans('fees_trans.add_fees'),
  
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

                <form method="post"  action="{{ route('fees.store') }}" autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('fees_trans.title_ar')}} : <span class="text-danger">*</span></label>
                                    <input  type="text" name="title_ar"  class="form-control">
                                    @error('title_ar')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('fees_trans.title_en')}} : <span class="text-danger">*</span></label>
                                    <input  class="form-control" name="title_en" type="text" >
                                    @error('title_en')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>{{trans('fees_trans.amount')}} :</label>
                                    <input  class="form-control" name="amount" type="text">
                                    @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                         
                          
                        </div>

                     
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('fees_trans.grade')}} : <span class="text-danger">*</span></label>
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
                                    <label for="Classroom_id">{{trans('fees_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">

                                    </select>
                                    @error('classroom_id')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>   

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="fee_type">{{trans('fees_trans.fees_type')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="fee_type">
                                        <option value="1">{{ trans('fees_trans.fees') }}</option>
                                        <option value="2">{{ trans('fees_trans.fees_bus') }}</option>
                                    </select>
                                    @error('fee_type')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>   
                          
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>{{trans('fees_trans.year')}}  :</label>
                                    @php
                                     $current_year = date("Y")
                                    @endphp
                                    <select  class="custom-select mr-sm-2" name="year">
                                        @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                        <option value="{{ $year}}">{{ $year }}</option>
                                        @endfor
                                    </select>   
                               
                                @error('year')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="academic_year">{{trans('fees_trans.description')}} : </label>
                                 
                                    <textarea  class="form-control" name="description">

                                    </textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                
                                </div>
                                
                            </div>
                        </div><br>

                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.submit')}}</button>
                </form>

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