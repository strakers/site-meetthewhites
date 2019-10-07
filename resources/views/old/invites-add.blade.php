@extends('admin.dashboard')

@section('viewpanel')
    <form method="post" action="{{ url('/admin/invites') }}">

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
            <label>Name</label>
            <div class="">
                <input type="text" name="name" class="form-control" value="{{ $invite ? $invite->name : '' }}" />
            </div>
        </div>
        <div class="form-group">
            <label>Address</label>
            <div class="">
                <input type="text" name="address" class="form-control" value="{{ $invite ? $invite->address : '' }}" />
            </div>
        </div>
        <div class="form-group">
            <label>Email</label>
            <div class="">
                <input type="email" name="email" class="form-control" value="{{ $invite ? $invite->email : '' }}" />
            </div>
        </div>
        <div class="form-group">
            <label>Total Number Invited (including guests)</label>
            <div class="">
                <input type="number" name="total_invited" class="form-control" value="{{ $invite ? $invite->total_invited : 1 }}" />
            </div>
        </div>

        @if( $invite )
            <button class="btn btn-primary" type="submit">Update</button>
        @else
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-secondary" type="reset">Clear</button>
        @endif
    </form>
@endsection