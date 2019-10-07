@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $invite ? 'Edit' : 'Add' }} Invite</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <form method="post" action="{{ url('/admin/invites') }}">
            <div class="col-lg-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-calendar-plus-o fa-fw"></i> Add/Edit
                    </div>
                    <div class="panel-body">

                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        @if( $invite )
                            <input type="hidden" name="id" value="{{ $invite->id }}" />
                        @endif

                        <div class="form-group">
                            <label class="required">Guest Name</label>
                            <div class="">
                                <input type="text" name="name" class="form-control" value="{{ $invite ? $invite->name : '' }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Invite Group</label>
                            <div class="">
                                <select name="group" class="form-control">
                                    @foreach($groups as $group)
                                        <option {{ $invite && $invite->group && $invite->group->name == $group->name ? 'selected' : '' }} value="{{ $group->id }}">{{ $group->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        @if( $invite )
                        <div class="form-group">
                            <label>Login Code</label>
                            <div class="">
                                <div name="code" class="form-control disabled" disabled>{{ $invite->code }}</div>
                            </div>
                        </div>
                        @endif

                        <div class="form-group">
                            <label>Address 1</label>
                            <div class="">
                                <input type="text" name="address1" class="form-control" value="{{ $invite ? $invite->address1 : '' }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Address 2</label>
                            <div class="">
                                <input type="text" name="address2" class="form-control" value="{{ $invite ? $invite->address2 : '' }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <div class="">
                                <input type="text" name="email" class="form-control" value="{{ $invite ? $invite->email : '' }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <i class="fa fa-users fa-fw"></i> Individual Guests
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        <div class="form-group guest_names">
                            <label>Guest Names</label>
                            <ul class="list-group ">
                                @if($invite && $invite->guests)
                                    @foreach($invite->guests as $inviteGuest)
                                        <li class=" list-group-item">
                                            <div class="input-group">
                                                <input type="text" name="guests[existing][{{ $inviteGuest->id }}]" data-id="{{ $inviteGuest->id }}" class="form-control" value="{{ $inviteGuest->name }}" />
                                                <div class="input-group-btn">
                                                    <button class="btn btn-default guestname_remove delete-confirm" data-toggle="confirmation" type="button"><i class="fa fa-user-times fa-fw text-danger" title="Remove Guest"></i> </button>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                @endif
                                <li class="list-group-item cloner">
                                    <div class="input-group">
                                        <input type="text" name="guest_template" data-name="guests[new][]" data-id="" class="form-control text-info" value="" />
                                        <div class="input-group-btn">
                                            <button id="guestname_add" class="btn btn-success" type="button"><i class="fa fa-user-plus fa-fw" title="Add Guest"></i> Add</button>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>

            <div class="col-xs-12">
                <div class="panel panel-default">
                    <!-- /.panel-heading -->
                    <div class="panel-body">

                        @if( $invite )
                            <button class="btn btn-primary" type="submit">Update</button>
                        @else
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Clear</button>
                        @endif
                    </div>
                    <!-- /.panel-body -->
                </div>
            </div>
        </form>


    </div>
    <!-- /.row -->
@endsection

@section('scripts')
    <script type="text/javascript">
        (function($){

            $('#guestname_add').on('click',function(e){
                var $template = $('input[name=guest_template]'),
                    val = $template.val(),
                    delete_btn = '<div class="input-group-btn"><button class="btn btn-default guestname_remove delete-confirm" data-toggle="confirmation" type="button"><i class="fa fa-user-times fa-fw text-danger" title="Remove Guest"></i> </button></div>',
                    field = '<li class=" list-group-item"><div class="input-group"><input type="text" name="guests[new][]" data-id="" class="form-control" value="' + val + '" />' + delete_btn + '</div></li>',
                    cloner = $(this).parents('.cloner');
                if( val ) {
                    cloner.before(field);
                    $template.val('');
                }
            });
            $('.guest_names').confirmDelete('click',function(e) {
                var $parent = $(this).parents('.list-group-item');
                $parent.remove();
            },{ message: 'Delete this guest?' });
        })(jQuery);
    </script>
@endsection