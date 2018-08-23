<html>
<head>
      <title>Search results</title>
</head>
       
    <body>
       
 
 <?php
	
	$from=$_POST['from'];
	$to=$_POST['to'];
	$date=$_POST['date'];
	$no=$_POST['no'];

	
	
	 if(!get_magic_quotes_gpc())
        {
            $from=addslashes($from);
            $to=addslashes($to);
			$date=addslashes($date);
			$no=addslashes($no);

        }
	
	 $db=new mysqli('localhost','root','ankit','flight booking system');
        
        //Checking the connection
        if(mysqli_connect_errno())
        {
            echo'Error:Could not connect to database. Please try again later! ';
            exit;
        }
		
		$query1="SELECT * FROM flight_details where `ffrom`='$from' AND `to`='$to' AND `depart_date`='$date';"																																																														;
		$result=$db->query($query1);
		
		if (!$result) {
         trigger_error('Invalid query: ' . $db->error);
            }
    echo" <table border=1>			
	         <tr>
                <th>Flight ID</th>
                <th>Source</th>
				<th>Destination</th>
				<th>Departure Date</th>
				<th>Departure Time</th>
				<th>Destination Arrival Time</th>
				<th>Total Fare</th>
				<th>Airline Type</th>
             </tr>";
				
		if ($result->num_rows > 0) {	
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
		echo "<td>".$row["flight_id"]."</td>";
		echo "<td>".$row["ffrom"]. "</td>";
		echo "<td>".$row["to"]."</td>";  
		echo "<td>".$row["depart_date"]."</td>"; 
		echo "<td>".$row["depart_time"]."</td>"; 
		echo "<td>".$row["dest_arrival"]."</td>"; 
		echo "<td>".$no*$row["price"]."</td>"; 
		echo "<td>".$row["airline_type"]."</td>"; ?>
		
		<td><a href='bookingpage.php?flight_id=<?php echo $row['flight_id']?>'>BOOK</a></td>
		<?php
		echo "</tr>";
		
    }
} else {
    echo "0 results";
}
echo "</table>";
$db->close();
	 
?>


</body>
</html>

     