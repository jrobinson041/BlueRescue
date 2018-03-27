@extends('layouts.app')

@section('content')
<div class="title">
    <h1>Dispatch Feed</h1>
    <p><b>View and select current emergency calls here.</b></p>
</div>

<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>New Emergency</h1>
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!-- New Task Form -->
                <form action="{{ url('/dispatch')}}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Task Location -->
                    <div class="form-group">
                        <label for="job-location" class="col-sm-3 control-label">Location of Emergency</label>

                        <div class="col-sm-6">
                            <input type="text" name="address" id="job-location" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="job-description" class="col-sm-3 control-label">Nature of Emergency</label>

                        <div class="col-sm-6">
                            <input type="text" name="description" id="job-description" class="form-control" value="{{ old('task') }}">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Job
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Current Jobs</h1>
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Description</th>
                            <th>Location</th>
                            <th></th>
                            <th></th>                            
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td class="table-text"><div>{{ $task->description }}</div></td>
                                    <td class="table-text"><div>{{ $task->address }}</div></td> 

                                    <!-- Task View Button -->
                                    <td>
                                    <div class="col" style="margin-bottom: 5px;">
                                        <form action="{{ url('dispatch/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}

                                            <button type="submit" class="btn btn-primary" style="width:100%;">
                                                <i class="fa fa-btn fa-chevron-right"></i>View
                                            </button>
                                        </form>
                                    </div>                                   

                                    <!-- Task Delete Button -->
                                    <div class="col">                                    
                                        <form action="{{ url('dispatch/'.$task->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                        </form>
                                    </div>
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