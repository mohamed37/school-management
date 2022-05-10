@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.fees')}}
@stop
@endsection
{{
    $title = trans('fees_trans.processingFees') ,
  
    $dashboard =  trans('main_trans.dashboard'),
     
 }}
@section('title')     {{ $title  . $student->name }}@stop
@section('content')
 <!-- row -->
 <div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
               
                <form method="post"  action="{{ route('processingFees.store') }}" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('fees_trans.amount') }} : <span class="text-danger">*</span></label>
                                <input  class="form-control" name="debit" type="number" value="0" min="1">
                                <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                                @error('debit')
                                 <div class="alert alert-danger debit">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>{{ trans('fees_trans.rest_payment') }}  : </label>
                                <input  class="form-control" name="final_balance" 
                                value="{{ number_format($student->student_account->sum('debit') - $student->student_account->sum('credit'), 2) }}" type="text" readonly>
                              
                                @error('final_balance')
                                 <div class="alert alert-danger final_balance">{{ $message }}</div>
                                @enderror
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
@section('js')
    @toastr_js
    @toastr_render

    <script>
        $('form').on('submit', function(){
            var rest = $('input[name=final_balance]').val(),
                debit = $('input[name=debit]').val();
                if(debit <= rest)
                {
                    alert('غير مسموح بستبعاد هذا الملبغ ');
                }else{
                    alert(' مسموح بستبعاد هذا الملبغ ');

                }
        });
    </script>
@endsection