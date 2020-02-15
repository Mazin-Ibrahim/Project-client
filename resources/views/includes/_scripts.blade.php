
        <!-- BEGIN CORE PLUGINS -->
        <script src="{{asset('js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/bootstrap/js/bootstrap.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/js.cookie.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('jquery-slimscroll/jquery.slimscroll.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/jquery.blockui.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('bootstrap-switch/js/bootstrap-switch.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/toastr.js')}}" type="text/javascript"></script>
        <script src="{{asset('/js/toastr.build.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/vue.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/notify.js')}}"></script>
        
        <!-- END CORE PLUGINS -->
        @yield('scripts')
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="{{asset('js/scripts/app.min.js')}}" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        {{-- <script src="{{asset('js/scripts/layout.min.js')}}" type="text/javascript"></script> --}}
        <script src="{{asset('js/scripts/demo.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('js/quick-sidebar.min.js')}}" type="text/javascript"></script>
        
        <!-- END THEME LAYOUT SCRIPTS -->
        <script src="{{asset('js/app.js')}}"></script>
        
        @yield('vue')