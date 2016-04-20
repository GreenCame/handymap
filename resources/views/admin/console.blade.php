@extends('layouts.app')
@section('links')
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="{{URL::asset('assets/js/vue.js')}}"></script>
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

                <div id="action"></div>

                <!--<div id="app">
                    <h1>@{{ points.length }}</h1>
                      @{{ pointDescription }}
                    <input type="text" v-model="pointDescription" @keyup.enter="createPoint">
                    <p>
                        <a v-bind:href="url">clic</a>
                    </p>
                    <h1 v-if="points.length">Validate</h1>
                    <ul>
                        <li v-for="point in points">
                            @{{ point.description }}
                            <input type="checkbox" v-model="point.isValidate">
                            <button @click="removePoint(point)">Remove</button>
                        </li>
                    </ul>
                    <h2 v-if="points.length">not validate</h2>
                    <ul>
                        <li v-repeat="point: points | filterBy false in points">
                            @{{ point.description }}
                            <input type="checkbox" v-model="point.isValidate">
                            <button v-on:click="removePoint(point)">Remove</button>
                        </li>
                    </ul>
                    <pre>@{{ $data | json }}</pre>
                </div>-->

                <div id="user_content">
                    <div class="panel panel-primary" v-if="users.length!=0">
                        <div class="panel-heading">
                            <span class="glyphicon glyphicon-lg glyphicon-user"></span>
                            Users ( <b>@{{totalActiveUser}}</b> actives / @{{users.length}} )
                        </div>

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

                                <tr v-for="user in users"
                                    is="user"
                                    :user="user"
                                    :class="{'user_ban': user.isBlocked}">
                                </tr>

                            </table>
                        <pre>@{{ $data | json }}</pre>
                    </div>
                    <div v-else>
                       <div style="text-align: center;">
                           No user yet... :(
                       </div>
                    </div>
                </div>

                <template id="user-template">
                    <td v-if="isBan">@{{user.pseudo}}<b style="color:darkred"><span style="color:darkred" class="glyphicon glyphicon-ban-circle"></span> is ban</b></td>
                    <td v-else>@{{user.pseudo}}</td>
                    <td>@{{user.lastname}}</td>
                    <td>@{{user.firstname}}</td>
                    <td>@{{user.email}}</td>
                    <td>@{{user.feedbacks}}</td>
                    <td>@{{user.feedbacks}}</td>
                    <td>
                        <!--
                             Bouton Save
                         -->
                        <button class="btn btn-info btn-sm "
                                onclick="location.href='/settings'"
                                >
                            <span class="glyphicon glyphicon-pencil"></span>
                        </button>

                        <!--
                            Bouton Ban
                        -->
                        <button class="btn btn-success btn-sm"
                                v-on:click="banUser"
                                v-if="isBan"
                                >
                            <span class="glyphicon glyphicon-minus"></span>
                        </button>
                        <button class="btn btn-warning btn-sm"
                                v-on:click="banUser"
                                v-else
                                >
                            <span class="glyphicon glyphicon-ban-circle"></span>
                        </button>

                        <!--
                            Bouton Remove
                        -->
                        <button class="btn btn-danger btn-sm"
                                v-on:click="removeUser"
                                >
                            <span class="glyphicon glyphicon-remove"></span>
                        </button>
                    </td>
                </template>
            </div>
    </div>
    </div>
@endsection