<?php
/**
 * This Api handles the user login process and make user to login
 * 
 */
class LoginApiController{
 public $conn;
public $connStatus=false;
 public $connInfo;
 public $statusArr=["status"=>"error","message"=>"Database Error!"];

   function __construct($databaseInfo){
        //--- session is reuired
            session_start();
           $this->connInfo=$databaseInfo;
           $this->createConnection();
         
        }
   function loginRequest($userInfo){
       
           $userArr['userId']=strtolower(trim($userInfo['userId']));
           $password=trim($userInfo['password']);
           $password=md5($password);

           $sql="SELECT * FROM bucklit_users WHERE uid='".$userArr['userId']."' and upassword='".$password."'";
           if($result=$this->conn->query($sql))
             {
                 if($result->num_rows>0)
                   {
                    
                     $userArr=$result->fetch_assoc();
                      $this->statusArr['status']="ok";
                      $passArr['uid']=$userArr['uid'];
                      $passArr['username']=$userArr['user_name'];
       //----------- passing required Info ---               
                      $this->statusArr['userInfo']= $passArr;
                      $this->statusArr['message']="User is available .";
                      $this->statusArr['loginId']=session_id();
  //-------------- session is defined --                    
                      $_SESSION['currUser']=$this->statusArr;

                  
                   }else{
                    $this->statusArr['status']="error";
                    $this->statusArr['message']="Invalid Information !!!";
                   }
               
                

               }
           return $this->statusArr;

   }
//---------- user SignUp--------
 function signUpRequest($userInfo){
         $userId=trim($userInfo['userId']);
         $userId=strtolower($userId);
         $sql="SELECT * FROM bucklit_users WHERE uid='".$userId."'";
         $result=$this->conn->query($sql);
         if($result->num_rows>0)
         {
            $this->statusArr['status']="error";
            $this->statusArr['passwords']=md5($userInfo['password']);
            $this->statusArr['message']="UserId already taken";

         }else
         {
            $userName=trim($userInfo['userName']);
            $password=trim($userInfo['password']);
            $password=md5($password);
            $sql="INSERT INTO bucklit_users(uid,user_name,upassword)VALUES('".$userId."','".$userName."','".$password."')";
            $result=$this->conn->query($sql);
            if($this->conn->affected_rows>0)
            {

                $this->statusArr['status']="ok";
            
                $this->statusArr['message']="SignUp Successfully";
            }else
            {

                $this->statusArr['status']="error";
            
                $this->statusArr['message']="Unable to process request."; 
            }

            

         }

       


   

    return $this->statusArr;
    }// end signUp



 // database connection ....  
 function createConnection(){
         $databaseArr=$this->connInfo;
         $conn = new mysqli($databaseArr['servername'], $databaseArr['username'], $databaseArr['password'],$databaseArr['database']);
           // Check connection
            if (!$conn->connect_error)
                 {
                    $this->connStatus=true;
                    $this->conn=$conn;
                 } 
                  
          
          }

//remove the resources ...
   function __destruct(){
            $this->conn->close();
   
   }
  };// end of the class

?>