@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.receipt_students')}}
@stop
@endsection
{{
    $title = trans('main_trans.receipt_students'),
  
    $dashboard =  trans('main_trans.dashboard'


),
     
 }}
@section('title')     {{ $title }}  @stop
@section('content')
    <!-- row -->
    <div class="row">
        
        <div class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                data-page-length="50"
                                style="text-align: center">
                            <thead>
                            <tr class="alert-success">
                                <th>#</th>
                                <th>{{ trans('fees_trans.title') }}</th>
                                <th>{{ trans('fees_trans.amount') }}</th>
                                <th>{{ trans('fees_trans.description') }}</th>
                                <th>{{ trans('main_trans.processes') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($receipt_students as $index=> $receipt_student)
                                <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{$receipt_student->student->name}}</td>
                                <td>{{ number_format($receipt_student->debit, 2) }}</td>
                                <td>{{$receipt_student->description}}</td>
                                    <td>
                                        <a href="{{route('receipt_students.edit',encrypt($receipt_student->id))}}" class="btn btn-info btn-sm" role="button" aria-pressed="true"><i class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete_receipt_student{{$receipt_student->id}}" ><i class="fa fa-trash"></i></button>
                                    </td>

                                    <div class="modal fade" id="delete_receipt_student{{$receipt_student->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('receipt_students.destroy','test')}}" method="post">
                                                {{method_field('delete')}}
                                                {{csrf_field()}}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">{{ trans('fees_trans.delete_receipt_students') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> {{ trans('messages.warning_deleted') }}</p>
                                                    <input type="hidden" name="id"  value="{{$receipt_student->id}}">
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
                                </tr>
                            
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
               
    </div>
    <!-- row closed -->
@endsection
