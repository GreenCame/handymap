$(".list-group-item").click(function () {
    //remove all
    $(".list-group-item").removeClass("active");
    $(".list-group-item").find(".glyphicon").removeClass("rotateDownIn");
    $(".list-group-item").find(".glyphicon").addClass("rotateDownOut");
    //add for this
    $(this).addClass("active");
    $(this).find(".glyphicon").removeClass("rotateDownOut");
    $(this).find(".glyphicon").addClass("rotateDownIn");
});

$("#users").click(function () {
    $.ajax( {
        url:'/usersConsole',
        type: 'GET',
        success:function(data) {
            $('#action').html(data);
        }
    });
});
$("#feedbacks").click(function () {
    $.ajax( {
        url:'/feedbacksConsole',
        type: 'GET',
        success:function(data) {
            $('#action').html(data);
        }
    });
});
$("#points").click(function () {
    $.ajax( {
        url:'/pointsConsole',
        type: 'GET',
        success:function(data) {
            $('#action').html(data);
        }
    });
});
$("#pointsValidate").click(function () {
    $.ajax( {
        url:'/pointsValidateConsole',
        type: 'GET',
        success:function(data) {
            $('#action').html(data);
        }
    });
});
function validatePoint($id) {
    $.ajax( {
        url:'/validatePointConsole/'+$id,
        type: 'GET',
        success:function(data) {
            console.log("update");
            $('#point_'+$id).css({
                backgroundColor : "#498C3B",
                transitionDuration : '0.5s'
            });
            $('#point_'+$id).slideUp("slow");
            setTimeout(function(){$('#point_'+$id).remove() }, 3000);
        }
    });
}
function deletePoint($id) {
    $.ajax( {
        url:'/deletePointConsole/'+$id,
        type: 'GET',
        success:function(data) {
            console.log("update");
            $('#point_'+$id).css({
                backgroundColor : "#C81E3A",
                transitionDuration : '0.5s'
            });
            $('#point_'+$id).slideUp("slow");
            setTimeout(function(){$('#point_'+$id).remove() }, 3000);
        }
    });
}
function removeUser($id) {
    if(window.confirm("Are you sure?"))
    {
        var $url = 'usersConsole/'+$id;
        $.ajax({
            url: $url,
            success: function(result) {
                console.log(result);
                $('#user_'+$id).css({
                    backgroundColor : "#D0691A",
                    transitionDuration : '0.5s'
                });
                $('#user_'+$id).slideUp("slow");
                setTimeout(function(){$('#user_'+$id).remove() }, 3000);
            }
        });
        //$.get($url, function(){console.log("suppr")});
    }
}


//vue js
/*new Vue({
    el: '#app',
    data: {
        pointDescription: '',
        url:'/settings',
        points:[
            {'id':"3",'rateValue':"3",'description':"This a big point",'longitude':"789.85",'latitude':"75.5",'user_id':"1",'isValidate':true},
            {'id':"3",'rateValue':"3",'description':"This a big point",'longitude':"789.85",'latitude':"75.5",'user_id':"1",'isValidate':true},
            {'id':"3",'rateValue':"3",'description':"This a big point",'longitude':"789.85",'latitude':"75.5",'user_id':"1",'isValidate':true}
        ]
    },
    methods:{
        createPoint: function(){
            var pointDescription = this.pointDescription.trim();
            if (pointDescription)
            {
                this.points.push({'id':"3",'rateValue':"3",'description': pointDescription,'longitude':"789.85",'latitude':"75.5",'user_id':"1",'isValidate':true})
                this.pointDescription="";
            }
        },
        removePoint: function(point){
            this.points.$remove(point);
        }
    }
});*/

new Vue({
    el: '#user_content',
    data: {
        users:[
            {'id':"1",'pseudo':"Coucou",'firstname':"julien",'lastname':"Mouah",'feedbacks':"7",'email':"admin@gmail.com", "isBlocked": false},
            {'id':"2",'pseudo':"LOL",'firstname':"Leo",'lastname':"sf",'feedbacks':"7",'email':"prout@gmail.com", "isBlocked": true},
            {'id':"3",'pseudo':"Moi",'firstname':"Remi",'lastname':"qfvvxw",'feedbacks':"0",'email':"sqd@gmail.com", "isBlocked": false}
        ]
    },

    computed: {
      totalActiveUser: function() {
          return this.users.filter(function(user)
          {
              return ! user.isBlocked;
          }).length;
      }
    },

    events: {
        'removeUser': function(user) {
            this.users.$remove(user);
        }
    },

    components:{
        user: {
            template: '#user-template',
            props:["user"],
            replace: false,
            methods: {
                banUser: function(){
                    if(this.user.isBlocked==true)
                    {
                        this.user.isBlocked=false;
                    }
                    else
                    {
                        this.user.isBlocked=true;
                    }
                },
                removeUser: function(){
                    this.$dispatch("removeUser", this.user);
                }
            },
            computed:{
                isBan: function(){
                    return this.user.isBlocked;
                }
            }
        }
    },
    create: function() {
        $.getJSON("api/users", function (data) {
            this.users = data;
        });
    }
});
