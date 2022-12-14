$(document).ready(function(){
    $("#signUp").click(function(){
         loadCover();
        $("#offcanvas").addClass("show");
    })
  
     $("#closeOffCan").click(function(){
        $("#offcanvas").removeClass("show");
        removeLoader();
     })
 $("#loginBtn").click(function(){
     let userId=$("#userId").val();
           userId=userId.trim();
     let userPassword=$("#upassword").val();
           userPassword=userPassword.trim()
     const userCheck=validUser(userId,userPassword);
    if(!userCheck){
 //------ make login to user
        makeUserLogin(userId,userPassword);

        }else{

         errorReport(userCheck);
     }


   });
//dash boar action ---
$(".accId").click(function(e){
   e.preventDefault();
   $("#offcanvas-dash").addClass("show");
   loadCover();
   
});
$("#close-prof").click(function(){
    $("#offcanvas-dash").removeClass("show");
   removeLoader();
})


 });// end of document ready

 function validUser(id,password){
       userId=id.trim();
       errorMessage="";
        if(userId.length<5)
          return errorMessage="User Id should be more than 4 characters";

         password=password.trim();
          if(password.length<6)
             errorMessage="Password should be more than 5 characters";
    
    

    return errorMessage;
 }


 function makeUserLogin(userId,userPassword){
   //call the loader
   loadForLoading();
    //--- call ajax function
    $.ajax({
          type:"POST",
          url:"/login.php",
          data:{userId:userId,password:userPassword},
          success:function(response){
            response=$.parseJSON(response);
                if(response.status=="ok")
                  {
                     removeLoader();
               //-------- send the request to the dashboard
                   window.location.replace("/dashboard.php");    
                     
                  }else{
                     errorReport(response.message);
                  }
               
          },
          error:function(response){
            errorReport("Unable to process, Try after Sometime!!!");
           }
    });// end ajax
   }
//-------- display --- Error--
  function errorReport(message){
     removeLoader();
     $("#alert-box").css("display","block");
      $("#alert-box").html(message);
  }
    function loadForLoading(){
             $(document).find("#overlayer").css("z-index","1202");
            $(document).find("#overlayer").css("display","block");
            $(document).find("#loading").css("display","block");
         }
     function removeLoader(){
      $("#overlayer").css("display","none");
      $("#loading").css("display","none");
     }    
 
     function loadCover(){
      $(document).find("#overlayer").css("z-index","102");
      $(document).find("#overlayer").css("display","block");
     }
//---------------------- signUp action -----------------
$(document).ready(function(){
   
  $("#serverSignUp").click(function(){
   loadCover();

   let userName=$("#uName-sign").val();
        userName=userName.trim();
   let userId=$("#uId-sign").val();
        userId=userId.trim();
   let userPassword=$("#upass-sign").val();
        userPassword=userPassword.trim()
        let userRePassword=$("#re-upass-sign").val();
        userRePassword=userRePassword.trim()   
   const userCheck=validUserSignUp(userName,userId,userPassword,userRePassword);
      if(!userCheck)
        {
          loadForLoading();
           sendUserForSignUp(userName,userId,userPassword);
          // alert('loadin');
          //call the loader
            

        }else
        {
         errorReportSign(userCheck)
        }

  });;//signUp

})

//-------- display --- Error--
function errorReportSign(message){
       //removeLoader();
     $("#alert-box-sign").css("display","block");
     $("#alert-box-sign").html(message);
}
//------- validate the user data
function validUserSignUp(userName,userId,password,userRePassword){
  
   errorMessage="";
   if(userId.length<5)
   return errorMessage="User Id should be more than 4 characters";
   if(userName.length<3)
      return errorMessage="User Name should be more than 2 characters";

     password=password.trim();
      if(password.length<6)
          return errorMessage="Password should be more than 5 characters";
      if(password!==userRePassword)
           errorMessage="Password and Re -Password should be matched !!!";



   return errorMessage;
}

//----------- ajax service for signUp
function sendUserForSignUp(userName,userId,userPassword){
   $.ajax({
      type:"POST",
      url:"/signup.php",
      data:{userName:userName,userId:userId,password:userPassword},
      success:function(response){
         console.log(response);
        response=$.parseJSON(response);
            if(response.status=="ok")
              {
                 removeLoader();
                 console.log(response);
                 alert(response.message);
           //-------- send the request to the dashboard
                 window.location.replace("/");    
                 
              }else{
               console.log(response);
               removeLoader();
               loadCover();
               errorReportSign(response.message);
              }
           
      },
      error:function(response){
         errorReportSign("Unable to process, Try after Sometime!!!");
       }
});// end ajax
 

}