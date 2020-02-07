<?php
require 'db.php';

$stmt=$conn->prepare("select code  from country where  id ='".$_POST['city']."';");
$stmt->execute();
$city=$stmt->fetchAll();
$size=$stmt->rowcount();
   echo '<input type="number" name="name" id="code" class="form-control" value="'. $city[0][0].'" id="">';

?>