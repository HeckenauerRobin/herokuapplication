<?php 
	$q=$_GET["q"]; 
	$con=mysqli_connect('localhost','root','1312');
	mysqli_select_db($con,"BejeweledScore");

	$strTab=explode(",", $q);
	$newScore=$strTab[0];
	$newName=$strTab[1];

	$sql="SELECT score FROM highScore WHERE rank=1 OR rank=2 OR rank=3";
	$result=mysqli_query($con, $sql);

	$rankTab=array();
	$i=1;
	while ($row=mysqli_fetch_array($result)) {
		$rankTab[$i]=$row['score'];
		$i++;
	}

	if ($rankTab[3]>$newScore) {
		return;
	} elseif ($rankTab[1]<$newScore) {
		$n2;
		$s2;
		$sql="SELECT name, score FROM highScore WHERE rank=1";
		$result=mysqli_query($con, $sql);
		while ($row=mysqli_fetch_array($result)) {
			$n2=$row['name'];
			$s2=$row['score'];
		}
		$n3;
		$s3;
		$sql="SELECT name, score FROM highScore WHERE rank=2";
		$result=mysqli_query($con, $sql);
		while ($row=mysqli_fetch_array($result)) {
			$n3=$row['name'];
			$s3=$row['score'];
		}


		$sql="UPDATE highScore SET name='$newName', score='.$newScore.' WHERE rank=1;";
		$result=mysqli_query($con, $sql);
		$sql="UPDATE highScore SET name='$n2', score='.$s2.' WHERE rank=2;";
		$result=mysqli_query($con, $sql);
		$sql="UPDATE highScore SET name='$n3', score='.$s3.' WHERE rank=3;";
		$result=mysqli_query($con, $sql);
		mysqli_close($con);
		return;
	} elseif ($rankTab[2]<$newScore) {
		$n2;
		$s2;
		$sql="SELECT name, score FROM highScore WHERE rank=2";
		$result=mysqli_query($con, $sql);
		while ($row=mysqli_fetch_array($result)) {
			$n2=$row['name'];
			$s2=$row['score'];
		}

		$sql="UPDATE highScore SET name='$newName', score='.$newScore.' WHERE rank=2;";
		$result=mysqli_query($con, $sql);
		$sql="UPDATE highScore SET name='$n2', score='.$s2.' WHERE rank=3;";
		$result=mysqli_query($con, $sql);
		mysqli_close($con);
		return;
	} elseif ($rankTab[3]<$newScore) {
		$sql="UPDATE highScore SET name='$newName', score='.$newScore.' WHERE rank=3;";
		$result=mysqli_query($con, $sql);
		mysqli_close($con);
		return;
	} 
?>