@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Settings Account</div>
                    <div class="panel-body">
                        <form class="form-vertical" role="form" method="POST" action="{{ url('/settings') }}">
                            {!! csrf_field() !!}

                            <div class="form-group{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">FirstName</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstname"
                                           value="{{ old('firstname') }}">

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label class="col-md-4 control-label">LastName</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastname"
                                           value="{{ old('lastname') }}">

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Options</label>

                                <div class="col-md-2">
                                    <label class="col-md-4 control-label">Activate voices</label>
                                    <input type="checkbox" class="form-control" name="isActivateVoice">
                                           <!--value="{{ Auth::user()->isActivateVoice }}"-->
                                </div>
                                <div class="col-md-2">
                                    <label class="col-md-4 control-label">Activate Color</label>
                                    <input type="checkbox" class="form-control" name="isActivateVoice">
                                          <!--value="{{ Auth::user()->isActivateColor }}"-->
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-btn fa-user"></i>Save
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection