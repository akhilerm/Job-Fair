<html>
	<head>
		<title>JobFair Registration -Conjura 17</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">
		<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	</head>

<?php
	require_once("db_connect.php");
	$query="SELECT id,name,college,email,phone,trans_id from user ";
	$result = $con->query($query);
	if($result->num_rows>0)
	{
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<th>REG ID</th><th>NAME</th><th>COLLEGE</th><th>EMAIL</th><th>PHONE</th><th>TRANS_ID</th>";
		echo "</tr>";
		
		while($row=$result->fetch_assoc())
		{
			echo "<tr>";
			echo "<td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['college']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['trans_id']."</td><td>";
			echo "</tr>";
		}		
		echo "</table>";
	}
	else
		echo "NO BODY HAS PAID";

?>
</html>
