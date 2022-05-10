@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('attendances_trans.title_page') }}
@stop
@endsection

{{
    $title = trans('attendances_trans.title_page'),

    $dashboard =  trans('main_trans.dashboard'),
}}
@section('title')     {{ $title }}  @stop
@section('content')
 <!-- row -->
 <div class="row">
    <div class="col-xl-12 mb-30">
     <div class="card card-statistics h-100">
           
        <div class="card-body">
          
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-danger">
                <ul>
                    <li>{{ session('status') }}</li>
                </ul>
            </div>
        @endif

        <h5 style="font-family: 'Cairo', sans-serif;color: red"> {{ trans('attendances_trans.date_day') }} : {{ date('Y-m-d') }}</h5>
        <br>
        <form method="post" action="{{ route('attendances.store') }}">
    
            @csrf
            <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                   style="text-align: center">
                <thead>
                <tr>
                    <th class="alert-success">#</th>
                    <th class="alert-success">{{ trans('students_trans.name') }}</th>
                    <th class="alert-success">{{ trans('students_trans.email') }}</th>
                    <th class="alert-success">{{ trans('students_trans.gender') }}</th>
                    <th class="alert-success">{{ trans('students_trans.grade') }}</th>
                    <th class="alert-success">{{ trans('students_trans.classrooms') }}</th>
                    <th class="alert-success">{{ trans('students_trans.section') }}</th>
                    <th class="alert-success">{{ trans('main_trans.processes') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($students as $index=>$student)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        <td>{{ $student->gender->name }}</td>
                        <td>{{ $student->grade->name }}</td>
                        <td>{{ $student->classroom->name }}</td>
                        <td>{{ $student->section->name }}</td>
                        <td>
    
                            @if(isset($student->attendances()->where('attendance_date',date('Y-m-d'))->first()->student_id))
    
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input name="attendances[{{ $student->id }}]" disabled
                                           {{ $student->attendances()->first()->attendance_status == 1 ? 'checked' : '' }}
                                           class="leading-tight" type="radio" value="presence">
                                    <span class="text-success">{{ trans('attendances_trans.presence') }}</span>
                                </label>
    
                                <label class="ml-4 block text-gray-500 font-semibold">
                                    <input name="attendances[{{ $student->id }}]" disabled
                                           {{ $student->attendances()->first()->attendance_status == 0 ? 'checked' : '' }}
                                           class="leading-tight" type="radio" value="absent">
                                    <span class="text-danger">{{ trans('attendances_trans.attendance') }}</span>
                                </label>
    
                            @else
    
                                <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                    <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                                           value="presence">
                                    <span class="text-success">{{ trans('attendances_trans.presence') }}</span>
                                </label>
    
                                <label class="ml-4 block text-gray-500 font-semibold">
                                    <input name="attendances[{{ $student->id }}]" class="leading-tight" type="radio"
                                           value="absent">
                                    <span class="text-danger">{{ trans('attendances_trans.attendance') }}</span>
                                </label>
    
                            @endif
    
                            <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                            <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                            <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                            <input type="hidden" name="section_id" value="{{ $student->section_id }}">
    
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <P>
                <button class="btn btn-success" type="submit">{{ trans('main_trans.confirm') }}</button>
            </P>
        </form>
        <br>
       
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
            $('select[name="grade_id"]').on('change keyup', function () {
                var grade_id = $(this).val();
                /* "{{ URL::to('/admin/classes') }}/" */
                if (grade_id) {
                    $.ajax({
                        url: "{{ URL::to('/admin/classes') }}/" + grade_id,
                        type: "GET",
                        dataType: "json",
                        success: function (data) {
                            $('select[name="class_id"]').empty();
                            $.each(data, function (key, value) {
                                $('select[name="class_id"]').append('<option value="' + key + '">' + value + '</option>');
                            });
                        },
                    });
                } else {
                    console.log('AJAX load did not work');
                }
            });
        });
    </script>

@endsection