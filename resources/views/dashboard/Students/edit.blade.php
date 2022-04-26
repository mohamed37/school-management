@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.students')}}
@stop
@endsection
{{
    $title = trans('students_trans.edit_student'),
  
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
              
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('students.update', 'test')}}" method="post">
                            {{ method_field('patch') }}
                         @csrf
                         <input type="hidden" value="{{$student->id}}" name="id">

                         <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students_trans.personal_information')}}</h6><br>
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label>{{trans('students_trans.name_ar')}} : <span class="text-danger">*</span></label>
                                     <input  type="text" name="name_ar" value="{{ $student->getTranslation('name', 'ar') }}" class="form-control">
                                     @error('name_ar')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                             </div>
 
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label>{{trans('students_trans.name_en')}} : <span class="text-danger">*</span></label>
                                     <input  class="form-control" name="name_en" value="{{ $student->getTranslation('name', 'en') }}" type="text" >
                                     @error('name_en')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                             </div>
                         </div>
 
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label>{{trans('students_trans.email')}} : </label>
                                     <input type="email" value="{{ $student->email }}" name="email" class="form-control" >
                                     @error('email')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                             </div>
 
                             <div class="col-md-6">
                                 <div class="form-group">
                                     <label>{{trans('students_trans.password')}} :</label>
                                     <input  type="password" name="password" class="form-control" >
                                     @error('password')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                             </div>
 
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="gender">{{trans('students_trans.gender')}} : <span class="text-danger">*</span></label>
                                     <select class="custom-select mr-sm-2" name="gender_id">
                                         <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                         @foreach($genders as $gender)
                                             <option  value="{{ $gender->id }}" 
                                                {{$student->gender_id == $gender->id ? 'selected' : ''}}>{{ $gender->name }}</option>
                                         @endforeach
 
                                         @error('gender_id')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                     </select>
                                 </div>
                             </div>
 
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="nal_id">{{trans('students_trans.Nationality')}} : <span class="text-danger">*</span></label>
                                     <select class="custom-select mr-sm-2" name="nationalitie_id">
                                         <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                         @foreach($nationals as $nal)
                                             <option  value="{{ $nal->id }}"
                                                {{$student->nationalitie_id == $nal->id ? 'selected' : ''}}>{{ $nal->name }}</option>
                                         @endforeach
 
                                         @error('nationalitie_id')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                     </select>
                                 </div>
                             </div>
 
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="bg_id">{{trans('students_trans.blood_type')}} : </label>
                                     <select class="custom-select mr-sm-2" name="blood_id">
                                         <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                         @foreach($bloods as $bg)
                                             <option value="{{ $bg->id }}"
                                                {{$student->blood_id == $bg->id ? 'selected' : ''}}>{{ $bg->name }}</option>
                                         @endforeach
 
                                         @error('blood_id')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                     </select>
                                 </div>
                             </div>
 
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label>{{trans('students_trans.Date_of_Birth')}}  :</label>
                                     <input class="form-control" type="text" value="{{$student->date_birth}}"  id="datepicker-action" name="date_birth" data-date-format="yyyy-mm-dd">
                                     @error('date_birth')
                                         <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                             </div>
 
                         </div>
 
                     <h6 style="font-family: 'Cairo', sans-serif;color: blue">{{trans('students_trans.student_information')}}</h6><br>
                     <div class="row">
                             <div class="col-md-2">
                                 <div class="form-group">
                                     <label for="Grade_id">{{trans('students_trans.grade')}} : <span class="text-danger">*</span></label>
                                     <select class="custom-select mr-sm-2" name="grade_id">
                                         <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                         @foreach($my_classes as $c)
                                             <option  value="{{ $c->id }}"
                                                {{$student->grade_id == $c->id ? 'selected' : ''}}>{{ $c->name }}</option>
                                         @endforeach
 
                                         @error('grade_id')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                     </select>
                                 </div>
                             </div>
 
                             <div class="col-md-2">
                                 <div class="form-group">
                                     <label for="Classroom_id">{{trans('students_trans.classrooms')}} : <span class="text-danger">*</span></label>
                                     <select class="custom-select mr-sm-2" name="classroom_id">
                                        <option value="{{$student->classroom_id}}"> {{$student->classroom->name}}</option>
 
                                     </select>
                                     @error('classroom_id')
                                       <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
                                 </div>
                             </div>
 
                             <div class="col-md-2">
                                 <div class="form-group">
                                     <label for="section_id">{{trans('students_trans.section')}} : </label>
                                     <select class="custom-select mr-sm-2" name="section_id">
                                        <option value="{{$student->section_id}}"> {{$student->section->name}}</option>
                                     </select>
                                     @error('section_id')
                                     <div class="alert alert-danger">{{ $message }}</div>
                                   @enderror
                                 </div>
                             </div>
 
                             <div class="col-md-3">
                                 <div class="form-group">
                                     <label for="parent_id">{{trans('students_trans.parent')}} : <span class="text-danger">*</span></label>
                                     <select class="custom-select mr-sm-2" name="parent_id">
                                         <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                        @foreach($parents as $parent)
                                             <option value="{{ $parent->id }}"
                                                {{$student->parent_id == $parent->id ? 'selected' : ''}}>{{ $parent->name_Father }}</option>
                                         @endforeach
 
                                         @error('parent_id')
                                           <div class="alert alert-danger">{{ $message }}</div>
                                         @enderror
                                     </select>
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
                                            <option value="{{ $year}}" {{$year == $student->academic_year ? 'selected' : ''}}>{{ $year }}</option>
                                        @endfor

 
                                     @error('academic_year')
                                      <div class="alert alert-danger">{{ $message }}</div>
                                     @enderror
 
                                 </select>
                             </div>
                            </div>
                         </div>
                         <br>
                      
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