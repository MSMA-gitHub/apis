<?php
    require 'db.php';
	if(!empty($_POST["email"])){
	session_start();
	try{
	$user_name=$_POST['email'];	
	$user_password=$_POST['pwd'];
	$conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$sql="select * from users where email = :mail and pass = :pass ;";
	$stmt=$conn->prepare($sql);
	$stmt->bindParam(':mail',$user_name);
	$stmt->bindParam(':pass',$user_password);
	$stmt->execute();
	$result=$stmt->fetchAll();
	$size=$stmt->rowCount();
		
	if($size >0){
		
		$_SESSION["username"]=$result[0][1];
		$_SESSION["id"]=$result[0][0];
		$_SESSION["type"]=$result[0]['account'];

	
		header("location: ../index.php");
	}
	else{
	
		echo '<script language="javascript" type="text/javascript">';
		echo' alert("unvalid mail or password");';
		echo'</script>';
		header("location: login.html");
	}
	
	}
	catch(PDOException $e){
		echo $sql." ".$e->getMessage();
		
	}}
	else
	header("location: ./login.html");

	
	
	
?>