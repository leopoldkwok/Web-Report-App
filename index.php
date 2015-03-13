<?php 

// Using PDO version

// remove php error messages
// error_reporting(E_ALL ^ E_DEPRECATED);

// Logging in
 $user = 'root';
 $pass = '';
 $db = new PDO('mysql:host=localhost;dbname=canteburyv3', $user, $pass);
 $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Count Participants
 $result = $db->prepare("SELECT count(*) FROM table2");
 $result->execute();
 $num_rows= $result->fetchColumn();
 

// counting male participants

$result1 = $db->prepare("SELECT count(*) FROM table2 where gender = 'male'");
$result1->execute();
$num_rows1 = $result1->fetchColumn();

// counting female participants
$result2 = $db->prepare("SELECT count(*) FROM table2 where gender = 'female'");
$result2->execute();
$num_rows2 = $result2->fetchColumn();

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


<div class="btn-group">
	<button type="button" class="btn btn-default btn-lg" id="male">Male</button>
	<button type="button" class="btn btn-default btn-lg" id="female">Female</button>
	<button type="button" class="btn btn-default btn-lg" id="all">Show All</button>
</div>

<div id="info">
<?php

	echo "<br />There are " . $num_rows . " participants.";
	
	echo "<br />There are " . $num_rows1 . " male participants.";
	
	echo "<br />There are " . $num_rows2 . " female participants.";
	
	echo "<br /><br />";

?>
</div>

<table class="table table-bordered table-hover">

	<thead>
		<tr>
			<th>Primary Key</th>
			<th>Full Name</th>
			<th>Gender</th>
			<th>Facebook Profile</th>
		<tr>
	</thead>
	

	<tbody>

	<?php

	$stmt = $db->query("SELECT * FROM table2");
	  while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	  	//adding a class to be able to identify females and males with bootstrap css features
	  	if($row['gender']=='male') {
	  		$var_tr = 'success';
	  	}
	  	elseif($row['gender']=='female') {
	  		$var_tr = 'danger';
	  	}

	  	echo "<tr class='$var_tr " . $row['gender'] . "'>";
	    echo "<td>".$row['primary_key']."</td>";
	    echo "<td>".$row['name']."</td>";
	    echo "<td>".$row['gender']."</td>";
	    echo "<td><a target= '_blank' href='".$row['link']."'>Click to see their facebook profile</a></td>";
	    echo "</tr>";

	 } //end while
			
	?>

	</tbody>

</table>

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
</body>
</html>