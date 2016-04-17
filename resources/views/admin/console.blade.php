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

                <div id="action">
                    </div>
                <div id="app">
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
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection