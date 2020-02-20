<?php
echo '<form id="user" action="../../pages/stores/store.php" method="POST"> <input type="hidden" name="id" value="' . $_POST['id'] . '">
</form>';
require '../db.php';
$city = $_POST['city'];
$sql = "insert into `store_branch` values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$stmt = $conn->prepare($sql);
$stmt->execute(array(null, $_POST['name'], $_POST['country'], $city, $_POST['lan'], $_POST['lat'], $_POST['sat_o'], $_POST['sun_o'], $_POST['mon_o'], $_POST['tue_o'], $_POST['wen_o'], $_POST['thu_o'], $_POST['fri_o'], $_POST['sat_o'], $_POST['sun_c'], $_POST['mon_c'], $_POST['tue_c'], $_POST['wen_c'], $_POST['thu_c'], $_POST['fri_c'], $_POST['id'],$_POST['location']));


echo '<script> document.getElementById("user").submit();</script>';

?>
