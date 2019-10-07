@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{ $metadata ? 'Edit' : 'Add' }} Meta Field</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-wrench fa-fw"></i> Add/Edit
                </div>
                <div class="panel-body">
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
                            <label>Field Name</label>
                            <div class="">
                                <input type="text" name="name" class="form-control" value="{{ $metadata ? $metadata->name : '' }}" />
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Field Type</label>
                            <div class="">
                                <select name="type" class="form-control">
                                    @foreach($metaTypes as $metaType)
                                    <option {{ $metadata && $metadata->fieldType->name == $metaType->name ? 'selected' : '' }} value="{{ $metaType->id }}">{{ $metaType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Options</label>
                            <p><em>Place each option on its own line</em></p>
                            <div class="">
                                <textarea name="options" rows="7" class="form-control">{{ $metadata && $metadata->options ? (is_array($metadata->options) ? implode("\n",$metadata->options) : $metadata->options) : '' }}</textarea>
                            </div>
                        </div>

                        @if( $metadata )
                            <button class="btn btn-primary" type="submit">Update</button>
                        @else
                            <button class="btn btn-primary" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Clear</button>
                        @endif

                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <i class="fa fa-info fa-fw"></i> Description
                </div>
                <div class="panel-body">

                    <div class="description" aria-label="description">
                        <p>Here you can add additional fields for your guests to fill in when RSVPing. Some people use this to gather information on dietary restrictions, alcohol preferences, or other general information from your guests. Please note that you'll want to set these up before the RSVPs come rolling in.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
@endsection