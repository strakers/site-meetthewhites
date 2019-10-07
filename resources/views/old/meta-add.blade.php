@extends('admin.dashboard')

@section('viewpanel')
    <form method="post" action="{{ url('/admin/meta') }}">

        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        @if( $metadata )
            <input type="hidden" name="id" value="{{ $metadata->id }}" />
        @endif

        <div class="form-group">
            <label>Name</label>
            <div class="">
                <input type="text" name="name" class="form-control" value="{{ $metadata ? $metadata->name : '' }}" />
            </div>
        </div>

        @if( $metadata )
            <button class="btn btn-primary" type="submit">Update</button>
        @else
            <button class="btn btn-primary" type="submit">Submit</button>
            <button class="btn btn-secondary" type="reset">Clear</button>
        @endif
    </form>
@endsection