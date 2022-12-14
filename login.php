<?php
 //database config ,required information: servername ,username ,password ,database
   require_once("database_config.php");
  //calling the user login Controller ..
   require_once("login-api.php");
      $userObj=new LoginApiController($databaseArr);
      $statusArr=["status"=>"error","message"=>"Invalid Information !!"];
       if($userObj->connStatus){
        if(isset($_POST['userId'])&&isset($_POST['password'])){
            
             if(!empty($_POST['userId'])&&!empty($_POST['password']))
             {
            $userInfo['userId']=$_POST['userId'];
              $userInfo['password']=$_POST['password'];
              $userStatusArr=$userObj->loginRequest($userInfo);
              //return User Information ...
              $statusArr=$userStatusArr;
            }else{
               $statusArr['message']="Invalid Information";
            }
  
           }else{
            $statusArr['message']="Unauthorised Access";

           }
       }else
       {
          $statusArr['message']="Unable to connect database";
       }
     
       print_r(json_encode($statusArr));

?>