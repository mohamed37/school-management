@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.teachers')}}
@stop
@endsection
{{
    $title = trans('teachers_trans.edit_teacher'),
  
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

                @if(session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">


                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{route('teachers.update', 'test')}}" method="post">
                            {{ method_field('patch') }}
                         @csrf
                         <input type="hidden" value="{{$teacher->id}}" name="id">
                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('teachers_trans.email')}}</label>
                                <input type="email" name="email" class="form-control" value="{{$teacher->email}}">
                                @error('email')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label for="title">{{trans('teachers_trans.password')}}</label>
                                <input type="password" name="password" class="form-control">
                                @error('password')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>


                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('teachers_trans.name_ar')}}</label>
                                <input type="text" name="name_ar" class="form-control"  
                                       value="{{ $teacher->getTranslation('name', 'ar') }}">
                                @error('name_ar')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label for="title">{{trans('teachers_trans.name_en')}}</label>
                                <input type="text" name="name_en" class="form-control" 
                                value="{{ $teacher->getTranslation('name', 'en') }}">
                                @error('name_en')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>
                        
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="inputCity">{{trans('teachers_trans.specialization')}}</label>
                                <select class="custom-select my-1 mr-sm-2" name="specialization_id">
                                    <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                    @foreach($specializations as $specialization)
                                        <option value="{{$specialization->id}}"
                                            {{$teacher->specialization_id == $specialization->id ? 'selected' : ''}}>
                                            {{$specialization->name}}</option>
                                    @endforeach
                                </select>
                                @error('specialization_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group col">
                                <label for="inputState">{{trans('teachers_trans.gender')}}</label>
                                <select class="custom-select my-1 mr-sm-2" name="gender_id">
                                    <option selected disabled>{{trans('parent_trans.choose')}}...</option>
                                    @foreach($genders as $gender)
                                        <option value="{{$gender->id}}"
                                            {{$teacher->gender_id == $gender->id ? 'selected' : ''}}>
                                            {{$gender->name}}</option>
                                    @endforeach
                                </select>
                                @error('gender_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-row">
                            <div class="col">
                                <label for="title">{{trans('teachers_trans.joining_Date')}}</label>
                                <div class='input-group date'>
                                    <input class="form-control" type="text"  id="datepicker-action" name="joining_Date" 
                                           data-date-format="yyyy-mm-dd" value="{{$teacher->joining_Date}}" required >
                                </div>
                                @error('joining_Date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <br>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">{{trans('teachers_trans.address')}}</label>
                            <textarea class="form-control" name="address"
                                      id="exampleFormControlTextarea1" rows="4">{{$teacher->address}}</textarea>
                            @error('address')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button class="btn btn-success btn-sm nextBtn btn-lg pull-right" type="submit">{{trans('main_trans.update')}}</button>
                </form>
                    </div>
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