@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3 side-panel" id="side_menu">
                <div class="panel panel-default nav">
                    <div class="panel-heading">
                        <button class="btn-link side-menu-toggle-btn" type="button">
                            <i class="fa fa-caret-left fa-fw"></i>
                            <span class="side-menu-label"> &nbsp; Menu</span>
                        </button>
                    </div>
                    <ul class="list-group">
                        <li class="list-group-item">
                            <a href="{{ url('/admin') }}" title="Dashboard">
                                <i class="fa fa-dashboard fa-fw"></i>
                                <span class="side-menu-label"> &nbsp; Dashboard</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/admin/invites/new') }}" title="Add an Invite">
                                <i class="fa fa-envelope fa-fw"></i>
                                <span class="side-menu-label"> &nbsp; Add an Invite</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/admin/invites') }}" title="View All Invites">
                                <i class="fa fa-address-book fa-fw"></i>
                                <span class="side-menu-label"> &nbsp; View All Invites</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/admin/rsvps') }}" title="View Submitted RSVPs">
                                <i class="fa fa-calendar-plus-o fa-fw"></i>
                                <span class="side-menu-label"> &nbsp; View Submitted RSVPs</span>
                            </a>
                        </li>
                        <li class="list-group-item">
                            <a href="{{ url('/admin/meta') }}" title="Manage RSVP Fields">
                                <i class="fa fa-cubes fa-fw"></i>
                                <span class="side-menu-label"> &nbsp; Manage RSVP Fields</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-9" id="main_view">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ $section_title }}</div>
                    <div class="panel-body">
                        @section('viewpanel')
                            <div class="col-md-6">
                                <p>Hello, {{ Auth::user()->name }}, and welcome to the Administrative Dashboard.
                                    From here, you can manage your invite list, review all submitted RSVPs, and
                                    create addition fields in order to gather more info about your guests.</p>
                                <hr />
                                @php( $response_count = App\InviteGuest::where(['is_attending'=>1])->count() )
                                <blockquote>
                                    <div class="col-md-6">
                                        <strong class="label label-success">{{ $response_count }}</strong> Attending
                                    </div>
                                    <div class="col-md-6">
                                         <a href="{{ url('/admin/rsvps') }}">View All</a>
                                    </div>
                                    <br class="clearfix" />
                                </blockquote>
                            </div>
                            <div class="col-md-6">
                                <p>If you need any assistance at all, please contact your site-master.</p>
                            </div>
                        @show
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection