<?php

require '../db.php';
$city = $_POST['city'];
$sql = "UPDATE `store_branch` SET `branch`=?,`countryid`=?,`cityid`=?,`lan`=?,`lat`=?,`sat-open`=?,`sun-open`=?,`mon-open`=?,`tues-open`=?,`wends-open`=?,`thurs-open`=?,`fri-open`=?,`sat-close`=?,`sun-close`=?,`mon-close`=?,`tues-close`=?,`wen-close`=?,`thur-close`=?,`fri-close`=?,location=? WHERE id=?";

$stmt = $conn->prepare($sql);
$stmt->execute(array($_POST['name'], $_POST['country'], $city, $_POST['lan'], $_POST['lat'], $_POST['sat_o'], $_POST['sun_o'], $_POST['mon_o'], $_POST['tue_o'], $_POST['wen_o'], $_POST['thu_o'], $_POST['fri_o'], $_POST['sat_o'], $_POST['sun_c'], $_POST['mon_c'], $_POST['tue_c'], $_POST['wen_c'], $_POST['thu_c'], $_POST['fri_c'], $_POST['location'], $_POST['id']));
$sql="select store from `store_branch` WHERE  id=?;";
$stmt=$conn->prepare($sql);
$stmt->execute(array($id));
$s=$stmt->fetchAll();
echo '<form id="user" action="../../pages/stores/store.php" method="POST"> <input type="hidden" name="id" value="' . $s[0][0] . '">
</form>';
echo '<script> document.getElementById("user").submit();</script>';

?>
