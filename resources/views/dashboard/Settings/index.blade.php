@extends('layouts.master')
    @section('css')    
    @toastr_css 

    @section('title')     {{ trans('main_trans.settings') }}  @stop
    @endsection

    {{
        $title = trans('main_trans.settings'),
      
        $dashboard =  trans('main_trans.dashboard'


),
         
     }}
    @section('title')     {{ $title }}  @stop
    

@section('content')
    <!-- row -->
  <div class="row">


    @if ($errors->any())
        <div class="error">{{ $errors->first('name') }}</div>
    @endif


    <!-- Index -->
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
               

                <form enctype="multipart/form-data" method="post" action="{{route('settings.update','test')}}">
                    @csrf @method('PUT')
                    <div class="row">
                        
                        <div class="col-md-6 border-right-2 border-right-blue-400">
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.school_name') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="school_name" value="{{ $setting['school_name'] }}" required type="text" class="form-control" placeholder="{{ trans('settings_trans.school_name') }}">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.school_title') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="school_title" value="{{ $setting['school_title'] }}" required type="text" class="form-control" placeholder="{{ trans('settings_trans.school_title') }}">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.current_session') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    
                                    <select data-placeholder="{{trans('fees_trans.choose')}}" required name="current_session" id="current_session" class="select-search form-control">
                                        <option value=""></option>
                                        @for($y=date('Y', strtotime('- 3 years')); $y<=date('Y', strtotime('+ 1 years')); $y++)
                                            <option {{ ($setting['current_session'] == (($y-=1).'-'.($y+=1))) ? 'selected' : '' }}>{{ ($y-=1).'-'.($y+=1) }}</option>
                                        @endfor
                                    </select>
                                </div>
                            </div>
                       
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.end_first_term') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="end_first_term" value="{{ $setting['end_first_term'] }}" required type="text" class="form-control" placeholder="{{ trans('settings_trans.end_first_term') }}">
                                </div>
                            </div>
                       
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.end_second_term') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="end_second_term" value="{{ $setting['end_second_term'] }}" required type="text" class="form-control" placeholder="{{ trans('settings_trans.end_second_term') }}">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.phone') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="phone" value="{{ $setting['phone'] }}" required type="text" class="form-control" placeholder="{{ trans('settings_trans.phone') }}">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.address') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="address" value="{{ $setting['address'] }}" required type="text" class="form-control" placeholder="{{ trans('settings_trans.address') }}">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.school_email') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="school_email" value="{{ $setting['school_email'] }}" required type="text" class="form-control" placeholder="{{ trans('settings_trans.school_email') }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-lg-2 col-form-label font-weight-semibold">{{ trans('settings_trans.logo') }}<span class="text-danger">*</span></label>
                                <div class="col-lg-9">
                                    <input name="logo" value="{{ $setting['logo'] }}" accept="image/*"  type="file" class="form-control" placeholder="{{ trans('library_trans.file_name') }}">
                                </div>
                        </div>

                        
                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.confirm')}}</button>


                        </div>
                        <div class="col-md-6 border-right-2 border-right-blue-400">

                            <img src="{{asset('attachments/attach_settings/'.$setting['logo'])}}" >

                        </div><br>

                    </div>
                </form>
            </div>
        </div>
    </div>
            
</div>

    <!-- End of Index -->
    
   
 
<!-- row closed -->
    @endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection