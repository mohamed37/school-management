@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.payment_students')}}
@stop
@endsection
{{
    $title = trans('main_trans.payment_students'),
  
    $dashboard =  trans('main_trans.dashboard'


),
     
 }}
@section('title')     {{ $title }} @stop
@section('content')
 <!-- row -->
 <div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                <form method="post"  action="{{ route('payment_students.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('fees_trans.amount') }} : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="debit" type="number" >
                                <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('fees_trans.final_balance') }}  : </label>
                                <input  class="form-control" name="final_balance" 
                                value="{{ number_format($student->student_account->sum('debit') - $student->student_account->sum('credit'), 2) }}" type="text" readonly>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>{{ trans('fees_trans.description') }} : <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.submit')}}</button>
                </form>
            </div>
        </div>
    </div>
</div>
 <!-- row closed -->
@endsection