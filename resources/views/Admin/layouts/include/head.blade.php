<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>News_69 - @yield('main_title')</title>


    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/minified/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/minified/core.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/minified/components.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/minified/colors.min.css')}}" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->


    <!-- Core JS files -->
    <script type="text/javascript" src="{{asset('assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/plugins/loaders/blockui.min.js')}}"></script>

    <!-- /core JS files -->


    <!-- Theme JS files -->
    @yield('dashboardjs')

    @yield('datatablejs')

    @yield('selectjs')

</head>