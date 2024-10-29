<?php 


 $username= $_POST["username"];
    $pass = $_POST["password"];
   $conn =new mysqli ('localhost', 'root', '', 'tests');
   if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}else{

	$stmt =  $conn->prepare("insert into bootstraps(username, password)values(? , ?)");
	$stmt->bind_param("sssssi",$username, $password);
	$stmt->execute();
	echo"successfull";
	$stmt->close();
	$conn->close();

?>