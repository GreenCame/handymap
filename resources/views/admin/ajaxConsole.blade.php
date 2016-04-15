@if(isset($users))
<!-- User Table -->
        <div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-lg glyphicon-user"></span> Users</div>

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
                        <tr id="user_{{$user->id}}" class="isBlocked"><td> {{$user->pseudo}} <b style="color:darkred"><span style="color:darkred" class="glyphicon glyphicon-ban-circle"></span> is ban</b> </td>
                    @else
                        <tr id="user_{{$user->id}}" ><td>{{$user->pseudo}}</td>

                            @endif

                            <td>{{$user->lastname}}</td>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->feedbacks->count()}}</td>
                            <td>0</td>
                            <td><button class="btn btn-info btn-sm " onclick="location.href='/settings/{{$user->id}}';" >  <span class="glyphicon glyphicon-pencil"></span>  </button>
                                @if($user->isBlocked)
                                    <button class="btn btn-success btn-sm ">  <span class="glyphicon glyphicon-minus"></span>  </button>
                                @else
                                    <button class="btn btn-warning btn-sm ">  <span class="glyphicon glyphicon-ban-circle"></span>  </button>
                                @endif
                                <button class="btn btn-danger btn-sm" onclick="removeUser({{$user->id}})"><span class="glyphicon glyphicon-remove"></span></button></td>
                        </tr>
            @endforeach
            </table>
        </div>
@elseif(isset($feedbacks))
        <!-- Feedback table -->
        <div class="panel panel-primary">
            <div class="panel-heading"><span class="glyphicon glyphicon-lg glyphicon-inbox"></span> Feedbacks</div>

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
                            <button class="btn btn-danger btn-sm pull-right" action="remove()"> <span class="glyphicon glyphicon-remove"></span></button></td>
                    </tr>
                @endforeach
            </table>
        </div>

@elseif(isset($points))
    <div class="panel panel-info">
        <div class="panel-heading"><span class="glyphicon glyphicon-lg glyphicon-map-marker"></span> Points to confirm</div>

        <table class="table">
            <tr>
                <th>Author point</th>
                <th>Rate</th>
                <th>longitude</th>
                <th>Latitude</th>
                <th>Description</th>
                <th>Confirmation</th>
                <th>Change</th>
            </tr>
            @foreach($points as $point)
                <tr id="point_{{$point->id}}"
                        @if($point->confirmationsValid->count() - $point->confirmationsNotValid->count()>10)
                        class="success"
                        @elseif($point->confirmationsValid->count() - $point->confirmationsNotValid->count()<-10)
                        class="danger"
                        @elseif($point->confirmationsValid->count() - $point->confirmationsNotValid->count()<-5)
                        class="warning"
                        @endif
                        >
                    <td>{{$point->user->pseudo}}</td>
                    <td>{{$point->rateValue}}</td>
                    <td>{{$point->longitude}}</td>
                    <td>{{$point->latitude}}</td>
                    <td>{{$point->description}}</td>
                    <td>@if($point->confirmations->count()==0)
                            <span style="color:grey">None</span>
                        @else
                            <span style="color:forestgreen">+{{$point->confirmationsValid->count()}}</span> / <span style="color:darkred">-{{$point->confirmationsNotValid->count()}}</span>
                        @endif
                    </td>
                    <td><button class="btn btn-info btn-sm" >  <span class="glyphicon glyphicon-eye-open"></span>   show it </button><br />
                        <button class="btn btn-success btn-sm" onClick="validatePoint({{$point->id}})">  <span class="glyphicon glyphicon-ok"></span> validate  </button><br />
                        <button class="btn btn-danger btn-sm btn-remove"  onClick="deletePoint({{$point->id}})"> <span class="glyphicon glyphicon-remove"></span> remove</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@elseif(isset($pointsValidate))
    <div class="panel panel-success">
        <div class="panel-heading"><span class="glyphicon glyphicon-lg glyphicon-map-marker"></span> Points confirmed</div>

        <table class="table">
            <tr>
                <th>Author point</th>
                <th>Rate</th>
                <th>longitude</th>
                <th>Latitude</th>
                <th>Description</th>
                <th>Confirmation</th>
                <th>Change</th>
            </tr>
            @foreach($pointsValidate as $point)
                <tr id="point_{{$point->id}}"
                    @if($point->confirmationsValid->count() - $point->confirmationsNotValid->count()>10)
                    class="success"
                    @elseif($point->confirmationsValid->count() - $point->confirmationsNotValid->count()<-10)
                    class="danger"
                    @elseif($point->confirmationsValid->count() - $point->confirmationsNotValid->count()<-5)
                    class="warning"
                        @endif
                        >
                    <td>{{$point->user->pseudo}}</td>
                    <td>{{$point->rateValue}}</td>
                    <td>{{$point->longitude}}</td>
                    <td>{{$point->latitude}}</td>
                    <td>{{$point->description}}</td>
                    <td>@if($point->confirmations->count()==0)
                            <span style="color:grey">None</span>
                        @else
                            <span style="color:forestgreen">+{{$point->confirmationsValid->count()}}</span> / <span style="color:darkred">-{{$point->confirmationsNotValid->count()}}</span>
                        @endif
                    </td>
                    <td><button class="btn btn-info btn-sm" >  <span class="glyphicon glyphicon-eye-open"></span>   show it </button><br />
                        <button class="btn btn-warning btn-sm" onClick="unValidatePoint({{$point->id}})">  <span class="glyphicon glyphicon-erase"></span> Unvalidate</button><br />
                        <button class="btn btn-danger btn-sm btn-remove"  onClick="deletePoint({{$point->id}})"> <span class="glyphicon glyphicon-remove"></span> remove</button>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endif