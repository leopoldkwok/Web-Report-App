<?php 
// remove php error messages
error_reporting(E_ALL ^ E_DEPRECATED);
//make connection
mysql_connect('localhost', 'root','');

//selecting my db
mysql_select_db('canteburyv3');



// PDO version 

//$servername = "localhost";
//$username = "root";
//$password = "";

//try {
//	$conn = new PDO("mysql:host=$servername;dbname=canteburyv3", $username, $password);
	// set the PDO error to exception
//	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//	echo "Connected successfully";
//	}
//catch(PDOException $e)
//	{
//	echo "Connection failed: " . $e->getMessage();
//	}


$sql="SELECT * FROM table2";
$records=mysql_query($sql);

// Count Participants 
$result = mysql_query("SELECT * FROM table2");
$num_rows = mysql_num_rows($result);

// counting male participants
$result1 = mysql_query("SELECT * FROM table2 where gender = 'male' ");
$num_rows1 = mysql_num_rows($result1);

// counting female participants
$result2 = mysql_query("SELECT * FROM table2 where gender = 'female' ");
$num_rows2 = mysql_num_rows($result2);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   	<h1>Cantebury Information</h1>
   	<!-- <title>Cantebury Info</title> -->
	

   	<!-- Bootstrap -->
   	 <link href="css/bootstrap.min.css" rel="stylesheet">
   	 <link href='css/main.css' rel='stylesheet'>
</head>

<body>

<table class="table table-bordered table-striped table-hover">
	<thread>
		<tr>
			<th>Primary Key</th>
			<th>Full Name</th>
			<th>Gender</th>
			<th>Facebook Profile</th>
		<tr>
	</thread>
	




<div id="info">
<?php

	echo "<br /><br />There are " . $num_rows . " participants.";
	
	echo "<br />There are " . $num_rows1 . " male participants.";
	
	echo "<br />There are " . $num_rows2 . " female participants.";
	
	echo "<br /><br />";



while($tablev2=mysql_fetch_assoc($records)) {
if($tablev2['gender']=='male')
    echo "<tr style='background-color:powderblue;'>";
elseif($tablev2['gender']=='female')
    echo "<tr style='background-color:pink;'>";
else
    echo "<tr>";

    echo "<td>".$tablev2['primary_key']."</td>";

    echo "<td>".$tablev2['name']."</td>";

    echo "<td>".$tablev2['gender']."</td>";

    echo "<td><a target = '_blank' href='".$tablev2['link']."'>Click to see their facebook profile</a></td>";

    echo "</tr>";

















// while($tablev2=mysql_fetch_assoc($records)) {
	
// 	echo "<tr>";
// // <div id="colours">	
// 	echo "<td>".$tablev2['primary_key']."</td>";
	
// 	echo "<td>".$tablev2['name']."</td>";

// 	if($tablev2['gender']=='male')
// 	echo "<td style='background-color:powderblue;'>".$tablev2['gender']."</td>";
	
// 	elseif($tablev2['gender']=='female')
// 	echo "<td style='background-color:pink;'>".$tablev2['gender']."</td>";
// 	else echo "<td>".$tablev2['gender']."</td>";

// 	echo "<td><a target = '_blank' href='".$tablev2['link']."'>Click to see their facebook profile</a></td>";
	
// 	echo "</tr>";
	
	
} //end while
?>
</div>

</table>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>