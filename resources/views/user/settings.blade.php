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

                            <div class="row{{ $errors->has('firstname') ? ' has-error' : '' }}">
                                <label class="col-md-3 text-right">FirstName</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="firstname" autofocus
                                           value="{{ Auth::user()->firstname }}">

                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('firstname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="row{{ $errors->has('lastname') ? ' has-error' : '' }}">
                                <label class="col-md-3 text-right">LastName</label>

                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="lastname"
                                           value="{{ Auth::user()->lastname }}">

                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('lastname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!--http://stackoverflow.com/questions/31757400/laravel-5-uploading-an-image-to-send-in-an-email-->
                            <div class="form-group" style="margin-top: 30px">
                                <label for="exampleInputFile">File input</label>
                                <input type="file" id="exampleInputFile">
                            </div>
                            <div class="form-group">
                                <label for="Description">Description</label>
                                @if(Auth::user()->description!=null)
                                    <textarea class="form-control" rows="3"
                                              name="description">{{Auth::user()->description}}</textarea>
                                @else
                                    <textarea class="form-control" rows="3" name="description"
                                              placeholder="Something interesting..."></textarea>
                                @endif
                            </div>

                            <div class="form-group">
                                <div class="col-md-10">
                                    <div class="col-md-10 ">
                                        @if(Auth::user()->isVoice==1)
                                            <input type="checkbox" name="isVoice" checked>
                                        @else
                                            <input type="checkbox" name="isVoice">
                                        @endif
                                        Active <b>voice</b>

                                        <p class="text-muted">Active the voice control functionality.</p>
                                    </div>

                                </div>
                                <div class=" col-md-10">
                                    <div class="col-md-10 ">
                                        @if(Auth::user()->isColor==1)
                                            <input type="checkbox" name="isColor" checked>
                                        @else
                                            <input type="checkbox" name="isColor">
                                        @endif
                                        Active <b>color</b>

                                        <p class="text-muted">Active the black and white design.</p>
                                    </div>

                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <a href="/profile" class="btn btn-danger ">back</a>
                                </div>
                                <div class="col-md-6 text-right">
                                    <button type="submit" class="btn btn-success right">
                                        <i class="fa fa-btn fa-pencil"></i> Save
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