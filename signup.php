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
               $userInfo['userName']=$_POST['userName'];
               $userInfo['userId']=$_POST['userId'];
               $userInfo['password']=$_POST['password'];
      //----------- passing dummy data info ...
            //  $userInfo['userId']="PRAWEEN";
            //  $userInfo['password']="1234";
                 
                 $userStatusArr=$userObj->signUpRequest($userInfo);
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
   exit;


  if(isset($_POST['userId'])&&isset($_POST['password'])){
   //--------- query for inserting the data 
   $sql="INSERT INTO bucklit_users (uid,user_name,upassword,en_date)VALUES('".$_POST['userId']."','".$_POST['userId']."','".$_POST['password']."','2022-12-13')";
       if($conn->query($sql))
         {
            $statusArr['status']="ok";
            $statusArr['message']="Data Insert !!!";
          }else{
            $statusArr['status']="error";
            $statusArr['message']=$conn->error;
         }

       
      
    }else{
      $statusArr['status']="error";
      $statusArr['message']="Invalid Information";
    }
//-------- return the status ------  
  print_r(json_encode($statusArr))
?>