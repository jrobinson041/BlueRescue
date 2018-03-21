@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Emergency Dispatch Call</h1>
            </div>

            <div class="panel-body">
                <div class="street-view">
                    <img src="https://maps.googleapis.com/maps/api/streetview?size=700x300&location={{$lat}},{{$lng}}&fov=90&key=AIzaSyBs_ZcZOLSIUTmHjuq4DA6H-CeFtXIXlZQ"/>
                </div>
                <div id="map"></div>
                <script>
                    function initMap() {
                        var uluru = {lat: {{ $lat }}, lng: {{ $lng }} };
                        var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 15,
                        center: uluru
                        });
                        var marker = new google.maps.Marker({
                        position: uluru,
                        map: map
                        });
                    }
                </script>
                <script async defer
                src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBs_ZcZOLSIUTmHjuq4DA6H-CeFtXIXlZQ&callback=initMap">
                </script>
                <p>{{ $description }}</p>
                <p>{{ $address }}</p>
                <p>{{ $timestamp }}</p>
                <div style="margin: auto; text-align: center;">
                    <div class="inline">
                    <a class="btn btn-primary" href="{{ url('dispatch') }}">
                        <i class="fa fa-btn fa-chevron-left"></i>Back to List
                    </a>
                    </div>
                    <div class="inline">
                        <form action="{{ url('dispatch/'.$id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </div>
                    <div class="inline">
                    <a class="btn btn-success" target="_blank" href="https://www.google.com/maps/dir//<?php echo str_replace(" ","+", "{{$address}}") ?>">
                        <i class="fa fa-btn fa-location-arrow"></i>Navigate
                    </a>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Blueprints</h1>
            </div>
            @if (count($blueprints) > 0)
                @foreach ($blueprints as $blueprint)
                <div class="panel-body">
                    <p><img class="blueprint-img" src="{{ $blueprint->file_ref }}" /></p>
                </div>
                @endforeach
            @else
                <div class="panel-body warning">
                    <p><b>No blueprints found for this location</b></p>
                </div>
            @endif
        </div>        
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Location Notes</h1>
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                @include('common.errors')

                <!--Show Notes -->
                @if (count($notes)>0)
                    <table class="table table-striped task-table">
                        <thead>
                            <th></th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($notes as $note)
                                <tr>
                                    <td class="table-text"><div>{{ $note->note }}</div></td>                                 

                                    <!-- Task Delete Button -->
                                    <td style="width:100px;">
                                        <form action="{{ url('dispatch/notes/'.$id.'/'.$note->id) }}" method="POST">
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
                @endif

                <!-- New Note Form -->
                <form action="{{ url('/dispatch/notes') }}" method="POST" class="form-horizontal">
                    {{ csrf_field() }}

                    <!-- Add New Note -->
                    <div class="form-group">
                        <label for="note" class="col-sm-3 control-label hidden">Location Notes</label>
                                
                        <div class="col-sm-offset-1 col-sm-10 field">
                            <!-- Need to make this text area width dynamic -->
                            <textarea class="form-control" name="note" id="note" cols="40" rows="10" placeholder="Enter any notes about the location here. Max 255 characters. You may add multiple notes for the same address."></textarea>
                        </div>
                    </div>

                    <!-- Add Address and Job ID to post - must be a better way to do this than a hidden form element with the address filled in-->
                    <div class="form-group" style="display:none;">
                        <input type="text" name="address" id="address" class="form-control" value="{{ $address }}">
                    </div>
                    <div class="form-group" style="display:none;">
                        <input type="text" name="id" id="id" class="form-control" value="{{ $id }}">
                    </div>

                    <!-- Add Note Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <i class="fa fa-btn fa-plus"></i>Add Notes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection