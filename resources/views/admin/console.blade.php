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
                        <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-chevron-right"
                                                                   aria-hidden="true"></span> <b>Users</b></a>
                        <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-chevron-right"
                                                                   aria-hidden="true"></span> <b>Feedbacks</b></a>
                        <a href="#" class="list-group-item"> <span class="glyphicon glyphicon-chevron-right"
                                                                   aria-hidden="true"></span> Show and confirm
                            <b>points</b></a>
                    </div>
                </div>

                <!-- User Table -->
                <div class="panel panel-default">
                    <div class="panel-heading">Users</div>

                    <table class="table">
                        <tr>
                            <th>Pseudo</th>
                            <th>Name</th>
                            <th>Firstname</th>
                            <th>Mail</th>
                            <th>feedback</th>
                            <th>points added</th>
                            <th>Change</th>
                        </tr>
                        @foreach($users as $user)
                            @if($user->isBlocked)
                                <tr class="isBlocked"><td> {{$user->pseudo}} <b style="color:darkred"><span style="color:darkred" class="glyphicon glyphicon-ban-circle"></span> is ban</b> </td>
                            @else
                                <tr><td>{{$user->pseudo}}</td>
                            @endif

                                <td>{{$user->lastname}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->feedbacks->count()}}</td>
                                <td>0</td>
                                <td><button class="btn btn-warning btn-sm ">  <span class="glyphicon glyphicon-pencil"></span>  </button>
                                <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"></span></button></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <!-- Feedback table -->
                <div class="panel panel-default">
                    <div class="panel-heading">Feedbacks</div>

                    <table class="table">
                        <tr>
                            <th>Write</th>
                            <th>Feedback</th>
                            <th>Answer</th>
                        </tr>
                        @foreach($feedbacks as $feedback)
                            <tr>
                                <td>{{$feedback->user->pseudo}}</td>
                                <td>{{$feedback->comment}}</td>
                                <td><button class="btn btn-success btn-sm ">  <span class="glyphicon glyphicon-pencil"></span> answer  </button><br />
                                    <button class="btn btn-danger btn-sm pull-right"> <span class="glyphicon glyphicon-remove"></span></button></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection