<div class="container-fluid">
    <div class="row">
        
       {{--  @if(auth('web')->check())

            @include('layouts.MainSidebar.admin-main-sidebar')

        @endif

        @if(auth('student')->check())

            @include('layouts.MainSidebar.student-main-sidebar')

        @endif

        @if(auth('teacher')->check())

            @include('layouts.MainSidebar.teacher-main-sidebar')

        @endif

        @if(auth('parent')->check())

            @include('layouts.MainSidebar.parent-main-sidebar')

        @endif --}}
      

        @switch(auth('web')->check())

            @case(auth('student')->check())
                @include('layouts.MainSidebar.student-main-sidebar')
                
            @break

            @case(auth('teacher')->check())

            @include('layouts.MainSidebar.teacher-main-sidebar')
                
            @break

            @case(auth('parent')->check())

            @include('layouts.MainSidebar.parent-main-sidebar')
                
            @break
        
            @default
            @include('layouts.MainSidebar.admin-main-sidebar')
                
        @endswitch
          
              
     
    </div>
</div>