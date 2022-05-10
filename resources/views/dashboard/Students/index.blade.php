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
                    <a href="{{route('students.create')}}" class="btn btn-success btn-sm" role="button"
                        aria-pressed="true">{{ trans('students_trans.add_student') }}</a><br><br>
                        <div class="table-responsive">
                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                   data-page-length="50"
                                   style="text-align: center">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{trans('students_trans.name_student')}}</th>
                                <th>{{trans('students_trans.gender')}}</th>
                                <th>{{trans('students_trans.grade')}}</th>

                                <th>{{trans('students_trans.classrooms')}}</th>
                                <th>{{trans('students_trans.section')}}</th>
                                <th>{{trans('students_trans.academic_year')}}</th>
                               
                                <th>{{trans('main_trans.processes')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            
                            @foreach($students as $i=>$student)
                                <tr>
                                
                                    <td>{{ $i+1 }}</td>
                                    <td>{{$student->name}}</td>
                                    <td>{{$student->gender->name}}</td>
                                    <td>{{$student->grade->name}}</td>
                                    <td>{{$student->classroom->name}}</td>
                                    <td>{{$student->section->name}}</td>
                                    <td>{{$student->academic_year}}</td>

                                    <td>
                                       
                                            <a class="btn btn-success btn-sm dropdown-toggle" href="#"
                                                role="button" id="dropdownMenuLink" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                {{trans('main_trans.processes')}}
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item"
                                                    href="{{route('students.show',encrypt($student->id))}}"><i
                                                        style="color: #ffc107" class="far fa-eye "></i>&nbsp;
                                                        {{trans('students_trans.show_student')}} </a>
                                                <a class="dropdown-item"
                                                    href="{{route('students.edit',encrypt($student->id))}}"><i
                                                        style="color:green" class="fa fa-edit"></i>&nbsp;
                                                        {{trans('students_trans.edit_student')}} </a>
                                                     
                                                <a class="dropdown-item"
                                                    href="{{route('feesInovice.show',encrypt($student->id))}}"><i
                                                        style="color: #0000cc" class="fa fa-money"></i>&nbsp;
                                                        {{trans('fees_trans.add_fees_invoices')}}&nbsp;</a>
                                                <a class="dropdown-item"
                                                    href="{{route('receipt_students.show',encrypt($student->id))}}"><i
                                                        style="color: #9dc8e2"
                                                        class="fas fa-money-bill-alt"></i>&nbsp; &nbsp;
                                                        {{trans('fees_trans.add_receipt_students')}}</a>
                                                <a class="dropdown-item"
                                                    href="{{route('processingFees.show',encrypt($student->id))}}"><i
                                                        style="color:goldenrod" class="fas fa-donate"></i>&nbsp;
                                                    &nbsp;{{trans('fees_trans.add_processingFees')}}</a>
                                                    <a class="dropdown-item"
                                                    data-target="#delete_student{{ $student->id }}"
                                                    data-toggle="modal"
                                                    href="#delete_student{{ $student->id }}"><i
                                                        style="color: red" class="fa fa-trash"></i>&nbsp;
                                                        {{trans('students_trans.delete_student')}}</a>  
                                               
                                            </div>
                                        
                                    </td>
                                     

                                </tr>

                                <div class="modal fade" id="delete_student{{$student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{route('students.destroy','test')}}" method="post">
                                            {{method_field('delete')}}
                                            {{csrf_field()}}
                                         <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('students_trans.delete_student') }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p> {{ trans('messages.warning_deleted') }}</p>
                                                <input type="hidden" name="id"  value="{{$student->id}}">
                                            </div>
                                            <div class="modal-footer">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('main_trans.close') }}</button>
                                                    <button type="submit"
                                                            class="btn btn-danger">{{ trans('main_trans.delete') }}</button>
                                                </div>
                                            </div>
                                          </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </table>
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