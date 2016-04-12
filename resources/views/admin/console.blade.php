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
                <div class="panel panel-default">
                    <div class="panel-heading">User</div>

                    <table class="table">
                        <tr>
                            <th>Pseudo</th>
                            <th>Name</th>
                            <th>Firstname</th>
                            <th>Mail</th>
                            <th>points posted</th>
                            <th>Blocked</th>
                            <th>Change</th>
                        </tr>
                        @foreach($users as $user)
                            <tr class="isBlocked">
                                <td>{{$user->pseudo}}</td>
                                <td>{{$user->lastname}}</td>
                                <td>{{$user->firstname}}</td>
                                <td>{{$user->email}}</td>
                                <td>0</td>
                                <td>YES</td>
                                <td><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button>
                                <button class="btn btn-danger"><span class="glyphicon glyphicon-remove"></span></button></td>
                            </tr>
                        @endforeach
                    </table>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection