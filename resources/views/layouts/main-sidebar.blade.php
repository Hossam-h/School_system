<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">

        @if(auth('web')->check())

        @include('layouts.main-side-bar.admin-side-bar')

        @endif

        @if(auth('student')->check())

        @include('layouts.main-side-bar.student-side-bar')

        @endif

        @if(auth('teacher')->check())

        @include('layouts.main-side-bar.teacher-side-bar')

        @endif


        @if(auth('parent')->check())

@include('layouts.main-side-bar.parent-side-bar')
@endif

        </div>

        <!-- Left Sidebar End-->

        <!--=================================
