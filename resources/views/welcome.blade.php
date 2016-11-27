@extends('layouts.master')
@section('title')
Welcome to TLD-BLD Event Registration Database!
@endsection
@section('content')
@include('includes.message-block')
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-6 col-sm-4"></div>
        <div class="col-xs-6 col-sm-4">
            <div>
                <h3><center><img class="img-rounded" src="{{ URL::to('img/tld-logo.png') }}" height="40%" width="40%"></center></h3>
            </div>
            <!-- Optional: clear the XS cols if their content doesn't match in height -->
            <div class="well well-sm">            
                <div class="panel panel-primary">
                    <div class="panel-heading"><h3>Login</h3></div>
                    <div class="panel-body">
                        <form action="{{ route('signin') }}" method="post">
                            <div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
                                <label for="username">Username:</label>
                                <input class="form-control" type="text" name="username" id="username" placeholder="Username" value="{{ Request::old('username') }}">
                            </div>
                            <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
                                <label for="password">Password:</label>
                                <input class="form-control" type="password" name="password" id="password" placeholder="Password" value="{{ Request::old('password') }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>        
        <div class="clearfix visible-xs-block"></div>
        <div class="col-xs-6 col-sm-4"></div>
    </div>
</div>   
@endsection