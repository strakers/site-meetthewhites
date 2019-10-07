@extends('admin.dashboard')

@section('viewpanel')
    <div class="description" aria-label="description">
        <p>Here you can view a list of all the guests who have RSVPed thus far.</p>
    </div>

    @if( $rsvps )
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Invite Group</th>
                    <th>Guest Name</th>
                    <th>Is Attending</th>

                    @if( $metadata )
                        @foreach( $metadata as $meta )
                            <th>{{ $meta->name }}</th>
                        @endforeach
                    @endif

                    <th></th>
                </tr>
                </thead>
                <tbody>

                @php
                    $i = 0;
                @endphp

                @foreach( $rsvps as $rsvp )
                    <tr>
                        <td>{{ $rsvp->id }}</td>
                        <td>{{ $rsvp->invite->name }}</td>
                        <td>{{ $rsvp->name }}</td>
                        <td class="{{ $rsvp->is_attending ? 'text-success' : 'text-danger' }}">{{ $rsvp->is_attending ? 'Yes' : 'No' }}</td>

                        @if( $metadata )
                            @foreach( $metadata as $meta )
                                @php
                                    $field = $rsvp->fields()->where(['metafield_id'=>$meta->id])->first();
                                @endphp
                                <td>{{ $field->meta_value or ''  }}</td>
                            @endforeach
                        @endif

                        @if( $rsvp->fields() )
                            @foreach( $rsvp->fields()->orderBy('invite_guest_id', 'desc') as $meta )
                                <td>{{ $meta->meta_value }}</td>
                            @endforeach
                        @endif

                        <td><a href="{{ url('/admin/rsvps/edit/' . $rsvp->id) }}" class="btn btn-default">Edit</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif

@endsection