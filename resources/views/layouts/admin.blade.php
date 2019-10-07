<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Meet The Whites - Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">


    <!-- Custom Fonts -->
    <link Xhref="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <style type="text/css">
        .table>tbody>tr>th,
        .table>tbody>tr>td{
            vertical-align: middle;
        }
        @media (max-width: 767px) {
            ul.timeline > li > .timeline-panel {
                width: calc(85%);
                width: -moz-calc(85%);
                width: -webkit-calc(85%);
            }
        }
        @media (max-width: 528px) {
            ul.timeline > li > .timeline-panel {
                width: calc(75%);
                width: -moz-calc(75%);
                width: -webkit-calc(75%);
            }
        }
    </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
</head>

<body>

<div id="wrapper">

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/admin') }}">Admin Panel</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-envelope fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-messages">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                    {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                    {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<strong>John Smith</strong>--}}
                                    {{--<span class="pull-right text-muted">--}}
                                        {{--<em>Yesterday</em>--}}
                                    {{--</span>--}}
                            {{--</div>--}}
                            {{--<div>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque eleifend...</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a class="text-center" href="#">--}}
                            {{--<strong>Read All Messages</strong>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-messages -->--}}
            {{--</li>--}}
            {{--<!-- /.dropdown -->--}}
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-tasks fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-tasks">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<p>--}}
                                    {{--<strong>Task 1</strong>--}}
                                    {{--<span class="pull-right text-muted">40% Complete</span>--}}
                                {{--</p>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">--}}
                                        {{--<span class="sr-only">40% Complete (success)</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<p>--}}
                                    {{--<strong>Task 2</strong>--}}
                                    {{--<span class="pull-right text-muted">20% Complete</span>--}}
                                {{--</p>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar progress-bar-info" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: 20%">--}}
                                        {{--<span class="sr-only">20% Complete</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<p>--}}
                                    {{--<strong>Task 3</strong>--}}
                                    {{--<span class="pull-right text-muted">60% Complete</span>--}}
                                {{--</p>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%">--}}
                                        {{--<span class="sr-only">60% Complete (warning)</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<p>--}}
                                    {{--<strong>Task 4</strong>--}}
                                    {{--<span class="pull-right text-muted">80% Complete</span>--}}
                                {{--</p>--}}
                                {{--<div class="progress progress-striped active">--}}
                                    {{--<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%">--}}
                                        {{--<span class="sr-only">80% Complete (danger)</span>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a class="text-center" href="#">--}}
                            {{--<strong>See All Tasks</strong>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-tasks -->--}}
            {{--</li>--}}
            {{--<!-- /.dropdown -->--}}
            {{--<li class="dropdown">--}}
                {{--<a class="dropdown-toggle" data-toggle="dropdown" href="#">--}}
                    {{--<i class="fa fa-bell fa-fw"></i> <i class="fa fa-caret-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu dropdown-alerts">--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-comment fa-fw"></i> New Comment--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-twitter fa-fw"></i> 3 New Followers--}}
                                {{--<span class="pull-right text-muted small">12 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-envelope fa-fw"></i> Message Sent--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-tasks fa-fw"></i> New Task--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a href="#">--}}
                            {{--<div>--}}
                                {{--<i class="fa fa-upload fa-fw"></i> Server Rebooted--}}
                                {{--<span class="pull-right text-muted small">4 minutes ago</span>--}}
                            {{--</div>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    {{--<li>--}}
                        {{--<a class="text-center" href="#">--}}
                            {{--<strong>See All Alerts</strong>--}}
                            {{--<i class="fa fa-angle-right"></i>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                {{--</ul>--}}
                {{--<!-- /.dropdown-alerts -->--}}
            {{--</li>--}}
            <!-- /.dropdown -->
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    {{--<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>--}}
                    {{--</li>--}}
                    {{--<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>--}}
                    {{--</li>--}}
                    {{--<li class="divider"></li>--}}
                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
        <!-- /.navbar-top-links -->

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <!-- /input-group -->
                    </li>
                    <li>
                        <a href="{{ url('/admin') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-calendar-plus-o fa-fw"></i> Invites<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/invites') }}">View All</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/invites/new') }}">Add New</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="{{ url('/admin/rsvps') }}"><i class="fa fa-users fa-fw"></i> Guest Responses</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/outstanding') }}"><i class="fa fa-question-circle fa-fw"></i> Not Responded</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa fa-cubes fa-fw"></i> Meta Fields<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="{{ url('/admin/meta') }}">View All</a>
                            </li>
                            <li>
                                <a href="{{ url('/admin/meta/new') }}">Add New</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/admin/pages') }}"><i class="fa fa-files-o fa-fw"></i> Page Content</a>
                    </li>
                    <li>
                        <a href="{{ url('/admin/songs') }}"><i class="fa fa-music fa-fw"></i> Song Requests</a>
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>

    <div id="page-wrapper">

        @yield('content')
        <!-- /.row -->
    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/admin.js') }}"></script>
<script>
    (function($){
        $.fn.confirmDelete = function(action,fn,options){
            var defaults = {
                'message' : "Are you sure?",
                'undoFn' : function(){}
            };
            options = $.extend( defaults, options );

            $(this).delegate('.delete-confirm',action,function(event){
                var context = this;
                swal({
                    title: options.message,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then(function(){
                    fn.apply(context,[event]);
                    swal(
                        'Deleted!',
                        'Deletion was successful.',
                        'success'
                    )
                }, function (dismiss) {
                    // dismiss can be 'cancel', 'overlay',
                    // 'close', and 'timer'
                    if (dismiss === 'cancel') {
                        event.preventDefault();
                        event.stopPropagation();
                        if( options.undoFn && typeof options.undoFn == 'function' ){
                            options.undoFn.apply(context,[event]);
                        }
                        swal(
                                'Cancelled',
                                'Deletion was cancelled',
                                'error'
                        )
                    }
                })
            });
        };

        $('#page-wrapper').delegate('.custom-search-form input[type=text]','keyup',function(e){
            var input = this,
                filter = input.value.toUpperCase(),
                table = $(input).parents('.custom-search-form').siblings('.table-responsive').find('table'),
                tr = table.find('tbody tr')
                ;

            tr.each(function(i,o){
                var el = $(o), match = 0;
                el.find('td').each(function(j,td){
                    if( td.innerText.toUpperCase().indexOf(filter) > -1 ){
                        match++;
                    }
                });
                if( match === 0 ){
                    el.css('display',"none");
                } else {
                    el.css('display',"");
                }
            });
        });
    })(jQuery);
</script>

<!-- Metis Menu Plugin JavaScript -->
<script Xsrc="../vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script Xsrc="../vendor/raphael/raphael.min.js"></script>
<script Xsrc="../vendor/morrisjs/morris.min.js"></script>
<script Xsrc="../data/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script Xsrc="../dist/js/sb-admin-2.js"></script>

@yield('scripts')

</body>

</html>
