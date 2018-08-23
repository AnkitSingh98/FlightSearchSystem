<html>
<head>
      <title>Search results</title>
</head>
       
    <body>
       
 
 <?php
	
	$flighht_id=$_GET['flight_id'];
	
	
	 if(!get_magic_quotes_gpc())
        {
            $flighht_id=addslashes($flighht_id);
            
        }
	
	  $db=new mysqli('localhost','root','ankit','flight booking system');
        
        //Checking the connection
        if(mysqli_connect_errno())
        {
            echo'Error:Could not connect to database. Please try again later! ';
            exit;
        }
		
				
		$query2="INSERT INTO booking_history VALUES ('$flighht_id',NOW())";
		$result=$db->query($query2);
		
		if ($result=== TRUE) {
    echo "Your Flight is successfully booked!! Thank you :)";
}

 else {
    echo $flighht_id."Error: ". $db->error;
}

?>

</body>
</html>

      
	?>