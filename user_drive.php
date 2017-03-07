<?php
	//to be displayed in user profile

	require_once("db_connect.php");
	$query=;
	$result = $con->query($query);
	$count=0;
	if($result->num_rows>0)
	{
		echo "<table class='table table-striped'>";
		echo "<tr>";
		echo "<th>S.NO</th><th>CONJURA ID</th><th>NAME</th><th>COLLEGE</th><th>EMAIL</th><th>PHONE</th><th>TRANS_ID</th><th>AMT</th>";
		echo "</tr>";
		
		while($row=$result->fetch_assoc())
		{
			echo "<tr>";
			echo "<td>".++$count."</td><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['college']."</td><td>".$row['email']."</td><td>".$row['phone']."</td><td>".$row['trans_id']."</td><td>".$row['amt']."</td>";
			echo "</tr>";
		}		
		echo "</table>";
	}
	else
		echo "NO BODY HAS PAID";

?>
