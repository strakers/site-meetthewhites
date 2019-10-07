@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-user fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $inviteGuests->count() }}</div>
                            <div>Total Invited</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/rsvps') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-green">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-smile-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $responded->where('is_attending',1)->count() }}</div>
                            <div> Total Attending</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/rsvps') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-red">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-frown-o fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $responded->where('is_attending',0)->count() }}</div>
                            <div>Total Not Coming</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/rsvps') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-yellow">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">{{ $responded->count() }}</div>
                            <div>Total Responded</div>
                        </div>
                    </div>
                </div>
                <a href="{{ url('/admin/rsvps') }}">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-info fa-fw"></i> Welcome
                </div>
                <div class="panel-body">
                    <div class="">
                        <p>Hello, {{ Auth::user()->name }}, and welcome to the Administrative Dashboard.
                            From here, you can manage your invite list, review all submitted RSVPs, and
                            create addition fields in order to gather more info about your guests.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-info fa-fw"></i> More
                </div>
                <div class="panel-body">
                    <div class="">
                        <p>If you need any assistance at all, please contact your site-master.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection