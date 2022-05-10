@extends('layouts.master')
@section('css')

@section('title')
     {{trans('main_trans.students')}} 
@stop
@endsection

@section('content')
<!-- row -->
{{
    $title = trans('parent_trans.parents'),
  
    $dashboard =  trans('main_trans.dashboard'),
     
 }}
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
              <livewire:add-parent/>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
 @livewireScripts
@endsection
