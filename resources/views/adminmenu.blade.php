@extends('layouts.app')

@section('content')
<div class="title">
    <h1>Admin Menu</h1>
    <p><b>Upload scanned blueprints and edit blueprint metadata here.</b></p>
</div>

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>New Blueprint</h1>
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                <form action="{{ url('/admin')}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }}

                    <!-- Task Location -->
                    <div class="form-group">
                        <label for="file-upload" class="col-sm-3 control-label">File Upload</label>

                        <div class="col-sm-6">
                            <input type="file" name="file_upload" id="file-upload"></input>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bp-address" class="col-sm-3 control-label">Address</label>

                        <div class="col-sm-6">
                            <input type="text" name="address" id="bp-address" class="form-control" value="">
                        </div>
                    </div>

                    <!-- Add Blueprint Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Blueprint
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Show Current Blueprints -->
        @if (count($blueprints) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Uploaded Blueprints</h1>
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Address</th>
                            <th>File Location</th>
                            <th></th>
                            <th></th> 
                        </thead>
                        <tbody>
                            @foreach ($blueprints as $blueprint)
                                <tr>
                                    <td class="table-text"><div>{{ $blueprint->address }}</div></td>
                                    <td class="table-text"><div class="file-ref wrap">{{ $blueprint->file_ref }}</div></td> 

                                    <!-- View Blueprint Button -->
                                    <td>
                                        <form action="{{ url('admin/'.$blueprint->id) }}" method="POST">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-primary">
                                                <i class="fa fa-btn fa-eye"></i>View
                                            </button>
                                        </form>
                                    </td>                                   

                                    <!-- Task Delete Button -->
                                    <td>
                                        <form action="{{ url('admin/'.$blueprint->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
@endsection