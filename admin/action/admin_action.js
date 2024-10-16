$(document).ready(function(){
    var origin = window.location.origin;
    var path = window.location.pathname.split( '/' );
    var URL = origin+'/'+path[1]+'/'+path[2];
    
    function insertMesssage(element, meassae){
        // console.log("hii")
        element.html(meassae).slideDown();
            setTimeout(function(){
                element.slideUp();
            }, 2500)}

    $("#adminLogin").submit(function(e){
        e.preventDefault();
        var username = $("#login_username").val();
        var password = $("#login_password").val()
        var user_type = $("#user_type").val()
        username = username.trim();
        password = password.trim();
        if(username == "" || password == ""){
           $(".error_warning").html("Please Fill All The Fields.").slideDown();   
           setTimeout(function(){0
            $(".error_warning").slideUp();
           }, 2500)

        }else if(user_type == ""){
            insertMesssage($(".error_warning"), "Please! Select user type")

        }else{
            let formData 
            if(user_type == "admin"){
                console.log(user_type)

                formData = {login: 1, user:username, pass:password, userType:"admin"}
            }else{
                formData = {login: 1, user:username, pass:password, userType:"sellers"}
            }
            
            $.ajax({
                url: "action/check_login.php",
                type: "POST",
                data: formData,
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

            $.ajax({
                url:"action/seller.php",
                type:"POST",
                data:formData,
                processData: false,   
                contentType: false,
                success:function(response){
                    let addResult = JSON.parse(response)
                    if(addResult.status == "bothMatched"){
                        insertMesssage($(".error_warning"), addResult.message)
                    }else if(addResult.status == "username_matched"){
                        insertMesssage($(".error_warning"), addResult.message)
                    }else if(addResult.status == "emailMatch"){
                        insertMesssage($(".error_warning"), addResult.message)
                    }else if(addResult.status == "Not Image"){
                        insertMesssage($(".error_warning"), addResult.message)
                    }else{
                        if(addResult.status == "adSeller"){
                            insertMesssage($(".success_warning"), addResult.message)
                            setTimeout(function(){
                                window.location.href = URL + "/dashboard.php"    
                            }, 1500) 
                        }
                    }
                }
            })
        }
    })

    $("#logout").on("click", function(){
        $.ajax({
            url:"action/check_login.php",
            type:"POST",
            data:{logOut:"yes"},
            success:function(response){
                let log_out = JSON.parse(response)
                if(log_out.status == "logout"){
                    window.location.href = "http://localhost/woomart/admin";
                }
            }
        })
    })

    $("#seller_search").on("change keyup", function(){
        console.log("Ram")
       let seller_search_input = $("#seller_search_input").val().trim();
       let seller_search_filter = $("#seller_search_filter").val().trim();
       let searchData
       if(seller_search_input != ""){
        if(seller_search_filter != ""){
            searchData = {
                searchInput : seller_search_input,
                selllerFilter: seller_search_filter,
                isSellerSearch:"yes"}
        }else{
        searchData = {
            searchInput : seller_search_input,
            isSellerSearch:"yes"
        }
        }
        $.ajax({
            url:"action/seller.php",
            type:"POST",
            data:searchData,
            success:function(response){
                let sellerSearchResult = JSON.parse(response)
                if(sellerSearchResult.length = 0){
                    
                }
            }
        })
        
    }
    })
    
})