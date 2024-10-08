$(document).ready(function(){
    var origin = window.location.origin;
    var path = window.location.pathname.split( '/' );
    var URL = origin+'/'+path[1]+'/'+path[2];

    // console.log(origin)
    
    $("#adminLogin").submit(function(e){
        e.preventDefault();
        var username = $("#login_username").val();
        var password = $("#login_password").val()
        username = username.trim();
        password = password.trim();
        if(username == "" || password == ""){
           $(".error_warning").html("Please Fill All The Fields.").slideDown();
           setTimeout(function(){
            $(".error_warning").html("Please Fill All The Fields.").slideUp();
           }, 2500)

        }else{
            $.ajax({
                url: "action/check_login.php",
                type: "POST",
                data: {login: 1, user:username, pass:password},
                success: function(response){
                    console.log(response);
                    let res = JSON.parse(response);
                    if(res.hasOwnProperty("error")){
                        $(".error_warning").html(res.error).slideDown();
                        setTimeout(function(){
                           $(".error_warning").slideUp();                         
                       }, 2500)
                       }
                    if(res.hasOwnProperty("success")){
                        $(".success_warning").html(res.success).slideDown()
                        setTimeout(function(){
                            window.location.href = URL + "/dashboard.php"
                            // console.log(URL + "/dashboard.php")
                            $(".success_warning").html(res.success).slideUp()

                        }, 1500) 
                    }
                }
            })
        }
    })




    
})