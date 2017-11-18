<?php 
	$q=$_GET["q"]; 
	$con=mysqli_connect('localhost','root','1312');
	mysqli_select_db($con,"BejeweledScore");

	$sql="SELECT rank, name, score FROM highScore WHERE rank=1 OR rank=2 OR rank=3";
	$result=mysqli_query($con, $sql);

	while ($row=mysqli_fetch_array($result)) {
		echo $row['rank'].",".$row['name'].",".$row['score'].",";
	}
	mysqli_close($con);
?>