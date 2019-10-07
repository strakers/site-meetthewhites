@extends('admin.dashboard')

@section('viewpanel')
    <div class="description" aria-label="description">
        <p>Here you can add additional fields for your guests to fill in when RSVPing. Some people use this to gather information on dietary restrictions, alcohol preferences, or other general information from your guests. Please note that you'll want to set these up before the RSVPs come rolling in.</p>
    </div>

    @if( $metadata )

        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Field Name</th>
                    <th class="text-right"><a href="{{ url('/admin/meta/new') }}" class="btn btn-primary"><i class="fa fa-plus" aria-label="Add New" title="Add New"></i> Add</a></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Name <em class="text-info">(required)</em></td>
                    <td class="text-right">
                        <button type="button" class="btn btn-error disabled"><i class="fa fa-edit" aria-label="Edit" title="Edit"></i></button>
                        <button type="button" class="btn btn-error disabled"><i class="fa fa-remove" aria-label="Remove" title="Remove"></i></button>
                    </td>
                </tr>
                <tr>
                    <td>Is Attending? <em class="text-info">(required)</em></td>
                    <td class="text-right">
                        <button type="button" class="btn btn-error disabled"><i class="fa fa-edit" aria-label="Edit" title="Edit"></i></button>
                        <button type="button" class="btn btn-error disabled"><i class="fa fa-remove" aria-label="Remove" title="Remove"></i></button>
                    </td>
                </tr>
                @foreach( $metadata as $meta )
                    <tr>
                        <td class="{{ $meta->deleted_at ? 'text-danger deleted' : '' }}">{{ $meta->name }}</td>
                        <td class="text-right">

                            @if( !$meta->deleted_at )
                                <a href="{{ url('/admin/meta/edit/' . $meta->id) }}" class="btn btn-success"><i class="fa fa-edit" aria-label="Edit" title="Edit"></i></a>
                                <a href="{{ url('/admin/meta/remove/' . $meta->id) }}" class="btn btn-danger delete-btn"><i class="fa fa-remove" aria-label="Remove" title="Remove"></i></a>
                            @else
                                <a href="{{ url('/admin/meta/restore/' . $meta->id) }}" class="btn btn-info"><i class="fa fa-refresh" aria-label="Restore" title="Restore"></i></a>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection