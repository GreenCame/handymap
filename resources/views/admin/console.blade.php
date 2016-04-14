@extends('layouts.app')
@section('links')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{URL::asset('assets/js/admin.js')}}"></script>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">What you need to do ?</div>

                    <div class="list-group">
                        <a href="#" id="users" class="list-group-item"> <span class="glyphicon glyphicon-chevron-right"
                                                                   aria-hidden="true"></span> <b>Users</b></a>
                        <a href="#" id="feedbacks" class="list-group-item"> <span class="glyphicon glyphicon-chevron-right"
                                                                   aria-hidden="true"></span> <b>Feedbacks</b></a>
                        <a href="#" id="points" class="list-group-item"> <span class="glyphicon glyphicon-chevron-right"
                                                                   aria-hidden="true"></span> New
                            <b>points</b></a>
                        <a href="#" id="pointsValidate" class="list-group-item"> <span class="glyphicon glyphicon-chevron-right"
                                                                               aria-hidden="true"></span> Show confirmed
                            <b>points</b></a>
                    </div>
                </div>

                <div id="action"> <!-- Points table -->
                  </div>
            </div>
        </div>
    </div>
    </div>
@endsection