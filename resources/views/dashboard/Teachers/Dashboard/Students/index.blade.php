   
@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.students')}}
@stop
@endsection
{{
    $title = trans('main_trans.students'),
  
    $dashboard =  trans('main_trans.dashboard'),
     
 }}
@section('title')     {{ $title }}  @stop
@section('content')
    <!-- row -->
    <div class="row">
      
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                   
                    <div class="table-responsive">

                     <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{ trans('attendances_trans.date_day') }} : {{ date('Y-m-d') }}</h5>
                     <br>
                     <form method="post" action="{{route('studentAttendance')}}">
                
                            @csrf
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                            <thead>
                            <tr>
                                <th class="alert-success">#</th>
                                <th class="alert-success">{{trans('Students_trans.name')}}</th>
                                <th class="alert-success">{{trans('Students_trans.email')}}</th>
                                <th class="alert-success">{{trans('Students_trans.gender')}}</th>
                                <th class="alert-success">{{trans('Students_trans.grade')}}</th>
                                <th class="alert-success">{{trans('Students_trans.classrooms')}}</th>
                                <th class="alert-success">{{trans('Students_trans.section')}}</th>
                                <th class="alert-success">{{ trans('main_trans.processes') }}</th>
                               
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->gender->name}}</td>
                                    <td>{{$student->grade->name}}</td>
                                    <td>{{$student->classroom->name}}</td>
                                    <td>{{$student->section->name}}</td>
                                    <td>{{$student->academic_year}}</td>
                                    <td>

                                        <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                            <input name="attendances[{{ $student->id }}]" 
                                                  @foreach ($student->attendances()->where('attendance_date', date('y-m-d'))->get() as $attendance)
                                                      {{$attendance->attendance_status == 1 ? 'checked' : ''}}
                                                  @endforeach
                                                   class="leading-tight" type="radio" value="presence">
                                            <span class="text-success">{{ trans('attendances_trans.presence') }}</span>
                                        </label>
            
                                        <label class="ml-4 block text-gray-500 font-semibold">
                                            <input name="attendances[{{ $student->id }}]" 
                                            @foreach ($student->attendances()->where('attendance_date', date('y-m-d'))->get() as $attendance)
                                                {{ $attendance->attendance_status == 0 ? 'checked' : '' }}
                                            @endforeach
                                                  
                                                   class="leading-tight" type="radio" value="absent">
                                            <span class="text-danger">{{ trans('attendances_trans.attendance') }}</span>
                                        </label>
            

                                    </td>
                                    
                                </tr>

                                <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                                <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                                <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                                <input type="hidden" name="section_id" value="{{ $student->section_id }}">
                            
                            @endforeach
                        </table>

                        <P>
                            <button class="btn btn-success" type="submit">{{ trans('main_trans.confirm') }}</button>
                        </P>
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
