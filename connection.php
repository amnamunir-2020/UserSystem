<?php

session_start();

//connection class
class Connection{
 
    public $host="localhost";
    public $user="root";
    public $conn_password="";
    public $db_name="admin_db";
    public $conn;

    public function __construct(){

       $this->conn=mysqli_connect($this->host,$this->user,$this->conn_password,$this->db_name);

    }

}

//Register Class
 class Register extends Connection{
    //registration function
    public function registration($firstname,$lastname,$nameofuser,$emailofuser,$passwordofuser,$cpass,$genderofuser,$birthofuser){
    
      
      $selectquery=mysqli_query($this->conn,"select * from users where email= '$emailofuser' or password ='$passwordofuser'");
      $result=mysqli_num_rows($selectquery);

       if($result>0){

         //echo $result;
         

         return 10;
		 //username already taken
		 
           
       }
          
         
       

        else
		{
			if($passwordofuser==$cpass){                                                                                                                                                       
            $insertquery=mysqli_query($this->conn,"INSERT INTO users( `first_name`, `last_name`, `username`, `email`, `password`, `gender`, `dob`, `created_at`, `updated_at`) VALUES ('$firstname','$lastname','$nameofuser','$emailofuser','$passwordofuser','$genderofuser','$birthofuser',NOW(),NOW())");
       
       // echo  $insertquery;
          return 1;
         // Registered Succesfully;
			}
		
		
         else{
            return 100;
            //password does not match
         }

		}




    }

 }
 
 
 
 //Login class
 class Login extends Connection{
	 public $id;
	 
	
	 
	 public function login($loginemail,$loginpassword){
		 
		 $result=mysqli_query($this->conn,"select * from users where email='$loginemail' or password='$loginpassword'");
		 $row =mysqli_fetch_assoc($result);
		 if(mysqli_num_rows($result)>0){
			 if($loginpassword==$row['password']){
				 $this->id=$row['id'];
				 return 1;
				 //login succes
			 }
			 else{
				 return 10;
				 //already
			 }
			 
			 
		 }
		 else{
			 return 100;
			 //doesnot match
		 }
		 
	 }
	 
	 public function iduser(){
		 return $this->id;
	 }
	 
	 
 }
 
 
 //Class select user by id data show in index page
 class Select extends Connection{
	 public function selectuserbyId($id){
		 $result=mysqli_query($this->conn,"select * from users where id=$id");
		 return mysqli_fetch_assoc($result);
		 
	 }
	 
 }




?>