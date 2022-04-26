<!DOCTYPE html>
<html lang="en">
    @section('title') {{ trans('main_trans.dashboard') }} @endsection
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    @livewireStyles
    <style>
        .table-info > th{background-color: papayawhip;}
    </style>
</head>

<body>

    <div class="wrapper">

        <!--preloader -->

        <div id="pre-loader">
            <img src="assets/images/pre-loader/loader-01.svg" alt="">
        </div>

        <!--preloader -->

        @include('layouts.main-header')

        @include('layouts.MainSidebar.teacher-main-sidebar')

        
        <!-- main-content -->
        <div class="content-wrapper">
            
             <!-- Main content -->
            <!-- Main content -->
            <div class="page-title" >
                <div class="row">
                    <div class="col-sm-6" >
                        <h3 class="mb-0" style="font-family: 'Cairo', sans-serif; font-size:35px">{{ trans('main_trans.dashboard') ." ". trans('login_trans.teacher')}}</h3>
                        <hr>
                    </div>
                   
                    <div class="col-sm-6">
                        <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                        </ol>
                    </div>
                    
                </div>
            </div>
            <!-- widgets -->
            <div class="row" >
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-success">
                                        <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark"> {{trans('main_trans.number') . " " . trans('main_trans.students')}} </p>
                                    <h4>{{$CountStudent->count()}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('yourStudents')}}" target="_blank"><span class="text-danger">{{ trans('main_trans.view_data') }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
             
                <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="clearfix">
                                <div class="float-left">
                                    <span class="text-primary">
                                        <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                                    </span>
                                </div>
                                <div class="float-right text-right">
                                    <p class="card-text text-dark"> {{trans('main_trans.number') . " " . trans('main_trans.sections')}} </p>
                                    <h4>{{$CountSection}}</h4>
                                </div>
                            </div>
                            <p class="text-muted pt-3 mb-0 mt-2 border-top">
                                <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('yourSection')}}" target="_blank"><span class="text-danger">{{ trans('main_trans.view_data') }}</span></a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Orders Status widgets-->
          
            <div class="row">
                
                <div class="col-xl-12 mb-30">
                    <div class="card card-statistics h-100">
                        <div class="card-body">
                            <div class="tab nav-border" style="position: relative;">
                                <div class="d-block d-md-flex justify-content-between">
                                    <div class="d-block w-100">
                                        <h5 class="card-title">{{trans('main_trans.others_processes')}}</h5>
                                    </div>

                                    <div class="d-block d-md-flex nav-tabs-custom">
                                        <ul class="nav nav-tabs" id="myTab" role="tablist">

                                            <li class="nav-item">
                                                <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                                    href="#students" role="tab" aria-controls="students"
                                                    aria-selected="true"> {{trans('main_trans.students')}}</a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                                    role="tab" aria-controls="teachers" aria-selected="false">{{trans('main_trans.teachers')}}
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                                   role="tab" aria-controls="parents" aria-selected="false">{{trans('main_trans.parents')}} 
                                                </a>
                                            </li>

                                            <li class="nav-item">
                                                <a class="nav-link" id="fees_invoices-tab" data-toggle="tab"
                                                    href="#fees_invoices" role="tab" aria-controls="fees_invoices"
                                                    aria-selected="true"> {{trans('main_trans.fees_invoices')}}</a>
                                            </li>

                                            

                                        </ul>
                                    </div>

                                </div>
                                <div class="tab-content" id="myTabContent">
                                    {{-- Start Students --}}
                                    <div class="tab-pane fade active show" id="students" role="tabpanel"
                                        aria-labelledby="students-tab">
                                        <div class="table-responsive">
                                            <table id="datatable" style="text-align: center" class="table center-aligned-table table-hover mb-0"
                                                    data-page-length="50"
                                                    style="text-align: center">
                                                <thead>
                                                    <tr  class="table-info text-danger">
                                                    <th>#</th>
                                                    <th>{{trans('students_trans.name_student')}}</th>
                                                    <th>{{trans('students_trans.gender')}}</th>
                                                    <th>{{trans('students_trans.grade')}}</th>
                                                    <th>{{trans('students_trans.classrooms')}}</th>
                                                    <th>{{trans('students_trans.section')}}</th>
                                                    <th>{{trans('students_trans.academic_year')}}</th>
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @forelse (App\Models\Student::latest()->take(5)->get() as$i=>$student )
                                                  <tr>
                                                    
                                                    <td>{{ $i+1 }}</td>
                                                    <td>{{$student->name}}</td>
                                                    <td>{{$student->gender->name}}</td>
                                                    <td>{{$student->grade->name}}</td>
                                                    <td>{{$student->classroom->name}}</td>
                                                    <td>{{$student->section->name}}</td>
                                                    <td>{{$student->academic_year}}</td>

                                                    @empty
                                                    <td class="alert-danger" colspan="8">{{ trans('main_trans.not_found_data') }}</td>
                                                  </tr>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    {{-- End Students --}}

                                    {{-- Start Teachers --}}
                                    <div class="tab-pane fade  show" id="teachers" role="tabpanel"
                                        aria-labelledby="teachers-tab">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                                    data-page-length="50"
                                                    style="text-align: center">
                                                <thead>
                                                    <tr  class="table-info text-warning">
                                                    <th>#</th>
                                                    <th>{{trans('teachers_trans.name_teacher')}}</th>
                                                    <th>{{trans('teachers_trans.gender')}}</th>
                                                    <th>{{trans('teachers_trans.joining_Date')}}</th>
                                                    <th>{{trans('teachers_trans.specialization')}}</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @forelse (App\Models\Teacher::latest()->take(5)->get() as$i=>$teacher )
                                                  <tr>
                                                    
                                                    <td>{{ $i+1 }}</td>
                                                    <td>{{$teacher->name}}</td>
                                                    <td>{{$teacher->genders->name}}</td>
                                                    <td>{{$teacher->joining_Date}}</td>
                                                    <td>{{$teacher->specializations->name}}</td>

                                                    @empty
                                                    <td class="alert-danger" colspan="8">{{ trans('main_trans.not_found_data') }}</td>
                                                  </tr>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    {{-- End Teachers --}}
                                    {{-- Start Parents --}}

                                    <div class="tab-pane fade  show" id="parents" role="tabpanel"
                                        aria-labelledby="parents-tab">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                                    data-page-length="50"
                                                    style="text-align: center">
                                                <thead>
                                                    <tr  class="table-info text-primary">
                                                    <th>#</th>
                                                    <th>{{ trans('parent_trans.email') }}</th>
                                                    <th>{{ trans('parent_trans.name_Father') }}</th>
                                                    <th>{{ trans('parent_trans.national_ID_Father') }}</th>
                                                    <th>{{ trans('parent_trans.passport_ID_Father') }}</th>
                                                    <th>{{ trans('parent_trans.phone_Father') }}</th>
                                                    <th>{{ trans('parent_trans.job_Father') }}</th>
                                                    
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @forelse (App\Models\MyParent::latest()->take(5)->get() as$i=>$parent )
                                                  <tr>
                                                    
                                                    <td>{{ $i+1 }}</td>
                                                    <td>{{ $parent->email }}</td>
                                                    <td>{{ $parent->name_Father }}</td>
                                                    <td>{{ $parent->national_ID_Father }}</td>
                                                    <td>{{ $parent->passport_ID_Father }}</td>
                                                    <td>{{ $parent->phone_Father }}</td>
                                                    <td>{{ $parent->job_Father }}</td>

                                                    @empty
                                                    <td class="alert-danger" colspan="8">{{ trans('main_trans.not_found_data') }}</td>
                                                  </tr>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    {{-- End Parents --}}
                                    {{-- Start FeesInvoices --}}
                                    <div class="tab-pane fade  show" id="fees_invoices" role="tabpanel"
                                        aria-labelledby="fees_invoices-tab">
                                        <div class="table-responsive">
                                            <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                                    data-page-length="50"
                                                    style="text-align: center">
                                                <thead>
                                                    <tr  class="table-info text-success">
                                                    <th>#</th>
                                                    <th>{{ trans('fees_trans.title') }}</th>
                                                    <th>{{ trans('fees_trans.fees_type') }}</th>
                                                    <th>{{ trans('fees_trans.amount') }}</th>
                                                    <th>{{ trans('fees_trans.grade') }}</th>
                                                    <th>{{ trans('fees_trans.classrooms') }}</th>
                                                    <th>{{ trans('fees_trans.statment') }}</th>
                                                   
                                                    
                                                </tr>
                                                </thead>
                                                <tbody>
                                                
                                                @forelse (App\Models\feeInvoices::latest()->take(5)->get() as$i=>$Fee_invoice )
                                                  <tr>
                                                    
                                                    <td>{{ $i+1 }}</td>
                                                    <td>{{$Fee_invoice->student->name}}</td>
                                                    <td>{{$Fee_invoice->fee->title}}</td>
                                                    <td>{{ number_format($Fee_invoice->amount, 2) }}</td>
                                                    <td>{{$Fee_invoice->grade->name}}</td>
                                                    <td>{{$Fee_invoice->classroom->name}}</td>
                                                    <td>{{$Fee_invoice->description}}</td>

                                                    @empty
                                                    <td class="alert-danger" colspan="8">{{ trans('main_trans.not_found_data') }}</td>
                                                  </tr>
                                                @endforelse
                                            </table>
                                        </div>
                                    </div>
                                    {{-- End FeesInvoices --}}

                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <livewire:calendar/>
            
            <!--wrapper -->


            @include('layouts.footer')
        </div><!-- main content wrapper end-->
    </div>
    </div>
    </div>

    <!--
 footer -->

    @include('layouts.footer-scripts')
    @livewireScripts
    @stack('scripts')
</body>

</html>
