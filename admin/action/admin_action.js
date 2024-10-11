$(document).ready(function(){
    var origin = window.location.origin;
    var path = window.location.pathname.split( '/' );
    var URL = origin+'/'+path[1]+'/'+path[2];

    // console.log(origin)

    function insertMesssage(element, meassae){
        // console.log("hii")
        element.html(meassae).slideDown();
            setTimeout(function(){
                element.slideUp();
            }, 2500)
    }
    
    $("#adminLogin").submit(function(e){
        e.preventDefault();
        var username = $("#login_username").val();
        var password = $("#login_password").val()
        username = username.trim();
        password = password.trim();
        if(username == "" || password == ""){
           $(".error_warning").html("Please Fill All The Fields.").slideDown();   
           setTimeout(function(){0
            $(".error_warning").slideUp();
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


    $("#try_uplaod").submit(function(e){
        e.preventDefault();
        let sellerName = $("#seller_name").val().trim();
        let sellerEmail = $("#seller_email").val().trim();
        let sellerPhone = $("#seller_phone").val().trim();
        let sellerAdress = $("#seller_address").val().trim();
        let companyName = $("#company_name").val().trim();
        let productNumber = $("#number_product").val().trim();
        let productCategory = $("#product_category").val().trim();
        let sellerUsername = $("#username").val().trim();
        let sellerPassword = $("#password").val().trim();
        let companyLogo = $('#imageUpload')[0].files[0];
        // console.log(companyName)
        if(sellerName == ""){
            insertMesssage($(".error_warning"), "Please! Enter  your name.")
        }else if(sellerEmail == ""){
            insertMesssage($(".error_warning"), "Please! Enter your the email.")
        }else if(sellerPhone == ""){
            insertMesssage($(".error_warning"), "Please! Enter your Phone number.")
        }else if(companyName == ""){
            insertMesssage($(".error_warning"), "Please! Enter your company name.")

        }else if(productNumber == ""){
            insertMesssage($(".error_warning"), "Please! Enter number of product.")

        }else if(sellerUsername == ""){
            insertMesssage($(".error_warning"), "Please! Enter your username.")

        }else if(sellerPassword == ""){
            insertMesssage($(".error_warning"), "Please! Enter your password.")
   
        }else if(companyLogo && !companyLogo.type.startsWith("image")){
                insertMesssage($(".error_warning"), "Please! upload only image for company logo.")
        }else{   
        let formData = new FormData();
        formData.append("seller_name", sellerName)
        formData.append("seller_email", sellerEmail)
        formData.append("seller_phone", sellerPhone)
        formData.append("seller_address", sellerAdress)
        formData.append("company_name", companyName)
        formData.append("product_number", productNumber)
        formData.append("product_category", productCategory)
        formData.append("seller_username", sellerUsername)
        formData.append("seller_password", sellerPassword)
        formData.append("create", "yes")
        if(companyLogo){
        formData.append("company_logo", companyLogo)}

        console.log(formData)

            $.ajax({
                url:"action/seller.php",
                type:"POST",
                data:formData,
                processData: false,   
                contentType: false,
                success:function(response){
                    console.log(response)
                }
            })
        }
    })
    
})