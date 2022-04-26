@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('fees_trans.edit_fees')}}
@stop
@endsection
{{
    $title = trans('fees_trans.edit_fees'),
  
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
              
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('fees.update', 'test')}}" method="post" autocomplete="off">
                            @method('PUT')
                            @csrf
                         <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees_trans.title_ar')}}</label>
                                <input type="text" value="{{$fee->getTranslation('title','ar')}}" name="title_ar" class="form-control">
                                <input type="hidden" value="{{$fee->id}}" name="id" class="form-control">
                                
                            </div>

                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees_trans.title_en')}}</label>
                                <input type="text" value="{{$fee->getTranslation('title','en')}}" name="title_en" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{trans('fees_trans.amount')}}</label>
                                <input type="number" value="{{$fee->amount}}" name="amount" class="form-control">
                            </div>

                        </div>


                         <div class="form-row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Grade_id">{{trans('fees_trans.grade')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="grade_id">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @foreach($grades as $grade)
                                            <option  value="{{ $grade->id }}" {{$fee->grade_id == $grade->id ? 'selected' : ''}}>{{ $grade->name }}</option>
                                        @endforeach

                                        @error('grade_id')
                                          <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="Classroom_id">{{trans('fees_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="classroom_id">
                                        <option value="{{$fee->classroom_id}}"> {{$fee->classroom->name}}</option>
                                    </select>
                                    @error('classroom_id')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>   
                          
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="year">{{trans('fees_trans.year')}} : <span class="text-danger">*</span></label>
                                    <select class="custom-select mr-sm-2" name="year">
                                        <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                           @php
                                               $current_year = date("Y");
                                           @endphp
                                           @for($year=$current_year; $year<=$current_year +1 ;$year++)
                                               <option value="{{ $year}}" {{$year == $fee->year ? 'selected' : ''}}>{{ $year }}</option>
                                           @endfor
   
    
                                        @error('year')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
    
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="year">{{trans('fees_trans.description')}} : </label>
                                 
                                    <textarea  class="form-control" name="description">{{$fee->description}}
                                    </textarea>
                                    @error('description')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                
                                </div>
                                
                            </div>
                         </div>
                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.update')}}</button>
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