<html>
<head>
      <title>Search results</title>
</head>
       
    <body>
       
 
 <?php
	
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	
	 if(!get_magic_quotes_gpc())
        {
            $username=addslashes($username);
            $password=addslashes($password);
			$email=addslashes($email);
        }
	
	 $db=new mysqli('localhost','root','ankit','flight booking system');
        
        //Checking the connection
        if(mysqli_connect_errno())
        {
            echo'Error:Could not connect to database. Please try again later! ';
            exit;
        }
		
		$query2="INSERT INTO signup VALUES ('$username','$password','$email')";
		$result=$db->query($query2);
		
		if ($result=== TRUE) {
    echo "You are successfully Registered.Please login to continue!";
}

 else {
    echo "Error: " . "Candidate already registered with this userID. Please use other userid " . "<br>" . $db->error;
}

?>

</body>
</html>

      
	?>