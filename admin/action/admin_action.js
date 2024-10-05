$(document).ready(function(){
    var origin = window.location.origin;
    var path = window.location.pathname.split( '/' );
    var URL = origin+'/'+path[1]+'/';

    console.log(URL)
    
    $("#adminLogin").submit(function(e){
        e.preventDefault();
        var username = $("#login_username").val();
        var password = $("#login_password").val()
        username = username.trim();
        password = password.trim();
        if(username == "" || password == ""){
           $("#adminLogin").append('<div class="alert alert-danger">Please Fill All The Fields.</div>')
        }
        $.ajax({
            url: "action/check_login.php",
            type: "POST",
            data: {login: 1, user:username, pass:password},
            success: function(response){
                $(".alert").hide()
                console.log(response);
                // let res = JSON.parse(response);
                // if(res.hasOwnProperty)
            }
        })
    })
})