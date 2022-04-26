@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('fees_trans.processingFees')}}
@stop
@endsection
{{
    $title = trans('fees_trans.edit_processingFees'),
  
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

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{route('processingFees.update','test')}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees_trans.title') }} </label>
                                <input type="text" value="{{$process->student->name}}" readonly name="title_ar" class="form-control">
                                <input type="hidden" value="{{$process->id}}" name="id" class="form-control">
                                <input type="hidden" value="{{$process->student->id}}" name="student_id" class="form-control">
                            </div>


                            <div class="form-group col">
                                <label for="inputEmail4">{{ trans('fees_trans.amount') }}</label>
                                <input type="number" value="{{$process->amount}}" name="debit" class="form-control">
                            </div>

                        </div>


                    
                        <div class="form-group">
                            <label for="inputAddress">{{ trans('fees_trans.description') }}</label>
                            <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="4">{{$process->description}}</textarea>
                        </div>
                        <br>

                        <button type="submit" class="btn btn-primary">{{ trans('main_trans.submit') }}</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
<!-- row closed -->
@endsection