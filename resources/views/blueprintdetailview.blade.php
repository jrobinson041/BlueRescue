@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>Blueprint Entry</h1>
            </div>

            <div class="panel-body">
                <h2>{{ $address }}</h2>
                <p><img class="blueprint-img" src="{{ $file_ref }}" /></p>
                <p>Created at: {{ $created }}</p>
                <p>Updated at: {{ $updated }}</p>
                <div style="margin: auto; text-align: center;">
                    <div class="inline">
                    <a class="btn btn-primary" href="{{ url('admin') }}">
                        <i class="fa fa-btn fa-chevron-left"></i>Back to List
                    </a>
                    </div>
                    <div class="inline">
                        <form action="{{ url('admin/'.$id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection