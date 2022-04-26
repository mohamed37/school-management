@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('students_trans.students_details')}}
@stop
@endsection
{{
    $title = trans('students_trans.students_details'),
  
    $dashboard =  trans('main_trans.dashboard'),
     
}}
@section('title')     {{ $title }}  @stop
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                   
                    
                        <div class="tab nav-border">
                          <div class="card">   
                            @foreach($student->images as $index=>$attachment)
                            <img src="{{asset('attachments/students/'.$student->name . "/".$attachment->filename)}}" 
                                 class="rounded mx-auto d-block" alt="{{$student->name}}">
                            @endforeach   
                           <div class="card-body">      
                            <ul class="list-group" role="tablist">
                                <li class="list-group-item">
                                    <a class="list-group-item list-group-item-action active" id="home-02-tab" data-toggle="tab" href="#home-02"
                                       role="tab" aria-controls="home-02"
                                       aria-selected="true">{{trans('students_trans.students_details')}}</a>
                                </li>

                                <li class="list-group-item">
                                    <a class="list-group-item list-group-item-action" id="profile-01-tab" data-toggle="tab" href="#profile-01"
                                       role="tab" aria-controls="profile-01"
                                       aria-selected="false">{{trans('attendances_trans.title_page')}}</a>
                                </li>
                                
                                <li class="list-group-item">
                                    <a class="list-group-item list-group-item-action" id="profile-02-tab" data-toggle="tab" href="#profile-02"
                                       role="tab" aria-controls="profile-02"
                                       aria-selected="false">{{trans('students_trans.Attachments')}}</a>
                                </li>
                                
                              

                                <!-- student_absence -->
                            </ul>
                           </div>
                          </div>

                            <div class="tab-content">
                                <div class="tab-pane fade active show" id="home-02" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            <th scope="row">{{trans('students_trans.name')}}</th>
                                            <td>{{ $student->name }}</td>
                                            <th scope="row">{{trans('students_trans.email')}}</th>
                                            <td>{{$student->email}}</td>
                                            <th scope="row">{{trans('students_trans.gender')}}</th>
                                            <td>{{$student->gender->name}}</td>
                                            <th scope="row">{{trans('students_trans.Nationality')}}</th>
                                            <td>{{$student->nationality->name}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('students_trans.grade')}}</th>
                                            <td>{{ $student->grade->name }}</td>
                                            <th scope="row">{{trans('students_trans.classrooms')}}</th>
                                            <td>{{$student->classroom->name}}</td>
                                            <th scope="row">{{trans('students_trans.section')}}</th>
                                            <td>{{$student->section->name}}</td>
                                            <th scope="row">{{trans('students_trans.Date_of_Birth')}}</th>
                                            <td>{{ $student->date_birth}}</td>
                                        </tr>

                                        <tr>
                                            <th scope="row">{{trans('students_trans.parent')}}</th>
                                            <td>{{ $student->parent->name_Father}}</td>
                                            <th scope="row">{{trans('students_trans.academic_year')}}</th>
                                            <td>{{ $student->academic_year }}</td>
                                            <th scope="row"></th>
                                            <td></td>
                                            <th scope="row"></th>
                                            <td></td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade " id="profile-01" role="tabpanel"
                                     aria-labelledby="home-02-tab">
                                    <table class="table table-striped table-hover" style="text-align:center">
                                        <tbody>
                                        <tr>
                                            @forelse($student_absences as $student_absence)
                                            <th scope="row">{{trans('attendances_trans.date')}}</th>
                                            <td>{{ $student_absence->attendance_date }}</td>
                                                
                                            <th scope="row">{{trans('attendances_trans.status')}}</th>
                                            <td>
                                                {{ 
                                                    $student_absence->attendance_status  == 0 
                                                    ? trans('attendances_trans.presence')
                                                    : trans('attendances_trans.attendance')
                                                }}
                                            </td>

                                            
                                            
                                            @empty
                                               <th scope="row">
                                                   {{trans('messages.not_found')}}
                                               </th> 
                                            @endforelse
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="tab-pane fade" id="profile-02" role="tabpanel"
                                     aria-labelledby="profile-02-tab">
                                    <div class="card card-statistics">
                                        <div class="card-body">
                                            <form method="post" action="{{route('upload_attachment')}}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label
                                                            for="academic_year">{{trans('students_trans.Attachments')}}
                                                            : <span class="text-danger">*</span></label>
                                                        <input type="file" accept="image/*" name="photos[]" multiple required>
                                                        <input type="hidden" name="student_name" value="{{$student->name}}">
                                                        <input type="hidden" name="student_id" value="{{$student->id}}">
                                                    </div>
                                                </div>
                                                <br><br>
                                                <button type="submit" class="button button-border x-small">
                                                       {{trans('main_trans.submit')}}
                                                </button>
                                            </form>
                                        </div>
                                        <br>
                                        <table class="table center-aligned-table mb-0 table table-hover"
                                               style="text-align:center">
                                            <thead>
                                            <tr class="table-secondary">
                                                <th scope="col">#</th>
                                                <th scope="col">{{trans('students_trans.filename')}}</th>
                                                <th scope="col">{{trans('students_trans.created_at')}}</th>
                                                <th scope="col">{{trans('main_trans.processes')}}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($student->images as $index=>$attachment)
                                                <tr style='text-align:center;vertical-align:middle'>
                                                    <td>{{$index+1}}</td>
                                                    <td >{{$attachment->filename}}
                                                        <img class="img-square" src="{{asset('attachments/students/'.$student->name . "/".$attachment->filename)}}">
                                                    
                                                    </td>
                                                    <td >{{$attachment->created_at->diffForHumans()}}</td>
                                                        <?php $url = str_replace('students/'.$student->id,'Download_photos',request()->url()) ?>
                                                    <td colspan="2">
                                                        <a class="btn btn-outline-info btn-sm"
                                                           href="{{url($url)}}/{{ $attachment->imageable->name }}/{{$attachment->filename}}"
                                                           {{-- ."/". $attachment->imageable->name ."/".$attachment->filename --}}
                                                           role="button"><i class="fa fa-download"></i>&nbsp; {{trans('students_trans.download')}}</a>
                                                       

                                                        <button type="button" class="btn btn-outline-danger btn-sm"
                                                                data-toggle="modal"
                                                                data-target="#Delete_img{{ $attachment->id }}"
                                                                title="{{ trans('main_trans.delete') }}">{{trans('main_trans.delete')}}
                                                        </button>

                                                    </td>
                                                </tr>
                                                @include('dashboard.students.delete_img')
                                            @endforeach
                                            </tbody>
                                        </table>
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