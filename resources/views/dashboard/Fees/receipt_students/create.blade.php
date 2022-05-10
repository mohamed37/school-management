@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.receipt_students')}}
@stop
@endsection
{{
    $title = trans('fees_trans.add_receipt_students'),
  
    $dashboard =  trans('main_trans.dashboard'),
    
     
 }}
                              

@section('title')     {{ $title }}  @stop
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                        <form method="post"  action="{{ route('receipt_students.store') }}" autocomplete="off">
                            @csrf
                            <div class="row">
                                
                               
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('fees_trans.paid_amount') }} : <span class="text-danger">*</span></label>
                                        <input  class="form-control" name="debit" type="number" >
                                        <input  type="hidden" name="student_id"  value="{{$student->id}}" class="form-control">
                                    </div>
                                </div>

                                
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>{{ trans('fees_trans.prescribed_amount') }}</label>
                                            <input  class="form-control" name="prescribed_amount" value="{{$fee}}" readonly >
                                        </div>
                                    </div>
                                    
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>{{ trans('fees_trans.remaining_amount') }}</label>
                                        <input  class="form-control " name="remaining_amount" value="" readonly>
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
        $('input[name=debit]').on('keyup', function(){
            var prescribed_amount = parseFloat($('input[name=prescribed_amount]').val()),
                debit = parseFloat($(this).val());
                
                if(prescribed_amount < debit)
                {

                    $('input[name=remaining_amount]').empty().addClass('text-danger').val("غير مسموح ");
                }else{
                    
                    $('input[name=remaining_amount]').val(parseFloat(prescribed_amount - debit))
                }
        });
    </script>
@endsection