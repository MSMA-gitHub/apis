<?php
include 'db.php';
$user = htmlspecialchars($_POST['user']);
$pass = htmlspecialchars($_POST['pass']);
$sql "select pass from users where email = ? ";
$stmt = $conn->prepare($sql);
$stmt->execute(array($user));
$res = $stmt->fetchAll();
$size = $stmt->rowCount();
if ($size < 1)
    echo "<script> alert('هذا الايميل غير مسجل');    window.location.href='../index.html';</script>";
else {
if($res[0][0]==$pass)
    header("location:../pages/");
else
    echo "<script> alert('عذرا اهذا الباسورد خاطئ');    window.location.href='../index.html';</script>";

}

?>
<script>