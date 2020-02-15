<!DOCTYPE html>
<html lang="{{App::getLocale()}}" dir="{{(App::isLocale('ar')) ? 'rtl' : 'ltr'}}">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <title>@lang('admin') | @yield('title')</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        
        <script>
            window.Laravel = {!! json_encode([
                'csrfToken' => csrf_token(),
            ]) !!};
        </script>
        @include('includes._styles')

    <body class="page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-md">
        <div id="app">
            <!-- BEGIN HEADER -->
            <div class="page-header navbar navbar-fixed-top">
                <!-- BEGIN HEADER INNER -->
                <div class="page-header-inner ">
                    <!-- BEGIN LOGO -->
                    <div class="page-logo">
                        <a href="#">
                           {{--  <img src="/img/logo-default.png" alt="logo" class="logo-default" /> </a> --}}
                        <div class="menu-toggler sidebar-toggler">
                            <!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
                        </div>
                    </div>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse"> </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- BEGIN PAGE ACTIONS -->
                    <!-- DOC: Remove "hide" class to enable the page header actions -->
                    
                    <!-- END PAGE ACTIONS -->
                    <!-- BEGIN PAGE TOP -->
                    <div class="page-top">
                        <!-- BEGIN HEADER SEARCH BOX -->
                        <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
                        <!-- END HEADER SEARCH BOX -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="top-menu">
                            <ul class="nav navbar-nav pull-right">
                                <!-- BEGIN NOTIFICATION DROPDOWN -->
                                <!-- DOC: Apply "dropdown-dark" class after below "dropdown-extended" to change the dropdown styte -->
                                <li class="dropdown dropdown-extended dropdown-notification" id="header_notification_bar">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        {{-- <i class="icon-envelope"></i> --}}
                                        {{-- <span class="badge badge-default"> 7 </span> --}}
                                    </a>
                                </li>
                               {{--  <li class="dropdown dropdown-user">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="/img/avatar3_small.jpg" />
                                        <span class="username username-hide-on-mobile">Admin </span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">
                                        <li>
                                            <a href="{{route('logout')}}">
                                                <i class="icon-power"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li> --}}
                                
                                <!-- END QUICK SIDEBAR TOGGLER -->
                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                    <!-- END PAGE TOP -->
                </div>
                <!-- END HEADER INNER -->
            </div>
            <!-- END HEADER -->
            <!-- BEGIN HEADER & CONTENT DIVIDER -->
            <div class="clearfix"> </div>
            <!-- END HEADER & CONTENT DIVIDER -->
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN SIDEBAR -->
                <div class="page-sidebar-wrapper">
                    <!-- END SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse" data-auto-scroll="false">

                        <ul class="page-sidebar-menu  page-header-fixed page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            
                           
                              

                        <li class="nav-item start ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-wrench"></i>
                                    <span class="title">الاعدادات</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                              
                             <li class="nav-item start active open">
                                <a href="{{route('devices.index')}}" class="nav-link ">
                                        <span class="title"> الاجهزه</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                            <li class="nav-item start active open">
                            <a href="{{route('tecnicals.index')}}" class="nav-link ">
                                    <span class="title"> الفنيين</span>
                                    <span class="selected"></span>
                                </a>
                            </li>

                            <li class="nav-item start active open">
                                <a href="{{route('areas.index')}}" class="nav-link ">
                                        <span class="title"> المناطق</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>

                                <li class="nav-item start active open">
                                    <a href="{{route('towns.index')}}" class="nav-link ">
                                            <span class="title"> الاحياء</span>
                                            <span class="selected"></span>
                                        </a>
                                    </li>

                            <li class="nav-item start active open">
                                <a href="{{route('maintenances.index')}}" class="nav-link ">
                                        <span class="title"> أنواع الصيانه</span>
                                        <span class="selected"></span>
                                    </a>
                                </li>
                                @if(auth()->user()->hasRole('admin')) 
                                <li class="nav-item start active open">
                                    <a href="{{route('users.index')}}" class="nav-link ">
                                            <span class="title">  أدارة المستخدمين </span>
                                            <span class="selected"></span>
                                        </a>
                                    </li>
                                @endif
                        </ul>
                            </li>

                            <li class="nav-item start ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-pencil-square "></i>
                                    <span class="title">بيانات العملاء</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                  
                                    <li class="nav-item start active open">
                                        <a href="{{route('clients.index')}}" class="nav-link ">
                                                <span class="title">عرض العملاء</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                            
                               </ul>
                            </li>

                            <li class="nav-item start ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="fa fa-users"></i>
                                    <span class="title">خدمات العملاء</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                              
                                    <li class="nav-item start active open">
                                        <a href="{{route('ClientMains.index')}}" class="nav-link ">
                                                <span class="title">عرض صيانة العملاء</span>
                                                <span class="selected"></span>
                                            </a>
                                    </li>

                                    <li class="nav-item start active open">
                                       <a href="{{route('notices.index')}}" class="nav-link ">
                                                <span class="title">بلاغات العملاء</span>
                                                <span class="selected"></span>
                                            </a>
                                        </li>
                            
                               </ul>
                            </li>


                            <li class="nav-item start ">
                                <a href="{{route('ControlReport')}}" class="nav-link nav-toggle">
                                        <i class="fa fa-cubes"></i>
                                        <span class="title">التقارير</span>
                                        <span class="arrow"></span>
                                    </a>
                                </li>

                                <li class="nav-item start ">
                                    <a href="{{route('control')}}" class="nav-link nav-toggle">
                                            <i class="fa fa-calculator"></i>
                                            <span class="title">أحصائيات</span>
                                            <span class="arrow"></span>
                                        </a>
                                 </li>

                                 <li class="nav-item start ">
                                    <a href="{{route('getLogout')}}" class="nav-link nav-toggle">
                                            <i class="fa fa-power-off"></i>
                                            <span class="title">تسجيل خروج</span>
                                            <span class="arrow"></span>
                                        </a>
                                    </li>
                    
                             
                
                    </ul>
                        
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <!-- END SIDEBAR -->
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <div class="page-content" style="min-height: 968px">
                        {{-- @if(Session::has('success'))
                          <div class="alert alert-success">
                            {{Session::get('success')}}
                          </div>
                          {{Session::forget('success')}}
                        @endif --}}
                      @yield('content')
                      
                    </div>
                    
                </div>
                <!-- END CONTENT -->
                
            </div>
            <!-- END CONTAINER -->
            <!-- BEGIN FOOTER -->
            <div class="page-footer">
                <div class="page-footer-inner"> 
                </div>
                <div class="scroll-to-top">
                    <i class="icon-arrow-up"></i>
                </div>
            </div> 
            
            <!-- END FOOTER -->
        </div>
        
        
    </body>
        @include('includes._scripts')
        
        

        <script>
              toastr.options = {
                "closeButton": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
              }

              
              @if(count($errors->all()))
                    @foreach($errors->all() as $error)
                       toastr.error('{{$error}}', {timeOut: 5000})
                    @endforeach 
              @endif

               @if(Session::has('error'))
                    toastr.error("{{Session::get('error')}}", {timeOut: 5000})
                  @elseif(Session::has('success'))
                    toastr.success("{{Session::get('success')}}", {timeOut: 5000})
                  @endif
        </script>
</html>