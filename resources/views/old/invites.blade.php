@extends('admin.dashboard')

@section('viewpanel')
    <div class="description" aria-label="description">
        <p>Here you can manage the invite reservations for your guests. For bulk imports of invitations, please contact your site-master.</p>
    </div>

    @if( $invites )
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Name(s)</th>
                    <th>Address</th>
                    <th>Email</th>
                    <th># Invited</th>
                    <th><a href="{{ url('/admin/invites/new') }}" class="btn btn-primary"><i class="fa fa-plus" aria-label="Add New" title="Add New"></i> Add</a></th>
                </tr>
                </thead>
                <tbody>
                @foreach( $invites as $invite )
                    <tr>
                        <td>{{ $invite->name }}</td>
                        <td>{{ $invite->address1 }}</td>
                        <td>{{ $invite->email }}</td>
                        <td>{{ $invite->total_invited }}</td>
                        <td>
                            <a href="{{ url('/admin/invites/edit/' . $invite->id) }}" class="btn btn-success"><i class="fa fa-edit" aria-label="Edit" title=""></i></a>
                            <a href="{{ url('/admin/invites/edit/remove/' . $invite->id) }}" class="btn btn-danger delete-btn"><i class="fa fa-remove" aria-label="Remove" title="Remove"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection