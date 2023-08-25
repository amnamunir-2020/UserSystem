<?php include ('connection.php');




//selct class object 
$selectobj=new Select();

if(isset($_SESSION['id'])){
	
	$userdata=$selectobj->selectuserbyId($_SESSION['id']);
}

else{
	//header('Location:login.php');
}




?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <title>Home</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <style>
        .btn-logout button {
    cursor: pointer;
    width: 90%;
    padding: 15px;
    line-height: 20px;
    border: 1px solid #07355d;
    border-radius: 5px;
  
    font-weight: bold;
    margin-top: 15px;
	background: black;
	color:white;
}



.btn-logout button:hover {
   
     background: white;
    color: black;
    
}

      </style>
   </head>
   <body>
      <div class="container mt-5">
         <div class="text-center">
            <h2>User Data</h2>
           
         </div>
         <table class="table table-dark">
            <thead>
               <tr>
                  <th scope="col">User ID</th>
                  <th scope="col">User Name</th>
                  <th scope="col">Date Of Birth</th>
                  <th scope="col">Gender</th>
               </tr>
            </thead>
            <tbody>
               <tr>
			 
                  <td><?php  echo  $userdata['id']; ?> </td>
                  <td> <?php  echo  $userdata['username']; ?>  </td>
                  <td> <?php  echo  $userdata['dob']; ?>  </td>
                  <td> <?php  echo  $userdata['gender']; ?> </td>
               </tr>
            </tbody>
         </table>
		 
		 <div class="col-lg-2 btn-logout ">
        <a  href="logout.php" > Logout</a>
</div>
      </div>
   </body>
</html>